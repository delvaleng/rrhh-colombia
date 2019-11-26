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
Route::get('/',            'MarcacionController@marcar')->name('marcacions.marcar');
Route::post('/marcarSave', 'MarcacionController@store' )->name('marcacions.store');

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::group(['middleware' => 'auth'], function(){

  Route::get('/home', 'HomeController@index')->name('home');

  Route::resource('rols', 'RolController');

  Route::resource('permisos', 'PermisoController');

  Route::resource('tpMarcacions', 'TpMarcacionController');

  Route::resource('tpDocumentoIdentidads', 'TpDocumentoIdentidadController');

  Route::resource('pais', 'PaisController');

  Route::resource('empleados', 'EmpleadoController');

  // Route::resource('marcacions', 'MarcacionController');
  Route::get('/marcacions',      'MarcacionController@index')->name('marcacions.index');

  Route::get('/report',          'MarcacionController@report')->name('marcacions.report');

  Route::post('/reportSearch',   'MarcacionController@reportSearch')->name('marcacions.reportSearch');

  Route::resource('passwordoEmpleados', 'PasswordoEmpleadoController');

});


Route::resource('horarios', 'HorarioController');
