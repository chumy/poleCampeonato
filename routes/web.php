<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* -----------------  RUTAS PUBLICAS  -------------------- */

Route::get('/', 'PortadaController@index')->name('index');
Route::get('/home', 'PortadaController@index')->name('index');


Route::get('/campeonato', 'CampeonatoController@index')->name('campeonato.index');

Route::get('/campeonato/{campeonato}', 'CampeonatoController@show')->name('campeonato.show');
Route::get('/campeonato/{campeonato}/clasificacion', 'CampeonatoController@clasificacion')->name('campeonato.clasificacion');

Route::get('/campeonato/piloto/{campeonato}/{participante}', 'CampeonatoController@piloto')->name('campeonato.piloto');
Route::get('/campeonato/coche/{campeonato}/{coche}', 'CampeonatoController@coche')->name('campeonato.coche');
Route::get('/campeonato/{campeonato}/pilotos', 'CampeonatoController@pilotos')->name('campeonato.pilotos');
Route::get('/campeonato/{campeonato}/escuderias', 'CampeonatoController@escuderias')->name('campeonato.escuderias');
Route::get('/campeonato/{campeonato}/calendario/{carrera?}', 'CampeonatoController@calendario')->name('campeonato.calendario');

Route::get('/campeonato/escuderia/{campeonato}/{escuderia}', 'CampeonatoController@escuderia')->name('campeonato.escuderia');

Route::get('/pilotos', 'ParticipanteController@index')->name('piloto.index');

Route::get('/pilotos/{participante}', 'ParticipanteController@show')->name('piloto.show');


Route::get('/escuderias', 'EscuderiaController@index')->name('escuderia.index');

Route::get('/escuderias/{escuderia}', 'EscuderiaController@show')->name('escuderia.show');



Route::get('/pilotos/resultado', function () {
    return view('pilotos/resultado');
});



Route::get('/escuderias/resultado', function () {
    return view('escuderias/resultado');
});




Auth::routes();

/* -------------  RUTAS ADMINISTRACION ---------------- */

/* Redireccion Principal */
Route::get('/admin', 'ResultadoController@create')->name('resultados.create');


Route::resource('/admin/circuitos', 'CircuitoController')->middleware('auth');
Route::resource('/admin/escuderias', 'EscuderiaController')->middleware('auth');
Route::resource('/admin/pilotos', 'PilotoController')->middleware('auth');
Route::resource('/admin/participantes', 'ParticipanteController')->middleware('auth');
Route::resource('/admin/puntos', 'PuntoController')->middleware('auth');
Route::resource('/admin/coche', 'CocheController')->middleware('auth');

/** CAMPEONATOS */
Route::resource('/admin/campeonatos', 'CampeonatoController')->middleware('auth');
Route::patch('/admin/campeonatos/{campeonato}/visible', 'CampeonatoController@visible')->name('campeonatos.visible')->middleware('auth');

/** CARRERAS  */
Route::get('/admin/carreras/{campeonato}', 'CarreraController@show')->name('carreras.show')->middleware('auth');
Route::patch('/admin/carreras/{carrera}', 'CarreraController@update')->name('carreras.update')->middleware('auth');
Route::post('/admin/carreras', 'CarreraController@store')->name('carreras.store')->middleware('auth');
Route::patch('/admin/carreras/{carrera}/up', 'CarreraController@up')->name('carreras.up')->middleware('auth');
Route::patch('/admin/carreras/{carrera}/down', 'CarreraController@down')->name('carreras.down')->middleware('auth');
Route::patch('/admin/carreras/{carrera}/visible', 'CarreraController@visible')->name('carreras.visible')->middleware('auth');
Route::delete('/admin/carreras/{carrera}', 'CarreraController@destroy')->name('carreras.destroy')->middleware('auth');
Route::get('/admin/carreras/{carrera}/edit', 'CarreraController@edit')->name('carreras.edit')->middleware('auth');

/* INSCRITOS */
Route::get('/admin/inscritos/{campeonato}', 'InscritoController@show')->name('inscritos.show')->middleware('auth');
Route::patch('/admin/inscritos/{inscrito}', 'InscritoController@update')->name('inscritos.update')->middleware('auth');
Route::post('/admin/inscritos', 'InscritoController@store')->name('inscritos.store')->middleware('auth');
Route::delete('/admin/inscritos/{inscrito}', 'InscritoController@destroy')->name('inscritos.destroy')->middleware('auth');
Route::patch('/admin/inscritos/{inscrito}/edit', 'InscritoController@update')->name('inscritos.update')->middleware('auth');
Route::get('/admin/inscritos/{inscrito}/edit', 'InscritoController@edit')->name('inscritos.edit')->middleware('auth');

/* RESULTADOS */
Route::get('/admin/resultados', 'ResultadoController@create')->name('resultados.create')->middleware('auth');
Route::get('/admin/resultados/{campeonato?}/{carrera?}', 'ResultadoController@show')->name('resultados.show')->middleware('auth');
Route::patch('/admin/resultados/up/{campeonato}/{carrera}/{resultado}', 'ResultadoController@up')->name('resultados.up')->middleware('auth');
Route::patch('/admin/resultados/down/{campeonato}/{carrera}/{resultado}', 'ResultadoController@down')->name('resultados.down')->middleware('auth');
Route::patch('/admin/resultados/abandono/{campeonato}/{carrera}/{resultado}', 'ResultadoController@abandono')->name('resultados.abandono')->middleware('auth');
Route::patch('/admin/resultados/participacion/{campeonato}/{carrera}/{resultado}', 'ResultadoController@participacion')->name('resultados.participacion')->middleware('auth');
Route::patch('/admin/resultados/publicar/{campeonato}/{carrera}', 'ResultadoController@publicar')->name('resultados.publicar')->middleware('auth');