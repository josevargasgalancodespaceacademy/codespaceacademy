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
   return View::make('auth.login');
});

Auth::routes();
//ruta home
Route::get('/home', 'HomeController@index')->name('home');
//ruta crear ofertas
Route::get('/inscribir-ofertas', 'HomeController@ofertas')->name('inscribir-ofertas');
//rutas para el calendario/agenda
Route::post('guardareventos', array('as' => 'guardareventos','uses' => 'CalendarController@create'));
Route::get('cargareventos{id?}','CalendarController@index');
Route::post('actualizarevento','CalendarController@update');
Route::post('eliminarevento','CalendarController@delete');
//rutas para mostrar las diferentes tablas
Route::get('/listado-empresas', 'EmpresaController@consulta')->name('listado-empresas');
Route::get('/listado-empresas/{id}/detalle-empresa', 'EmpresaController@detalle');