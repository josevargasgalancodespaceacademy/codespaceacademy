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
Route::group(['middleware' => ['permission:add_offers']], function () {
Route::get('/inscribir-ofertas', 'HomeController@ofertas')->name('inscribir-ofertas');
});
//rutas para el calendario/agenda
Route::post('guardareventos', array('as' => 'guardareventos','uses' => 'CalendarController@create'));
Route::get('cargareventos{id?}','CalendarController@index');
Route::post('actualizarevento','CalendarController@update');
Route::post('eliminarevento','CalendarController@delete');
//rutas para mostrar y actualizar las diferentes tablas de las diferentes secciones de la web
//Listado empresas
Route::get('/listado-empresas', 'EmpresaController@consulta')->name('listado-empresas');
Route::get('/listado-empresas/{id}/detalle-empresa', 'EmpresaController@detalle');
Route::get('/listado-empresas/{id}/editar-empresa', 'EmpresaController@editar');
Route::put('/listado-empresas/{id}/editar-empresa', 'EmpresaController@actualizar')->name('actualizar-empresa');
Route::put('/listado-empresas', 'EmpresaController@filtrar_empresas')->name('filtrar-empresas');
//Listado contactos
Route::get('/listado-contacto', 'ContactoController@consulta')->name('listado-contacto');
Route::get('/listado-contacto/{id}/detalle-contacto', 'ContactoController@detalle');
Route::get('/listado-contacto/{id}/editar-contacto', 'ContactoController@editar');
Route::put('/listado-contacto/{id}/editar-contacto', 'ContactoController@actualizar')->name('actualizar-contacto');
Route::put('/listado-contacto', 'ContactoController@filtrar_contactos')->name('filtrar-contactos');
//Listado mas informacion
Route::get('/listado-mas-informacion', 'MasInformacionController@consulta')->name('listado-mas-informacion');
Route::get('/listado-mas-informacion/{id}/detalle-mas-informacion', 'MasInformacionController@detalle');
Route::get('/listado-mas-informacion/{id}/editar-mas-informacion', 'MasInformacionController@editar');
Route::put('/listado-mas-informacion/{id}/editar-mas-informacion', 'MasInformacionController@actualizar')->name('actualizar-mas-informacion');
Route::put('/listado-mas-informacion', 'MasInformacionController@filtrar_mas_informacion')->name('filtrar-mas-informacion');
//Listado te llamamos
Route::get('/listado-te-llamamos', 'TeLlamamosController@consulta')->name('listado-te-llamamos');
Route::get('/listado-te-llamamos/{id}/editar-te-llamamos', 'TeLlamamosController@editar');
Route::put('/listado-te-llamamos/{id}/editar-te-llamamos', 'TeLlamamosController@actualizar')->name('actualizar-te-llamamos');
Route::put('/listado-te-llamamos', 'TeLlamamosController@filtrar_te_llamamos')->name('filtrar-te-llamamos');
//Listado curriculums trabaja con nosotros
Route::get('/listado-curriculums', 'CurriculumsController@consulta')->name('listado-curriculums');
Route::get('/listado-curriculums/{id}/detalle-curriculum', 'CurriculumsController@detalle');
Route::get('/listado-curriculums/editar', 'CurriculumsController@editar');
Route::put('/listado-curriculums', 'CurriculumsController@filtrar_curriculums')->name('filtrar-curriculums');
//Listado del sorteo de becas
Route::get('/listado-sorteo-becas', 'SorteoBecasController@consulta')->name('listado-sorteo-becas');
Route::get('/listado-sorteo-becas/{id}/detalle-sorteo-becas', 'SorteoBecasController@detalle');
Route::get('/listado-sorteo-becas/{id}/editar-sorteo-becas', 'SorteoBecasController@editar');
Route::put('/listado-sorteo-becas/{id}/editar-sorteo-becas', 'SorteoBecasController@actualizar')->name('actualizar-sorteo-becas');
Route::put('/listado-sorteo-becas/', 'SorteoBecasController@filtrar_sorteo_becas')->name('filtrar-sorteo-becas');
//Listado newsletter
Route::get('/listado-newsletter', 'NewsletterController@consulta')->name('listado-newsletter');
Route::put('/listado-newsletter', 'NewsletterController@filtrar_newsletter')->name('filtrar-newsletter');
//Listado de ofertas de trabajo externas
Route::get('/listado-ofertas-trabajo', 'OfertasTrabajoController@consulta')->name('listado-ofertas-trabajo');
Route::get('/listado-ofertas-trabajo/{id}/detalle-ofertas-trabajo', 'OfertasTrabajoController@detalle');
Route::get('/listado-ofertas-trabajo/{id}/editar-ofertas-trabajo', 'OfertasTrabajoController@editar');
Route::put('/listado-ofertas-trabajo/{id}/editar-ofertas-trabajo', 'OfertasTrabajoController@actualizar')->name('actualizar-ofertas-trabajo');
Route::put('/listado-ofertas-trabajo/{id}/activar-ofertas-trabajo','OfertasTrabajoController@activar_oferta')->name('activar-ofertas-trabajo');
Route::put('/listado-ofertas-trabajo', 'OfertasTrabajoController@filtrar_ofertas_trabajo')->name('filtrar-ofertas-trabajo');
Route::get('/listado-ofertas-trabajo/{id}/candidatos', 'OfertasTrabajoController@mostrar_candidatos');
//Listado de talleres y eventos
Route::get('/listado-talleresyeventos', 'TalleresYEventosController@consulta')->name('listado-talleresyeventos');
Route::get('/listado-talleresyeventos/{id}/detalle-talleresyeventos', 'TalleresYEventosController@detalle');
Route::get('/listado-talleresyeventos/{id}/editar-talleresyeventos', 'TalleresYEventosController@editar');
Route::put('/listado-talleresyeventos{id}/editar-talleresyeventos', 'TalleresYEventosController@actualizar')->name('actualizar-talleresyeventos');
Route::put('/listado-talleresyeventos', 'TalleresYEventosController@filtrar_talleresyeventos')->name('filtrar-talleresyeventos');