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
Route::delete('controles/{control}', 'App\Http\Controllers\ControlController@destroy')->name('controles.destroy')->middleware('auth:admin');

Route::resource('temporadas', App\Http\Controllers\TemporadaController::class)->middleware('auth:admin');
