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
    return view('campeonato');
});

Route::get('/campeonato/piloto', function () {
    return view('piloto');
});

Route::get('/campeonato/escuderia', function () {
    return view('escuderia');
});

Route::get('/pilotos', function () {
    return view('pilotos');
});

Route::get('/escuderias', function () {
    return view('escuderias');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function (){
    return view('admin/campeonato');
});

Route::get('/admin/pilotos', function (){
    return view('admin/piloto');
});

Route::get('/admin/campeonatos', function (){
    return view('admin/campeonato');
});

Route::get('/admin/carreras', function (){
    return view('admin/carrera');
});

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