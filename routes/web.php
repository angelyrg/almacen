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

// Route::get('/dashboard', function () {
//     $sedes = App\Sede::all();
//     return view('dashboard', compact('sedes'));
// });


Route::resource('users', 'UserController')->names('usuarios');
Route::get('perfil', 'UserController@perfil')->name('perfil');
Route::put('perfil', 'UserController@changePassword')->name('password_update');

Route::resource('sucursal', 'SucursalController')->names('sucursales');

Route::resource('articulos', 'ArticuloController')->names('articulos');

Route::resource('entradas', 'EntradaController')->names('entradas');

Route::resource('entradadetalle', 'EntradaDetalleController')->names('entradadetalle');
Route::get('entradadetalle/search', 'EntradaDetalleController@search')->name('entradadetalle.search');


Route::resource('salidas', 'SalidaController')->names('salidas');

Route::resource('salidadetalle', 'SalidaDetalleController')->names('salidadetalle');
Route::get('salidadetalle/search', 'SalidaDetalleController@search')->name('salidadetalle.search');


Auth::routes();
Route::get('home', 'HomeController@index')->name('home');

Route::get('resetPassword', 'HomeController@resetPassword')->name('password.edit');
