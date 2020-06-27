<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/* -----------------  RUTAS PUBLICAS  -------------------- */

Route::get('/', function () {
    return view('welcome');
});



Route::get('/campeonato', 'CampeonatoController@index')->name('campeonato.index');

Route::get('/campeonato/{campeonato}', 'CampeonatoController@show')->name('campeonato.show');

Route::get('/campeonato/piloto/{campeonato}/{participante}', 'CampeonatoController@piloto')->name('campeonato.piloto');


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




//Auth::routes();

/* -------------  RUTAS ADMINISTRACION ---------------- */

Route::get('/admin', 'ResultadoController@create')->name('resultados.create');

Route::get('/admin/campeonatos', 'CampeonatoController@create')->name('campeonatos.create');
Route::post('/admin/campeonatos', 'CampeonatoController@create')->name('campeonatos.store');

Route::get('/admin/pilotos', function () {
    return view('admin/piloto');
});

/*
Route::get('/admin/campeonatos', function () {
    return view('admin/campeonato');
});*/


Route::resource('/admin/circuitos', 'CircuitoController');
Route::resource('/admin/escuderias', 'EscuderiaController');


//Route::get('/admin/carreras', 'CarreraController@index');

Route::get('/admin/participantes', function () {
    return view('admin/participante');
});

Route::get('/admin/escuderias', function () {
    return view('admin/escuderia');
});


Route::get('/admin/campeonato/1/carreras', function () {
    return view('admin/campeonato_carrera');
});

Route::get('/admin/campeonato/1/participantes', function () {
    return view('admin/campeonato_participante');
});

Route::get('/admin/coches', function () {
    return view('admin/coche');
});

Route::get('/admin/puntuaciones', function () {
    return view('admin/puntuacion');
});

Route::get('/admin/resultados', 'ResultadoController@create')->name('resultados.create');

Route::get('/admin/resultados/{campeonato}/{carrera?}', 'ResultadoController@show')->name('resultados.show');

Route::patch('/admin/resultados/up/{campeonato}/{carrera}/{resultado}', 'ResultadoController@up')->name('resultados.up');

Route::patch('/admin/resultados/down/{campeonato}/{carrera}/{resultado}', 'ResultadoController@down')->name('resultados.down');

Route::patch('/admin/resultados/abandono/{campeonato}/{carrera}/{resultado}', 'ResultadoController@abandono')->name('resultados.abandono');

Route::patch('/admin/resultados/participacion/{campeonato}/{carrera}/{resultado}', 'ResultadoController@participacion')->name('resultados.participacion');