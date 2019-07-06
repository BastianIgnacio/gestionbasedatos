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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main',function(){
    return view('layout');
});


Route::get('/login',function(){
    return view('login');
});

Route::get('/salas', function ()
{
    return view('salas');
});



Route::get('/reservas', 'ReservasController@index');

Route::get('/usuarios', 'usuariosController@index');

Route::post('/usuarios', 'usuariosController@insert');

Route::post('/reservas', 'ReservasController@insertReserva');

Route::post('/insertarInstaciaReserva', 'ReservasController@insertInstanciaReserva');
Route::post('/eliminarInstanciaReserva', 'ReservasController@eliminarInstanciaReserva');

Route::post('/eliminarUsuario', 'usuariosController@eliminarUsuario');
Route::post('/eliminarReserva', 'ReservasController@eliminarReserva');

