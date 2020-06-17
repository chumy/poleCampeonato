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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/campeonato', function () {
    return view('campeonatos/campeonato');
});

Route::get('/campeonato2', function () {
    return view('campeonatos/campeonato_ind');
});


Route::get('/campeonato3', function () {
    return view('campeonatos/campeonato_esc');
});


Route::get('/campeonato/piloto', function () {
    return view('campeonatos/piloto');
});

Route::get('/campeonato/escuderia', function () {
    return view('campeonatos/escuderia');
});

Route::get('/pilotos', function () {
    return view('pilotos/pilotos');
});

Route::get('/pilotos/resultado', function () {
    return view('pilotos/resultado');
});


Route::get('/escuderias', function () {
    return view('escuderias/escuderias');
});

Route::get('/escuderias/resultado', function () {
    return view('escuderias/resultado');
});




//Auth::routes();


Route::get('/admin', function (){
    return view('admin/campeonato');
});

Route::get('/admin/pilotos', function (){
    return view('admin/piloto');
});

Route::get('/admin/campeonatos', function (){
    return view('admin/campeonato');
});

Route::resource('/admin/carreras', 'CarreraController');


//Route::get('/admin/carreras', 'CarreraController@index');

Route::get('/admin/participantes', function (){
    return view('admin/participante');
});

Route::get('/admin/escuderias', function (){
    return view('admin/escuderia');
});

Route::get('/admin/campeonato/1/carreras', function (){
    return view('admin/campeonato_carrera');
});

Route::get('/admin/campeonato/1/participantes', function (){
    return view('admin/campeonato_participante');
});

Route::get('/admin/coches', function (){
    return view('admin/coche');
});

Route::get('/admin/puntuaciones', function (){
    return view('admin/puntuacion');
});

Route::get('/admin/resultados', function (){
    return view('admin/resultado');
});