<?php

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

Route::get('/peliculas/{id}', 'PeliculasController@buscarPeliculaId');

Route::get('/peliculas/buscar/{nombre}', 'PeliculasController@buscarPeliculaNombre');

Route::get('/peliculas', 'PeliculasController@listarPeliculas');
Route::get('/agregarPelicula','PeliculasController@agregarPelicula');
Route::post('/agregarPelicula', 'PeliculasController@crearPelicula')->name('crearPeli');
Route::get('/editarPelicula/{id}','PeliculasController@editarPelicula')->name('editarPeli');
Route::put('/editarPelicula/{id}','PeliculasController@edicion')->name('edicion');
Route::get('/actores', 'ActorController@directory');
Route::get('/actor/{id}', 'ActorController@show');
Route::get('/actores/buscar', 'ActorController@buscarActoresForm');
Route::post('/actores/buscar', 'ActorController@search')->name('buscador');
