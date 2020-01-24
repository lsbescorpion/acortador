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
Route::post('logins', 'API\UsersController@logins')->name('logins');
Route::put('users/logout', 'API\UsersController@logout')->name('logout');
Route::get('users', 'API\UsersController@getUsers')->name('users');
Route::post('users/create', 'API\UsersController@createUser')->name('createUser');
Route::get('user/{user}', 'API\UsersController@getUser')->name('user');
Route::put('users/update/{user}', 'API\UsersController@updateUser')->name('updateUser');
Route::put('users/perfil/{user}', 'API\UsersController@updatePerfil')->name('updatePerfil');
Route::delete('users/delete/{user}', 'API\UsersController@deleteUser')->name('deleteUser');
Route::post('user/photo', 'API\UsersController@photo')->name('photo');
Route::get('user/removephoto', 'API\UsersController@removePhoto')->name('removephoto');
Route::get('usr/remphotos', 'API\UsersController@remPhotos')->name('remphotos');


Route::post('urls/acortar', 'API\UrlsController@acortar')->name('acortar');
Route::get('urls', 'API\UrlsController@getUrls')->name('getUrls');
Route::get('url/{url}', 'API\UrlsController@getUrl')->name('url');
Route::get('url/byid/{url}', 'API\UrlsController@getUrlbyId')->name('getUrlbyId');
Route::delete('urls/delete/{url}', 'API\UrlsController@deleteUrl')->name('deleteUrl');
Route::get('urls/estadisticas', 'API\UrlsController@getEstadisticas')->name('getestadisticas');
Route::get('urls/analytic', 'API\UrlsController@getAnalytic')->name('getAnalytic');