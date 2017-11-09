<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'Auth\RegisterController@create');
Route::post('/login', 'Auth\LoginController@authenticate');

/*Route::middleware('jwt')->get('/galleries', 'GalleriesController@index');
Route::middleware('jwt')->get('/galleries/{id}', 'GalleriesController@show');
Route::middleware('jwt')->post('/galleries', 'GalleriesController@store');
Route::middleware('jwt')->put('/galleries/{id}', 'GalleriesController@update');
Route::middleware('jwt')->delete('/galleries/{id}', 'GalleriesController@destroy');

Route::middleware('jwt')->get('/photos', 'PhotosController@index');
Route::middleware('jwt')->get('/photos/{id}', 'PhotosController@show');
Route::middleware('jwt')->post('/photos', 'PhotosController@store');
Route::middleware('jwt')->put('/photos/{id}', 'PhotosController@update');
Route::middleware('jwt')->delete('/photos/{id}', 'PhotosController@destroy');

Route::middleware('jwt')->get('/comments', 'CommentsController@index');
Route::middleware('jwt')->get('/comments/{id}', 'CommentsController@show');
Route::middleware('jwt')->post('/comments', 'CommentsController@store');
Route::middleware('jwt')->put('/comments/{id}', 'CommentsController@update');
Route::middleware('jwt')->delete('/comments/{id}', 'CommentsController@destroy');*/

Route::middleware('api')->get('/galleries', 'GalleriesController@index');
Route::middleware('api')->get('/galleries/{id}', 'GalleriesController@show');
Route::middleware('api')->post('/galleries', 'GalleriesController@store');
Route::middleware('api')->put('/galleries/{id}', 'GalleriesController@update');
Route::middleware('api')->delete('/galleries/{id}', 'GalleriesController@destroy');

Route::middleware('api')->get('/photos', 'PhotosController@index');
Route::middleware('api')->get('/photos/{id}', 'PhotosController@show');
Route::middleware('api')->post('/photos', 'PhotosController@store');
Route::middleware('api')->put('/photos/{id}', 'PhotosController@update');
Route::middleware('api')->delete('/photos/{id}', 'PhotosController@destroy');

Route::middleware('api')->get('/comments', 'CommentsController@index');
Route::middleware('api')->get('/comments/{id}', 'CommentsController@show');
Route::middleware('api')->post('/comments', 'CommentsController@store');
Route::middleware('api')->put('/comments/{id}', 'CommentsController@update');
Route::middleware('api')->delete('/comments/{id}', 'CommentsController@destroy');
