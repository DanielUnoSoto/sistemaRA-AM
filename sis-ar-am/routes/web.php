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

Route::get('/compra',function(){
    return view('compra.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('logout','Auth\LoginController@logout')->name('logout');

Route::get('/casa',function(){
    return view('principal');
});
Route::resource('unidadacademica','UnidadAcademicaController');
// Route::resource('rol','TipoUsuarioController');
Route::resource('user','UserController');
Route::resource('roles','RolController');


Route::resource('clases','ClaseController');
