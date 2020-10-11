<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Circuito;
use Carbon\Carbon;


class Campeonato extends Model
{
    //
    protected $fillable = [
        'nombre', 'tipo', 'num_coches', 'num_carreras', 'num_vueltas', 'punto_id',
        'pilotos', 'escuderias', 'descripcion', 'punto_escuderia_id', 'visible',
    ];



    public function calendario()
    {
        //return $this->belongsToMany('App\Circuito','carreras')->orderby('orden');
        return $this->belongsToMany('App\Circuito', 'carreras')
            ->withPivot('orden')
            ->orderby('orden');
    }

    public function inscritos()
    {
        return $this->hasMany('App\Inscrito');
    }

    public function puntuaciones()
    {
        return $this->belongsTo('App\Punto', 'punto_id');
    }

    public function escuderias()
    {
        return $this->belongsToMany('App\Escuderia', 'inscritos')->distinct();
    }

    public function resultados()
    {
        return $this->hasManyThrough('App\Resultado', 'App\Carrera')->where('carreras.visible', 1)->orderBy('carreras.orden');
    }

    public function carreras()
    {
        return $this->hasMany('App\Carrera')->orderby('orden');
    }

    public function participantes()
    {
        /*
        return $this->hasManyThrough('App\Participante','App\Inscrito',
                                    'campeonato_id', //FK en Inscritos 
                                    'id', //FK en participantes
                                ); */
        return $this->belongsToMany('App\Participante', 'inscritos');
    }

    public function setCarrera(Circuito $circuito, $orden = null, $punto = null, $fecha = null)
    {
        $orden = ($orden == null) ? $this->getNumCalendario() : $orden;
        $punto = ($punto == null) ? $this->puntuaciones->id : $punto;
        return $this->calendario()->attach($circuito, ['punto_id' =>  $punto, 'orden' => $orden, 'fecha' => $fecha]);
    }

    public function getNumCalendario()
    {
        return $this->calendario()->count();
    }


    public function inscribir(Participante $participante, Escuderia $escuderia = null, Piloto $piloto = null, Coche $coche = null)
    {
        $pilotoId = ($piloto == null) ? 0 : $piloto->id;
        $escuderiaId = ($escuderia == null) ? 0 : $escuderia->id;
        $cocheId = ($coche == null) ? 0 : $coche->id;

        return $this->participantes()->attach($participante, ['escuderia_id' => $escuderiaId,  'piloto_id' => $pilotoId, 'coche_id' => $cocheId]);
    }


    public function getPuntuaciones()
    {
        return $this->carreras()->get()
            ->each(function ($item, $key) {
                return $item->puntos;
            })->pluck('puntos');
    }

    public function getPuntuacionesCarreras()
    {
        return $this->carreras()->where('punto_id', '<>', $this->punto_id);
    }

    public function getPuntuacionesEscuderias()
    {
        return $this->hasOne('App\Punto', 'id', 'punto_escuderia_id');
    }



    public function getClasificacion()
    {

        if ($this->tipo == 3) {
            $listaClasificacion = $this->getClasificacionInscritos();

            $listaEscuderias = $this->getClasificacionEscuderias();
            $clasificacion = [];

            $i = 0;
            foreach ($listaClasificacion as $piloto) {
                $i++;
                $inscrito = $piloto->inscrito;
                $punto_esc = 0;
                //$listaEscuderias->where('escuderia.id', $inscrito->escuderia_id)->first()->puntos;
                $item = [
                    'inscrito' => $inscrito,
                    'puntos_pilotos' =>  $piloto->puntos,
                    'puntos_esc' => $punto_esc,
                    'puntos' => $piloto->puntos + $punto_esc,
                    'posicion' => $i,
                ];

                array_push($clasificacion, (object) $item);
            }
            return collect($clasificacion)->sortByDesc('puntos');
        } elseif ($this->tipo == 2) {
            $listaClasificacion = $this->getClasificacionCoches();
            $listaEscuderias = $this->getClasificacionEscuderias();
            $clasificacion = [];

            $i = 0;
            foreach ($listaClasificacion as $clasifCoche) {
                $i++;
                //$inscrito = $piloto->inscrito;

                $punto_esc = $listaEscuderias
                    ->where('escuderia.id', $clasifCoche->inscritos->first()->escuderia->id)
                    ->first()->puntos;
                $item = [
                    'inscritos' => $clasifCoche->inscritos,
                    'puntos_pilotos' =>  $clasifCoche->puntos,
                    'puntos_esc' => $punto_esc,
                    'puntos' => $clasifCoche->puntos + $punto_esc,
                    'posicion' => $i,
                    'coche' => $clasifCoche->coche,
                ];

                array_push($clasificacion, (object) $item);
            }
            return collect($clasificacion)->sortByDesc('puntos');
        } else {
            return $this->getClasificacionCoches();
        }
    }


    public function getClasificacionPilotos()
    {
        //$c = collect();
        //$c->add(new Post);
        $c = [];

        //Calculo de resultado con penalizacion 

        foreach ($this->resultados->groupBy('inscrito_id') as $resultadosInscritos) {
            $puntos = 0;
            foreach ($resultadosInscritos as $resultadoInscrito) {
                /*if ($resultadoInscrito->abandono == 1) {
                    $puntos += floor($resultadoInscrito->puntos() * $resultadoInscrito->puntuacion()->penalizacion);
                } else {*/
                $puntos += $resultadoInscrito->puntos();
                // }
            }
            array_push(
                $c,
                ((object) array(
                    'inscrito' => $resultadoInscrito->inscrito,
                    'puntos' => $puntos,
                ))
            );
        }
        //return $c;
        //asignamos posicion
        $resultado = [];
        $i = 0;
        foreach (collect($c)->sortByDesc('puntos') as $clasificacion) {
            $i++;
            $clasificacion->posicion = $i;
            array_push($resultado, $clasificacion);
        }

        return collect($resultado)->sortByDesc('puntos');
        //return $this->resultados->groupBy('inscrito_id');
    }


    public function getClasificacionEscuderias()
    {

        // Calculo de puntuaciones de pilotos con la puntuacion de escuderia
        $listaPuntos =  $this->getPuntuacionesEscuderias;
        $c = [];

        foreach ($this->resultados->where('participacion', 1)->groupBy('inscrito_id') as $resultadosInscritos) {
            $puntos = 0;
            foreach ($resultadosInscritos as $resultadoInscrito) {
                /*if ($resultadoInscrito->abandono == 1) {
                    $puntos += floor(
                        $listaPuntos->puntos->where('posicion', $resultadoInscrito->posicion)->first()->puntos
                            * $listaPuntos->penalizacion
                    );
                } else {*/

                $puntos += $listaPuntos->puntos->where('posicion', $resultadoInscrito->posicion)->first()->puntos;
                //}
            }

            array_push(
                $c,
                ((object) array(
                    'inscrito' => $resultadoInscrito->inscrito,
                    'puntos_escuderia' => $puntos,
                    // 'puntos_escuderia' => $puntosEsc,
                ))
            );
        }

        // -----------------   //
        //Agrupamos los datos por escuderia
        // -----------------   //

        $resultados = collect($c)->groupby('inscrito.escuderia_id');


        $c = [];
        foreach ($resultados as $parciales) {
            $puntos = 0;
            foreach ($parciales as $parcial) {
                $puntos += $parcial->puntos_escuderia;
                $escuderia = $parcial->inscrito->escuderia;
                //array_push($c, array('escuderia' => $escuderia));
            }
            //$escuderia = $parciales['inscrito']->escuderia;

            array_push($c, ((object) array(
                'puntos_escuderia' => $puntos,
                'escuderia' => $escuderia,

            )));
        }

        // -----------------   //
        // Asigancion de puntos por clasificacion y posicion
        // -----------------   //
        $lista = collect($c)->sortByDesc('puntos_escuderia');
        $clasificacion = [];

        $listaPuntos =  $this->getPuntuacionesEscuderias->puntos->sortBy('posicion');
        $i = 0;
        foreach ($lista as $parcial) {
            $i++;
            $parcial->puntos = $listaPuntos->where('posicion', $i)->first()->puntos;
            $parcial->posicion = $i;
            array_push($clasificacion,  $parcial);
        }

        return collect($clasificacion)->sortBy('posicion');
    }




    public function getResultadosEscuderias()
    {

        // Calculo de puntuaciones de pilotos por escuderia
        $listaPuntos =  $this->getPuntuacionesEscuderias;
        $c = [];

        foreach ($this->resultados->where('participacion', 1)->groupBy('inscrito_id') as $resultadosInscritos) {
            $puntos = 0;
            foreach ($resultadosInscritos as $parcial) {
                /*if ($parcial->abandono == 1) {
                    $puntos += floor($parcial->puntos() * $parcial->puntuacion()->penalizacion);
                } else {*/

                //$puntos = $listaPuntos->puntos->where('posicion', $parcial->posicion)->first()->puntos;
                //}
                $puntos = $parcial->puntos();
                $escuderia = $parcial->inscrito->escuderia;
                //array_push($c, array('escuderia' => $escuderia));
                array_push($c, ((object) array(
                    'puntos' => $puntos,
                    'escuderia' => $escuderia,
                    'carrera_id' => $parcial->carrera_id,

                )));
            }
            //$escuderia = $parciales['inscrito']->escuderia;

        }
        //return  collect($c)->sortby('puntos');

        $resultados = collect($c)->groupby('carrera_id')->sortby('carrera_id');
        $clasificacion = [];
        //return $resultados;
        foreach ($resultados as $resultadoEsc) { //Carreras

            foreach ($resultadoEsc->groupby('escuderia.id') as $parciales) { //resultados por escuderias
                $puntos = 0;
                foreach ($parciales as $parcial) {
                    $puntos += $parcial->puntos;
                }
                //1;
                array_push($clasificacion, ((object) array(
                    'puntos' => $puntos,
                    'escuderia' => $parcial->escuderia,
                    'carrera_id' => $parcial->carrera_id,
                    'carrera' => Carrera::find($parcial->carrera_id),

                )));
            }
        }

        // Asigancion de puntos por clasificacion


        return collect($clasificacion);
    }


    /* 

    Funcion que retorna la clasifciacion del campeonato por Inscrito

    */

    public function getClasificacionInscritos()
    {
        //$c = collect();
        //$c->add(new Post);
        $c = [];

        //Calculo de resultado con penalizacion 

        foreach ($this->resultados->where('participacion', 1)->groupBy('inscrito_id') as $resultadosInscritos) {
            $puntos = 0;
            foreach ($resultadosInscritos as $resultadoInscrito) {
                /*if ($resultadoInscrito->abandono == 1) {
                    $puntos += floor($resultadoInscrito->puntos() * $resultadoInscrito->puntuacion()->penalizacion);
                } else {*/
                if ($resultadoInscrito->participacion == 1)
                    $puntos += $resultadoInscrito->puntos();
                //}
            }
            array_push(
                $c,
                ((object) array(
                    'inscrito' => $resultadoInscrito->inscrito,
                    'puntos' => $puntos,
                ))
            );
        }
        //return $c;
        //asignamos posicion
        $resultado = [];
        $i = 0;
        foreach (collect($c)->sortByDesc('puntos') as $clasificacion) {
            $i++;
            $clasificacion->posicion = $i;
            array_push($resultado, $clasificacion);
        }

        return collect($resultado)->sortByDesc('puntos');
        //return $this->resultados->groupBy('inscrito_id');
    }

    public function coches()
    {
        return $this->belongsToMany('App\Coche', 'inscritos')->distinct();
    }


    /* 

    Funcion que retorna los resultados por carrera del campeonato por Inscrito

    */

    public function getResultadosInscritos()
    {

        //return $this->resultados->where('participacion', 1)->groupBy('inscrito_id');

        // Calculo de puntuaciones de pilotos por escuderia
        $listaPuntos =  $this->getPuntuacionesEscuderias;
        $c = [];

        foreach ($this->resultados->where('participacion', 1)->groupBy('inscrito_id') as $resultadosInscritos) {
            $puntos = 0;
            foreach ($resultadosInscritos as $parcial) {
                /*if ($parcial->abandono == 1) {
                    $puntos += floor($parcial->puntos() * $parcial->puntuacion()->penalizacion);
                } else {
*/
                //$puntos = $listaPuntos->puntos->where('posicion', $parcial->posicion)->first()->puntos;
                // }
                $puntos = $parcial->puntos();
                //array_push($c, array('escuderia' => $escuderia));
                array_push($c, ((object) array(
                    'puntos' => $puntos,
                    'inscrito' => $parcial->inscrito_id,
                    'carrera_id' => $parcial->carrera_id,
                    'carrera' => Carrera::find($parcial->carrera_id),
                )));
            }
            //$escuderia = $parciales['inscrito']->escuderia;

        }
        return  collect($c)->sortby('carrera_id');

        /*$resultados = collect($c)->groupby('carrera_id')->sortby('carrera_id');
        $clasificacion = [];
        //return $resultados;
        foreach ($resultados as $resultadoEsc) { //Carreras

            foreach ($resultadoEsc->groupby('inscrito.id') as $parciales) {
                $puntos = 0;
                foreach ($parciales as $parcial) {
                    $puntos += $parcial->puntos;
                }
                //1;
                array_push($clasificacion, ((object) array(
                    'puntos' => $puntos,
                    'inscrito' => $parcial->inscrito,
                    'carrera_id' => $parcial->carrera_id,
                    'carrera' => Carrera::find($parcial->carrera_id),

                )));
            }
        }

        // Asigancion de puntos por clasificacion


        return collect($clasificacion);*/
    }


    /* 

    Funcion que retorna la clasifciacion del campeonato por Inscrito

    */

    public function getClasificacionCoches()
    {

        $c = [];

        //Calculo de resultado con penalizacion 

        foreach ($this->getClasificacionInscritos()->groupBy('inscrito.coche_id') as $resultadosCoches) {
            $puntos = 0;
            $inscritos = [];
            foreach ($resultadosCoches as $resultadoInscrito) {

                $puntos += $resultadoInscrito->puntos;

                array_push($inscritos, $resultadoInscrito->inscrito);
            }
            array_push(
                $c,
                ((object) array(
                    'coche' => $resultadoInscrito->inscrito->coche,
                    'puntos' => $puntos,
                    'inscritos' => collect($inscritos),
                ))
            );
        }
        //return $c;
        //asignamos posicion
        $resultado = [];
        $i = 0;
        foreach (collect($c)->sortByDesc('puntos') as $clasificacion) {
            $i++;
            $clasificacion->posicion = $i;
            array_push($resultado, $clasificacion);
        }

        return collect($resultado)->sortByDesc('puntos');
        //return $this->resultados->groupBy('inscrito_id');
    }

    public function getResultadoCoches()
    {

        $c = [];
        /*
        $posts = Post::whereHas('categories', function ($q) {
            $q->where('slug', '=', Input::get('category_slug'));
        })->get();*/
        //$this->resultados->whereHas('inscrito', function ($q){$q->where('id', 1)}) 

        foreach ($this->resultados as $resultadosInscritos) {
            $puntos = 0;
            $inscritos = [];
            foreach ($resultadosInscritos as $resultadoInscrito) {
                /*if ($resultadoInscrito->abandono == 1) {
                    $puntos += floor($resultadoInscrito->puntos() * $resultadoInscrito->puntuacion()->penalizacion);
                } else {*/
                $puntos += $resultadoInscrito->puntos;
                //}
                array_push($inscritos, $resultadoInscrito->inscrito);
            }
            array_push(
                $c,
                ((object) array(
                    'coche' => $resultadoInscrito->inscrito->coche,
                    'puntos' => $puntos,
                    'inscritos' => collect($inscritos),
                ))
            );
        }
        //return $c;
        //asignamos posicion
        $resultado = [];
        $i = 0;
        foreach (collect($c)->sortByDesc('puntos') as $clasificacion) {
            $i++;
            $clasificacion->posicion = $i;
            array_push($resultado, $clasificacion);
        }

        return collect($resultado)->sortByDesc('puntos');
        //return $this->resultados->groupBy('inscrito_id');
    }
}
