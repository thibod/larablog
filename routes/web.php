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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index');
Route::post('/articles/{post_name}', 'ArticlesController@storeComment');
Route::get('contact', 'ContactController@create');
Route::post('contact', 'ContactController@store');

Route::resource('/articles', 'ArticlesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
