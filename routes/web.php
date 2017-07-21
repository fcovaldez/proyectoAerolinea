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
    return view('home');
});
//Rutas para los clientes
Route::get('/registrarCliente','clientesController@registrar');
Route::post('/guardarCliente','clientesController@guardar');
Route::get('/consultaclientes','clientesController@consultar');
Route::get('/editarCliente/{id}','clientesController@editar');
Route::post('/actualizarCliente/{id}','clientesController@actualizar');
Route::get('/eliminarCliente/{id}','clientesController@eliminar');
Route::get('/clientesPDF','clientesController@PDF');
//Rutas para las promociones
Route::get('/registrarPromocion','promocionesController@registrar');
Route::post('/guardarPromocion','promocionesController@guardar');
Route::get('/consultaPromociones','promocionesController@consultar');
Route::get('/editarPromocion/{id}','promocionesController@editar');
Route::post('/actualizarPromocion/{id}','promocionesController@actualizar');
Route::get('/eliminarPromocion/{id}','promocionesController@eliminar');
Route::get('/enviarPromocion/{id}','promocionesController@enviar');
Route::post('/enviarCorreo/{id}','promocionesController@enviarCorreo');
Route::get('/promocionesPDF','promocionesController@PDF');