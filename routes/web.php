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

Route::view('/', 'login')->name('login');
Route::view('/criar-conta', 'criar-conta');
Route::view('/home', 'dashboard')->name('home'); 
Route::view('/faixa-etaria', 'faixa-etaria'); 

Route::view('/master', 'layout.master'); 
Route::view('/components', 'components'); 



Route::post('/login', 'LoginController@login'); 
Route::post('/createAccount', 'LoginController@createAccount'); 
Route::post('/getFaixaEtariaChartData', 'ChartController@getFaixaEtariaChartData'); 

Route::get('/getUf', 'ChartController@getDistinctRegion'); 
Route::get('/getArea', 'ChartController@getDistinctArea'); 

