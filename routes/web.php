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

Route::get('/','HomeController@index');
Route::get('/dashboard','AdminController@dashboard');
Route::get('/admin/portofolio','AdminController@portofolio');
Route::post('/portofolio','AdminController@create_portofolio');
Route::delete('/portofolio/{id}','AdminController@delete_portofolio');

//API
Route::get('/api/portofolio','API\PortofolioController@index');
Route::get('/api/portofolio/{id}','API\PortofolioController@show');