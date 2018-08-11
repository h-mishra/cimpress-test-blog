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



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function() {
	Route::get('/blog/index','BlogController@index');
	Route::get('/blog/view/{id}','BlogController@view');
	Route::get('/blog/create','BlogController@create');
	Route::get('/blog/edit/{id}','BlogController@edit');
	Route::post('/blog/update/{id}','BlogController@update');
	Route::get('/blog/submitBlog','BlogController@saveBlog');
	Route::post('/blog/submitBlog','BlogController@saveBlog');
	Route::delete('/blog/destroy/{id}','BlogController@destroy');
});

Route::get('/','BlogController@publicIndex');

Route::get('/blog/{id}','BlogController@viewIndex');



