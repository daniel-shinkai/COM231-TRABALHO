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
Route::view('/regiao', 'relatorio-regiao'); 
Route::view('/crud', 'crud-reclamacao'); 
Route::view('/adhoc', 'relatorio-adhoc'); 



Route::view('/master', 'layout.master'); 
Route::view('/components', 'components'); 



Route::post('/login', 'LoginController@login'); 
Route::post('/createAccount', 'LoginController@createAccount'); 
Route::post('/getFaixaEtariaChartData', 'ChartController@getFaixaEtariaChartData'); 
Route::post('/getProblemaByArea', 'ChartController@getProblemaByArea'); 
Route::post('/getProblemaByAreaAndSituation', 'ChartController@getProblemaByAreaAndSituation'); 

Route::post('/getReclamacaoPorRegiaoEProblema', 'ChartController@getReclamacaoPorRegiaoEProblema'); 
Route::post('/getReclamacaoPorRegiao', 'ChartController@getReclamacaoPorRegiao'); 
Route::post('/saveReclamation', 'ReclamacaoController@saveReclamation'); 
Route::post('/getAreaBySegmento', 'ChartController@getAreaBySegmento'); 




Route::get('/getUf', 'ChartController@getDistinctState'); 
Route::get('/getArea', 'ChartController@getDistinctArea');
Route::get('/getRegion', 'ChartController@getDistinctRegion'); 
Route::get('/getReclamationByArea', 'ChartController@getDistinctAreaAndCount'); 
Route::get('/getSegmento', 'ChartController@getDistinctSegment'); 
Route::get('/getReclamations', 'ReclamacaoController@getReclamations'); 
Route::get('/getFaixaEtaria', 'ReclamacaoController@getFaixaEtaria'); 



