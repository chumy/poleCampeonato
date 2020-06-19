<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Campeonato;
use Illuminate\Http\Request;
use App\Punto;

class CampeonatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $campeonato = Campeonato::find(1);
        return redirect()->route('campeonato.show', $campeonato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function show(Campeonato $campeonato)
    {
        //
        
        $campeonatos = Campeonato::all()->where('visible',1);

        $clasificacionEscuderias=[];
        // Obtener datos de escuderias
        if ($campeonato->tipo == 2) {
                //DB::enableQueryLog(); // Enable query log

                //$listaEscuderias =  $this->getClasificacionCampeonato($campeonato) ;
                //dd(DB::getQueryLog());
        
          
             $clasificacionEscuderias =  $this->getClasificacionEscuderias($campeonato) ;

        }
        //dd($clasificacionEscuderias[0]["id"]);
        //DB::enableQueryLog();
        $puntosEspeciales=[];
        $carreasEspeciales=$this->getCarrerasEspeciales($campeonato);
        if (sizeof($carreasEspeciales) > 0)
        {
            foreach($carreasEspeciales as $carr)
            {
                $puntosEspeciales[] = Punto::find($carr->punto_id) ;
            }

        }
       // dd(DB::getQueryLog());
        $clasificacionCampeonato =  $this->getClasificacionCampeonato($campeonato) ;

        return view('campeonatos/campeonato' , compact('campeonatos', 'campeonato','clasificacionCampeonato',
                                                        'clasificacionEscuderias', 'carreasEspeciales',
                                                    'puntosEspeciales'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function edit(Campeonato $campeonato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campeonato $campeonato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campeonato $campeonato)
    {
        //
    }

    public function  getClasificacionCarrera($campeonato, $carrera)
    {

         /*
            select carreras.nombre, participantes.apodo, carrera_participante.posicion, lista_puntos.puntos 
            from carrera_participante 
            inner join carreras on carrera_participante.carrera_id = carreras.id 
            inner join campeonato_carrera on carrera_participante.id = carreras.id 
            inner join lista_puntos on carrera_participante.posicion = lista_puntos.posicion 
            inner join participantes on carrera_participante.participante_id = participantes.id 

            inner join puntos on puntos.id = lista_puntos.punto_id
            where carrera_participante.campeonato_id = 1*/



        return DB::table('carrera_participante')
                ->join('campeonato_carrera', 'carrera_participante.carrera_id', '=', 'campeonato_carrera.carrera_id')
                ->join('carreras', 'carrera_participante.carrera_id', '=', 'carreras.id')
                ->join('lista_puntos', 'carrera_participante.posicion', '=', 'lista_puntos.posicion')
                ->join('participantes', 'carrera_participante.participante_id', '=', 'participantes.id')
                ->join('puntos', 'campeonato_carrera.punto_id', '=', 'puntos.id')
                ->select('carreras.nombre', 'participantes.apodo', 'carrera_participante.posicion', 'lista_puntos.puntos' )
                ->whereColumn ( [
                        ['campeonato_carrera.carrera_id', 'carreras.id'],
                        ['puntos.id', 'lista_puntos.punto_id'],
                        ['carrera_participante.campeonato_id',  'campeonato_carrera.campeonato_id'],
                        ['puntos.id' , 'campeonato_carrera.punto_id'],
                ])
                ->where( [
                        ['carrera_participante.campeonato_id', '=', $campeonato->id], 
                        ['campeonato_carrera.carrera_id','=', $carrera->id],    
                ])
                ->orderBy('campeonato_carrera.orden')
                ->get();
                




           
    }

    public function  getClasificacionCampeonato($campeonato)
    {

        if ($campeonato->tipo == 2)
        {

                   // tipo 2

        /*
        select  participantes.id, participantes.apodo, escuderias.nombre escuderia, pilotos.nombre piloto, 
        floor ( sum( if(carrera_participante.abandono, lista_puntos.puntos * puntos.penalizacion, lista_puntos.puntos ) ) ) puntos,
        floor ( sum( if(carrera_participante.abandono, lista_puntos.puntos * puntos.penalizacion, lista_puntos.puntos ) ) ) + puntosEsc.puntos puntosTotales
        , posicionEsc.posicion posicionEscuderia, puntosEsc.puntos puntosEscuderia

from carrera_participante, campeonato_carrera, carreras, lista_puntos, participantes, puntos, lista_puntos puntosEsc, campeonatos,
escuderias, ( 
    select  escuderias.id, escuderias.nombre escuderia, sum( if(carrera_participante.abandono, 0, carrera_participante.posicion ) ) puntos,
                  rank() over ( order by sum( if(carrera_participante.abandono, 0, carrera_participante.posicion ) ) desc ) posicion from escuderias, carrera_participante, campeonato_carrera, lista_puntos, campeonatos, puntos, campeonato_participante where (carrera_participante.carrera_id = campeonato_carrera.carrera_id and carrera_participante.posicion = lista_puntos.posicion and carrera_participante.carrera_id = campeonato_carrera.carrera_id and carrera_participante.campeonato_id = campeonato_carrera.campeonato_id and campeonato_participante.participante_id = carrera_participante.participante_id and campeonato_carrera.campeonato_id = campeonatos.id and escuderias.id = campeonato_participante.escuderia_id and puntos.id = lista_puntos.punto_id and campeonato_participante.campeonato_id = campeonato_carrera.campeonato_id) and (carrera_participante.campeonato_id = 1) group by escuderias.id, escuderias.nombre order by puntos desc
    ) posicionEsc,
campeonato_participante 
left join pilotos on pilotos.id = campeonato_participante.piloto_id  
where (carrera_participante.carrera_id = campeonato_carrera.carrera_id 
and carrera_participante.carrera_id = carreras.id 
and carrera_participante.posicion = lista_puntos.posicion 
and carrera_participante.participante_id = participantes.id 
and campeonato_carrera.punto_id = puntos.id 
and campeonato_participante.participante_id = participantes.id 
and campeonato_carrera.carrera_id = carreras.id 
and puntos.id = lista_puntos.punto_id 
and carrera_participante.campeonato_id = campeonato_carrera.campeonato_id
 and campeonato_participante.campeonato_id = campeonato_carrera.campeonato_id
and escuderias.id   = campeonato_participante.escuderia_id    
 and  posicionEsc.id = escuderias.id
 and puntosEsc.punto_id = campeonatos.punto_escuderia_id 
 and campeonatos.id = campeonato_participante.campeonato_id
  and puntosEsc.posicion = posicionEsc.posicion
)
 and (carrera_participante.campeonato_id = 1) 
 group by participantes.id, participantes.apodo, escuderias.nombre, posicionEsc.puntos , pilotos.nombre, puntosEsc.puntos 
 order by puntos2 desc



                  
 */                                                                                                                      
        return DB::table(DB::raw( 'carrera_participante, campeonato_carrera, carreras, lista_puntos, participantes, puntos, lista_puntos puntosEsc, campeonatos,
escuderias, ( 
    select  escuderias.id, escuderias.nombre escuderia, sum( if(carrera_participante.abandono, 0, carrera_participante.posicion ) ) puntos,
                  rank() over ( order by sum( if(carrera_participante.abandono, 0, carrera_participante.posicion ) ) desc ) posicion 
                from escuderias, carrera_participante, campeonato_carrera, lista_puntos, campeonatos, puntos, campeonato_participante where (`carrera_participante`.`carrera_id` = `campeonato_carrera`.`carrera_id` and `carrera_participante`.`posicion` = `lista_puntos`.`posicion` and `carrera_participante`.`carrera_id` = `campeonato_carrera`.`carrera_id` and `carrera_participante`.`campeonato_id` = `campeonato_carrera`.`campeonato_id` and `campeonato_participante`.`participante_id` = `carrera_participante`.`participante_id` and `campeonato_carrera`.`campeonato_id` = `campeonatos`.`id` and `escuderias`.`id` = `campeonato_participante`.`escuderia_id` and `puntos`.`id` = `lista_puntos`.`punto_id` and `campeonato_participante`.`campeonato_id` = `campeonato_carrera`.`campeonato_id`) and (`carrera_participante`.`campeonato_id` = 1) group by `escuderias`.`id`, `escuderias`.`nombre` order by `puntos` desc
    ) posicionEsc,
campeonato_participante ') )
                ->leftjoin('pilotos', 'pilotos.id', '=', 'campeonato_participante.piloto_id')  
                    
                ->select((DB::raw(' participantes.id, participantes.apodo, escuderias.nombre escuderia, pilotos.nombre piloto, 
        floor ( sum( if(carrera_participante.abandono, lista_puntos.puntos * puntos.penalizacion, lista_puntos.puntos ) ) ) puntos,
        floor ( sum( if(carrera_participante.abandono, lista_puntos.puntos * puntos.penalizacion, lista_puntos.puntos ) ) ) + puntosEsc.puntos puntosTotales
        , posicionEsc.posicion posicionEscuderia, puntosEsc.puntos puntosEscuderia ') ) )
                ->whereColumn ( [
                        ['carrera_participante.carrera_id',  'campeonato_carrera.carrera_id'],
                        ['carrera_participante.carrera_id',  'carreras.id'],
                        ['carrera_participante.posicion',  'lista_puntos.posicion'],
                        ['carrera_participante.participante_id', 'participantes.id'],
                        ['campeonato_carrera.punto_id',  'puntos.id'],
                        ['campeonato_participante.participante_id',  'participantes.id'],
                        ['campeonato_carrera.carrera_id', 'carreras.id'],
                        ['puntos.id', 'lista_puntos.punto_id'],
                        ['carrera_participante.campeonato_id',  'campeonato_carrera.campeonato_id'],
                        ['campeonato_participante.campeonato_id',  'campeonato_carrera.campeonato_id'],
                        ['escuderias.id', 'campeonato_participante.escuderia_id' ],
                        ['posicionEsc.id' , 'escuderias.id'],
                        ['puntosEsc.punto_id', 'campeonatos.punto_escuderia_id'],
                        ['campeonatos.id' , 'campeonato_participante.campeonato_id'],
                        ['puntosEsc.posicion','posicionEsc.posicion'],

                ])
                ->where( [
                        ['carrera_participante.campeonato_id', '=', $campeonato->id],    
                ])
                ->groupBy('participantes.id', 'participantes.apodo', 'escuderias.nombre', 'pilotos.nombre', 'puntosEsc.puntos','posicionEsc.posicion')
                ->orderBy('puntosTotales','desc')
                ->get();
        }
        else{
     

         // tipo 1
        return DB::table(DB::raw( 'carrera_participante, campeonato_carrera, carreras, lista_puntos, participantes, puntos, campeonato_participante') )
                ->leftjoin('pilotos', 'pilotos.id', '=', 'campeonato_participante.piloto_id')  
                ->leftjoin('escuderias', 'escuderias.id', '=', 'campeonato_participante.escuderia_id')      
                ->select((DB::raw(' participantes.id, participantes.apodo, escuderias.nombre escuderia, pilotos.nombre piloto, floor ( sum( if(carrera_participante.abandono, lista_puntos.puntos * puntos.penalizacion, lista_puntos.puntos ) ) ) puntos   ') ) )
                ->whereColumn ( [
                        ['carrera_participante.carrera_id',  'campeonato_carrera.carrera_id'],
                        ['carrera_participante.carrera_id',  'carreras.id'],
                        ['carrera_participante.posicion',  'lista_puntos.posicion'],
                        ['carrera_participante.participante_id', 'participantes.id'],
                        ['campeonato_carrera.punto_id',  'puntos.id'],
                        ['campeonato_participante.participante_id',  'participantes.id'],
                        ['campeonato_carrera.carrera_id', 'carreras.id'],
                        ['puntos.id', 'lista_puntos.punto_id'],
                        ['carrera_participante.campeonato_id',  'campeonato_carrera.campeonato_id'],
                        ['campeonato_participante.campeonato_id',  'campeonato_carrera.campeonato_id'],
                ])
                ->where( [
                        ['carrera_participante.campeonato_id', '=', $campeonato->id],    
                ])
                ->groupBy('participantes.id', 'participantes.apodo', 'escuderias.nombre', 'pilotos.nombre')
                ->orderBy('puntos','desc')
                ->get();
            }
       
    }

     public function  getClasificacionEscuderias($campeonato)
    {

         /*
            
            select escuderias.nombre escuderia, sum( if(carrera_participante.abandono, lista_puntos.puntos * puntos.penalizacion, lista_puntos.puntos ) ) puntos,
            rank() over ( order by sum( if(carrera_participante.abandono, lista_puntos.puntos * puntos.penalizacion, lista_puntos.puntos )  ) desc )
            from carrera_participante 
            inner join campeonato_carrera on carrera_participante.carrera_id = campeonato_carrera.carrera_id 
            inner join lista_puntos on carrera_participante.posicion = lista_puntos.posicion 
            inner join campeonatos on campeonato_carrera.campeonato_id = campeonatos.id 
            inner join puntos on puntos.id = campeonatos.punto_escuderia_id
            inner join campeonato_participante on campeonato_participante.participante_id = carrera_participante.participante_id  
            inner join escuderias on escuderias.id = campeonato_participante.escuderia_id 
            where ( puntos.id = lista_puntos.punto_id 
            and carrera_participante.campeonato_id = campeonato_carrera.campeonato_id 
                and campeonato_participante.campeonato_id = carrera_participante.campeonato_id ) 
            and (carrera_participante.campeonato_id = 1)
 
            group by escuderia
        */

      return DB::table(DB::raw( 'escuderias, carrera_participante, campeonato_carrera, lista_puntos, campeonatos, puntos, campeonato_participante') )
                ->select((DB::raw(' escuderias.id, escuderias.nombre escuderia, sum( if(carrera_participante.abandono, 0, carrera_participante.posicion ) ) puntos,
            rank() over ( order by sum( if(carrera_participante.abandono, 0, carrera_participante.posicion ) ) desc ) posicion') ) )
                ->whereColumn ( [
                        ['carrera_participante.carrera_id',  'campeonato_carrera.carrera_id'],
                        ['carrera_participante.posicion',  'lista_puntos.posicion'],
                        ['carrera_participante.carrera_id', 'campeonato_carrera.carrera_id'],
                        ['carrera_participante.campeonato_id',  'campeonato_carrera.campeonato_id'],
                        ['campeonato_participante.participante_id',  'carrera_participante.participante_id'],
                        ['campeonato_carrera.campeonato_id', 'campeonatos.id'],
                        ['escuderias.id', 'campeonato_participante.escuderia_id'],
                        ['puntos.id', 'lista_puntos.punto_id'],
                        ['campeonato_participante.campeonato_id',  'campeonato_carrera.campeonato_id'],
                ])
                ->where( [
                        ['carrera_participante.campeonato_id', '=', $campeonato->id],    
                ])
                ->groupBy('escuderias.id',  'escuderias.nombre')
                ->orderBy('puntos','desc')
                ->get();

       

    }

    public function getCarrerasEspeciales($campeonato){
        /* select orden, campeonato_carrera.punto_id
            from campeonato_carrera, campeonatos
            where campeonatos.id =  campeonato_carrera.campeonato_id
            and campeonato_carrera.punto_id <> campeonatos.punto_id */
        return DB::table(DB::raw('campeonato_carrera, campeonatos') )
            ->select( 'orden', 'campeonato_carrera.punto_id')
             ->whereColumn ( [
                        ['campeonatos.id',  'campeonato_carrera.campeonato_id'],
                        ['campeonato_carrera.punto_id', '<>', 'campeonatos.punto_id'],
             ])
             ->where( [
                          
                        ['campeonato_carrera.campeonato_id', '=', $campeonato->id],  
                ])
                ->groupBy('orden', 'campeonato_carrera.punto_id')
                ->orderBy('orden','asc')
                ->get();

    }
}