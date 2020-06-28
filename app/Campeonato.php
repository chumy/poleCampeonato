<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Circuito;

class Campeonato extends Model
{
    //
    protected $fillable = [
        'nombre', 'tipo', 'num_coches', 'num_carreras', 'punto_id',
        'pilotos', 'escuderias', 'descripcion', 'punto_escuderia_id'
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
        return $this->hasOne('App\Punto', 'id');
    }

    public function escuderias()
    {
        return $this->belongsToMany('App\Escuderia', 'inscritos')->distinct();
    }

    public function resultados()
    {
        return $this->hasManyThrough('App\Resultado', 'App\Carrera')->orderBy('carreras.orden');
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

    public function setCarrera(Circuito $circuito, $orden = null, $punto = null)
    {
        $orden = ($orden == null) ? $this->getNumCalendario() : $orden;
        $punto = ($punto == null) ? $this->puntuaciones->id : $punto;
        return $this->calendario()->attach($circuito, ['punto_id' =>  $punto, 'orden' => $orden]);
    }

    public function getNumCalendario()
    {
        return $this->calendario()->count();
    }


    public function inscribir(Participante $participante, Escuderia $escuderia = null, Piloto $piloto = null)
    {
        $pilotoId = ($piloto == null) ? 0 : $piloto->id;
        $escuderiaId = ($escuderia == null) ? 0 : $escuderia->id;

        return $this->participantes()->attach($participante, ['escuderia_id' => $escuderiaId,  'piloto_id' => $pilotoId]);
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
        return $this->carreras()->where('punto_id', '<>', $this->puntuaciones->id);
    }

    public function getPuntuacionesEscuderias()
    {
        return $this->hasOne('App\Punto', 'id', 'punto_escuderia_id');
    }



    public function getClasificacion()
    {
        $listaPilotos = $this->getClasificacionPilotos();
        if ($this->tipo == 2) {
            $listaEscuderias =
                $this->getClasificacionEscuderias();
            $clasificacion = [];

            /*for ($i = 0; $i < $listaPilotos->count(); $i++) {
                
                $inscrito = $listaPilotos[$i]->inscrito;
                $punto_esc = $listaEscuderias
                    ->where('escuderia.id', $inscrito->escuderia_id)->first()->puntos;
                $item = [
                    'inscrito' => $inscrito,
                    'puntos_pilotos' =>  $listaPilotos[$i]->puntos,
                    'puntos_esc' => $punto_esc,
                    'puntos' => $listaPilotos[$i]->puntos + $punto_esc,
                    'posicion' => $i + 1,
                ];*/
            $i = 0;
            foreach ($listaPilotos as $piloto) {
                $i++;
                $inscrito = $piloto->inscrito;
                $punto_esc = $listaEscuderias
                    ->where('escuderia.id', $inscrito->escuderia_id)->first()->puntos;
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
        } else {
            return $listaPilotos;
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
                if ($resultadoInscrito->abandono == 1) {
                    $puntos += floor($resultadoInscrito->puntos() * $resultadoInscrito->puntuacion()->penalizacion);
                } else {
                    $puntos += $resultadoInscrito->puntos();
                }
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

        foreach ($this->resultados->groupBy('inscrito_id') as $resultadosInscritos) {
            $puntos = 0;
            foreach ($resultadosInscritos as $resultadoInscrito) {
                if ($resultadoInscrito->abandono == 1) {
                    $puntos += floor(
                        $listaPuntos->puntos->where('posicion', $resultadoInscrito->posicion)->first()->puntos
                            * $listaPuntos->penalizacion
                    );
                } else {
                    $puntos += $listaPuntos->puntos->where('posicion', $resultadoInscrito->posicion)->first()->puntos;
                }
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

        foreach ($this->resultados->groupBy('inscrito_id') as $resultadosInscritos) {
            $puntos = 0;
            foreach ($resultadosInscritos as $parcial) {
                $puntos = $listaPuntos->puntos->where('posicion', $parcial->posicion)->first()->puntos;
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
}