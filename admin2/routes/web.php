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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/inscribir-ofertas', 'HomeController@ofertas')->name('inscribir-ofertas');
Route::post('guardareventos', array('as' => 'guardareventos','uses' => 'CalendarController@create'));
Route::get('cargareventos{id?}','CalendarController@index');