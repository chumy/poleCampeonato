/* getClasificacionEscuderias */

select @rowid:=@rowid+1 as posicion, id , escuderia, puntos, campeonato_id
from (
select escuderias.id, escuderias.nombre escuderia, carrera_participante.campeonato_id,
sum( if(carrera_participante.abandono, 0, carrera_participante.posicion ) ) puntos
/*, rank() over ( order by sum( if(carrera_participante.abandono, 0, carrera_participante.posicion ) ) desc ) posicion*/
from escuderias, carrera_participante, campeonato_carrera, lista_puntos, campeonatos, puntos, campeonato_participante 
where carrera_participante.carrera_id = campeonato_carrera.carrera_id
 and carrera_participante.posicion = lista_puntos.posicion 
 and carrera_participante.carrera_id = campeonato_carrera.carrera_id 
 and carrera_participante.campeonato_id = campeonato_carrera.campeonato_id 
 and campeonato_participante.participante_id = carrera_participante.participante_id 
 and campeonato_carrera.campeonato_id = campeonatos.id 
 and escuderias.id = campeonato_participante.escuderia_id 
 and puntos.id = lista_puntos.punto_id 
 and campeonato_participante.campeonato_id = campeonato_carrera.campeonato_id
 group by escuderias.id, escuderias.nombre, carrera_participante.campeonato_id order by puntos desc) escuderias,
 (SELECT @rowid:=0) as init
  where escuderias.campeonato_id = 1;

  /* Campeonato tipo 2 */ 

 select  participantes.id, participantes.apodo, escuderias.nombre escuderia, pilotos.nombre piloto, 
        floor ( sum( if(carrera_participante.abandono, lista_puntos.puntos * puntos.penalizacion, lista_puntos.puntos ) ) ) puntos,
        floor ( sum( if(carrera_participante.abandono, lista_puntos.puntos * puntos.penalizacion, lista_puntos.puntos ) ) ) + puntosEsc.puntos puntosTotales,
         posicionEsc.posicion posicionEscuderia, puntosEsc.puntos puntosEscuderia
        from carrera_participante, campeonato_carrera, carreras, lista_puntos, participantes, puntos, lista_puntos puntosEsc, campeonatos,
escuderias, ( 
    select id, escuderia, @rowid:=@rowid+1 as posicion, puntos
from (
select  escuderias.id, escuderias.nombre escuderia, 
sum( if(carrera_participante.abandono, 0, carrera_participante.posicion ) ) puntos
from escuderias, carrera_participante, campeonato_carrera, lista_puntos, campeonatos, puntos, campeonato_participante 
where (carrera_participante.carrera_id = campeonato_carrera.carrera_id and carrera_participante.posicion = lista_puntos.posicion and carrera_participante.carrera_id = campeonato_carrera.carrera_id and carrera_participante.campeonato_id = campeonato_carrera.campeonato_id and campeonato_participante.participante_id = carrera_participante.participante_id and campeonato_carrera.campeonato_id = campeonatos.id and escuderias.id = campeonato_participante.escuderia_id and puntos.id = lista_puntos.punto_id and campeonato_participante.campeonato_id = campeonato_carrera.campeonato_id) and (carrera_participante.campeonato_id = 1) group by escuderias.id, escuderias.nombre order by puntos desc) esc,  (SELECT @rowid:=0) as init
   
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
 group by participantes.id, participantes.apodo, escuderias.nombre, posicionEsc.puntos , pilotos.nombre, 
 posicionEsc.posicion , puntosEsc.puntos 
ORDER BY puntosTotales  DESC





select   participantes.id, participantes.apodo, escuderias.nombre escuderia, pilotos.nombre piloto,  
floor ( sum( if(carrera_participante.abandono, lista_puntos.puntos * puntos.penalizacion, lista_puntos.puntos ) ) ) puntos,
floor ( sum( if(carrera_participante.abandono, lista_puntos.puntos * puntos.penalizacion, lista_puntos.puntos ) ) ) + puntosEsc.puntos puntosTotales,
posicionEsc.posicion posicionEscuderia, puntosEsc.puntos puntosEscuderia 

from  carrera_participante, campeonato_carrera, carreras, lista_puntos, participantes, puntos, lista_puntos puntosEsc,
 campeonatos, escuderias, ( 
    select id, escuderia, @rowid:=@rowid+1 as posicion, puntos
from (
select  escuderias.id, escuderias.nombre escuderia, 
sum( if(carrera_participante.abandono, 0, carrera_participante.posicion ) ) puntos
from escuderias, carrera_participante, campeonato_carrera, lista_puntos, campeonatos, puntos, campeonato_participante 
where (carrera_participante.carrera_id = campeonato_carrera.carrera_id and carrera_participante.posicion = lista_puntos.posicion 
and carrera_participante.carrera_id = campeonato_carrera.carrera_id and carrera_participante.campeonato_id = campeonato_carrera.campeonato_id and campeonato_participante.participante_id = carrera_participante.participante_id and campeonato_carrera.campeonato_id = campeonatos.id and escuderias.id = campeonato_participante.escuderia_id and puntos.id = lista_puntos.punto_id and campeonato_participante.campeonato_id = campeonato_carrera.campeonato_id) and (carrera_participante.campeonato_id = 1) group by escuderias.id, escuderias.nombre order by puntos desc) esc,  (SELECT @rowid:=0) as init 
   
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
where (`carrera_participante`.`campeonato_id` = 1) group by `participantes`.`id`, `participantes`.`apodo`, `posicionEsc`.`puntos`, `pilotos`.`nombre`, `posicionEsc`.`posicion`, `puntosEsc`.`puntos` order by `puntosTotales` desc)



-- Resultados escuderias

select  escuderia_id,  escuderia, campeonato_id, carrera_id, posicion, participante_id
from (
select escuderia_id,  escuderia, campeonato_id, carrera_id, participante_id
 , case when @name = carrera_id
 THEN @id := @id +1
 else @id := 1
 end posicion
 ,@name:= carrera_id AS esc

from
(select escuderias.id escuderia_id, escuderias.nombre escuderia, carrera_participante.campeonato_id, carrera_participante.carrera_id, carrera_participante.participante_id,
sum( if(carrera_participante.abandono, 0, carrera_participante.posicion ) ) puntos
/*, rank() over ( order by sum( if(carrera_participante.abandono, 0, carrera_participante.posicion ) ) desc ) posicion*/
from escuderias, carrera_participante, campeonato_carrera, lista_puntos, campeonatos, puntos, campeonato_participante 
where carrera_participante.carrera_id = campeonato_carrera.carrera_id
 and carrera_participante.posicion = lista_puntos.posicion 
 and carrera_participante.carrera_id = campeonato_carrera.carrera_id 
 and carrera_participante.campeonato_id = campeonato_carrera.campeonato_id 
 and campeonato_participante.participante_id = carrera_participante.participante_id 
 and campeonato_carrera.campeonato_id = campeonatos.id 
 and escuderias.id = campeonato_participante.escuderia_id 
 and puntos.id = lista_puntos.punto_id 
 and campeonato_participante.campeonato_id = campeonato_carrera.campeonato_id
 -- and campeonato_participante.campeonato_id = 1
 group by escuderias.id, escuderias.nombre, carrera_participante.campeonato_id , carrera_participante.carrera_id, carrera_participante.participante_id
 order by  carrera_participante.campeonato_id, carrera_id asc, puntos desc) orden, (SELECT @name:=NULL, @id:=0) t) 
 resultado
 where campeonato_id = 1
 and escuderia_id  = 1