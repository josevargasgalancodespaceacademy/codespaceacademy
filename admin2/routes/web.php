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
Route::get('/listado-empresas/{id}/editar-empresa', 'EmpresaController@editar');
Route::put('/listado-empresas/{id}/editar-empresa', 'EmpresaController@actualizar')->name('actualizar-empresa');
Route::get('/listado-contacto', 'ContactoController@consulta')->name('listado-contacto');
Route::get('/listado-contacto/{id}/detalle-contacto', 'ContactoController@detalle');
Route::get('/listado-contacto/{id}/editar-contacto', 'ContactoController@editar');
Route::put('/listado-contacto/{id}/editar-contacto', 'ContactoController@actualizar')->name('actualizar-contacto');
Route::get('/listado-mas-informacion', 'MasInformacionController@consulta')->name('listado-mas-informacion');
Route::get('/listado-mas-informacion/{id}/detalle-mas-informacion', 'MasInformacionController@detalle');
Route::get('/listado-mas-informacion/{id}/editar-mas-informacion', 'MasInformacionController@editar');
Route::put('/listado-mas-informacion/{id}/editar-mas-informacion', 'MasInformacionController@actualizar')->name('actualizar-mas-informacion');
Route::get('/listado-te-llamamos', 'TeLlamamosController@consulta')->name('listado-te-llamamos');
Route::get('/listado-te-llamamos/{id}/editar-te-llamamos', 'TeLlamamosController@editar');
Route::put('/listado-te-llamamos/{id}/editar-te-llamamos', 'TeLlamamosController@actualizar')->name('actualizar-te-llamamos');
Route::get('/listado-curriculums', 'CurriculumsController@consulta')->name('listado-curriculums');
Route::get('/listado-curriculums/{id}/detalle-curriculum', 'CurriculumsController@detalle');
Route::get('/listado-curriculums/editar', 'CurriculumsController@editar');
Route::get('/listado-sorteo-becas', 'SorteoBecasController@consulta')->name('listado-sorteo-becas');
Route::get('/listado-sorteo-becas/{id}/detalle-sorteo-becas', 'SorteoBecasController@detalle');
Route::get('/listado-sorteo-becas/{id}/editar-sorteo-becas', 'SorteoBecasController@editar');
Route::put('/listado-sorteo-becas/{id}/editar-sorteo-becas', 'SorteoBecasController@actualizar')->name('actualizar-sorteo-becas');
Route::get('/listado-newsletter', 'NewsletterController@consulta')->name('listado-newsletter');