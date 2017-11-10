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

Route::get('/', ['as' => 'galleries', 'uses' => 'GalleriesController@index']);

Route::get('/galleries/{id}', ['as' => 'single-gallery', 'uses' => 'GalleriesController@show']);

Route::get('/create', ['as' => 'create-gallery', 'uses' => 'GalleriesController@create']);

Route::get('/photos/{id}', ['as' => 'single-photo', 'uses' => 'PhotosController@show']);


Route::post('/galleries', ['as' => 'store-gallery', 'uses' => 'GalleriesController@store']);

Route::post('/galleries/{gallery_id}/photos', ['as' => 'gallery-photos', 'uses' => 'PhotosController@store']);

Route::post('/galleries/{gallery_id}/comments', ['as' => 'gallery-comments', 'uses' => 'CommentsController@store']);

Route::get('edit/galleries/{id}', ['as' => 'gallery-edit', 'uses' => 'GalleriesController@edit']);

Route::post('/galleries/{id}', ['as' => 'update-gallery', 'uses' => 'GalleriesController@update']);

Route::post('/galleries/{id}/photos', ['as' => 'update-photo', 'uses' => 'PhotosController@update']);


Route::delete('/galleries/{id}', ['as' => 'gallery-delete', 'uses' => 'GalleriesController@destroy']);



Route::get('/register', ['as' => 'register', 'uses' => 'RegisterController@create']);
Route::post('/register', 'RegisterController@store');

Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@create']);
Route::post('/login', 'LoginController@store');
Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@destroy']);