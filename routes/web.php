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

Route::get('articles', 'ArticleController@index');

Route::get('articles/create', 'ArticleController@create')->middleware('auth');

Route::post('articles/create', 'ArticleController@store')->middleware('auth');

Route::get('article/{id}', 'ArticleController@show');

Route::get('articles/{id}/edit', 'ArticleController@edit')->middleware('auth');

Route::patch('articles/{id}/update', 'ArticleController@update')->middleware('auth');

Route::get('articles/{id}', 'ArticleController@show');

Route::get('articles/{id}/delete', 'ArticleController@destroy')->middleware('auth');

Route::get('main', 'ArticleController@main');

Route::middleware('auth')->prefix('/admin')->group(['namespace' => 'Admin'], function(){
	Route::get();
});

Route::get('/home', 'HomeController@index')->name('home');

dd()