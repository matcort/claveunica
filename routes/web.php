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
cambiar a produccion despues
*/
/*if (env('APP_ENV') === 'testing') {
    URL::forceSchema('https');
}*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/claveunica', 'HomeController@claveunica')->name('claveunica');
Route::post('/oauth', 'AuthController@requestOauth');