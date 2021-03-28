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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'App\Http\Controllers\Auth\AdministradorLoginController@login')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\AdministradorLoginController@authenticate');
Route::get('logout', 'App\Http\Controllers\Auth\AdministradorLoginController@logout')->name('logout');

Route::get('administradorHome', 'App\Http\Controllers\AdministradorHomeController@home')->name('home')->middleware('auth:admin');

Route::get('controles', 'App\Http\Controllers\ControlController@index')->name('controles.index')->middleware('auth:admin');
Route::get('controles/create', 'App\Http\Controllers\ControlController@create')->name('controles.create')->middleware('auth:admin');
Route::post('controles', 'App\Http\Controllers\ControlController@store')->name('controles.store')->middleware('auth:admin');
Route::get('controles/{control}/edit', 'App\Http\Controllers\ControlController@edit')->name('controles.edit')->middleware('auth:admin');
Route::put('controles/{control}', 'App\Http\Controllers\ControlController@update')->name('controles.update')->middleware('auth:admin');
Route::delete('controles/{control}', 'App\Http\Controllers\ControlController@destroy')->name('controles.destroy')->middleware('auth:admin');

Route::get('controles/{control}/pruebas', 'App\Http\Controllers\PruebaControlController@index')->name('pruebasControl.index')->middleware('auth:admin');
Route::get('controles/{control}/pruebas/create', 'App\Http\Controllers\PruebaControlController@create')->name('pruebasControl.create')->middleware('auth:admin');
Route::post('controles/{control}/pruebas', 'App\Http\Controllers\PruebaControlController@store')->name('pruebasControl.store')->middleware('auth:admin');
Route::get('pruebasControl/{pruebaControl}/edit', 'App\Http\Controllers\PruebaControlController@edit')->name('pruebasControl.edit')->middleware('auth:admin');
Route::put('pruebasControl/{pruebaControl}', 'App\Http\Controllers\PruebaControlController@update')->name('pruebasControl.update')->middleware('auth:admin');
Route::delete('pruebasControl/{pruebaControl}', 'App\Http\Controllers\PruebaControlController@destroy')->name('pruebasControl.destroy')->middleware('auth:admin');

Route::resource('temporadas', App\Http\Controllers\TemporadaController::class)->middleware('auth:admin');
