<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Circuito;

class Campeonato extends Model
{
    //

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
        return $this->belongsToMany('App\Escuderia', 'inscritos');
    }

    public function resultados()
    {
        return $this->hasManyThrough('App\Resultado', 'App\Carrera');;
    }

    public function carreras()
    {
        return $this->hasMany('App\Carrera');
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

            for ($i = 0; $i < $listaPilotos->count(); $i++) {

                $inscrito = $listaPilotos[$i]['inscrito'];
                $punto_esc = $listaEscuderias
                    ->where('escuderia.id', $inscrito->escuderia_id)->first()['puntos'];
                $item = [
                    'inscrito' => $inscrito,
                    'puntos_pilotos' =>  $listaPilotos[$i]['puntos'],
                    'puntos_esc' => $punto_esc,
                    'puntos' => $listaPilotos[$i]['puntos'] + $punto_esc,
                ];


                array_push($clasificacion, $item);
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
                (array(
                    'inscrito' => $resultadoInscrito->inscrito,
                    'puntos' => $puntos,
                ))
            );
        }
        return collect($c)->sortByDesc('puntos');
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
                (array(
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
                $puntos += $parcial['puntos_escuderia'];
                $escuderia = $parcial['inscrito']->escuderia;
                //array_push($c, array('escuderia' => $escuderia));
            }
            //$escuderia = $parciales['inscrito']->escuderia;

            array_push($c, (array(
                'puntos_escuderia' => $puntos,
                'escuderia' => $escuderia,

            )));
        }

        // -----------------   //
        // Asigancion de puntos por clasificacion
        // -----------------   //
        $lista = collect($c)->sortByDesc('puntos_escuderia');
        $clasificacion = [];
        $listaPuntos =  $this->getPuntuacionesEscuderias->puntos->sortBy('posicion');
        for ($i = 0; $i < $lista->count(); $i++) {
            //$clasificacion[$i]['posicion'] = $i;
            array_push($clasificacion, (array(
                'puntos' => $listaPuntos[$i]->puntos,
                'escuderia' => $lista[$i]['escuderia'],
                'puntos_escuderia' =>
                $lista[$i]['puntos_escuderia'],
                'posicion' => $i + 1,

            )));
        }


        return collect($clasificacion)->sortBy('posicion');
    }

    public function getClasificacionEscuderias2()
    {

        // Calculo de puntuaciones de pilotos por escuderia

        $resultados = $this->getClasificacionPilotos()->groupBy('inscrito.escuderia_id');
        //$c = collect();
        $c = [];
        foreach ($resultados as $parciales) {
            $puntos = 0;
            foreach ($parciales as $parcial) {
                $puntos += $parcial['puntos'];
                $escuderia = $parcial['inscrito']->escuderia;
                //array_push($c, array('escuderia' => $escuderia));
            }
            //$escuderia = $parciales['inscrito']->escuderia;

            array_push($c, (array(
                'puntos' => $puntos,
                'escuderia' => $escuderia,

            )));
        }

        // Asigancion de puntos por clasificacion
        $lista = collect($c)->sortByDesc('puntos');
        $clasificacion = [];
        $listaPuntos =  $this->getPuntuacionesEscuderias->puntos->sortBy('posicion');
        for ($i = 0; $i < $lista->count(); $i++) {
            //$clasificacion[$i]['posicion'] = $i;
            array_push($clasificacion, (array(
                'puntos' => $listaPuntos[$i]->puntos,
                'escuderia' => $lista[$i]['escuderia'],
                'posicion' => $i + 1,

            )));
        }


        return collect($clasificacion)->sortBy('posicion');
    }
}