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

// Route::get('/asistencia/create',function(){
//     return view('asistencia.create');
// });

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('logout','Auth\LoginController@logout')->name('logout');

Route::get('/plantilas',function(){
    return view('casa');
});
Route::resource('unidadacademica','UnidadAcademicaController');
// Route::resource('rol','TipoUsuarioController');
Route::resource('user','UserController');
Route::resource('roles','RolController');

Route::resource('/herramientas','HerramientaController');


Route::resource('clases','ClaseController');
Route::resource('/asistencias','AsistenciaController');
Route::resource('/personalacademico','PersonalAcademicoController');

Route::get('/coreui',function(){
    return view('coreui');
});

// Route::get('/pdfCompra/{id}', 'CompraController@pdf')->name('compra_pdf');
// Route::get('/generarPdf', 'PersonalAcademicoController@generarPdf')->name('unidades_pdf');
Route::post('/pdfGenerate', 'PersonalAcademicoController@generarPdf')->name('pdf');
Route::post('/generarReporte', 'AsistenciaController@generarReportePdf');