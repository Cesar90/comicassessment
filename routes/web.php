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
Route::get('/',
    'HomeController@viewindex')
    ->name("indexview");

Route::match(['post', 'get'],'/comic/{comidId?}',
    'HomeController@viewindex')
    ->name("navigationview");