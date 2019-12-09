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

Route::resource('clients','ClientController');
Route::resource('providers','ProveedoresController');
Route::resource('categorias','CategoriasController');
Route::post('categorias/destroy/{id}', 'CategoriasController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
