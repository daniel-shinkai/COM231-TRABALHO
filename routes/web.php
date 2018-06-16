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
Route::view('/home', 'welcome')->name('home'); 



Route::post('/login', 'LoginController@login'); 
Route::post('/createAccount', 'LoginController@createAccount'); 
Route::post('/teste', 'ChartController@getFaixaEtariaChartData'); 


