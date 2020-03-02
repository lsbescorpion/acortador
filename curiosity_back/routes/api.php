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
Route::get('users/ganancias', 'API\UsersController@getGanancias')->name('ganancias');


Route::post('urls/acortar', 'API\UrlsController@acortar')->name('acortar');
Route::get('urls', 'API\UrlsController@getUrls')->name('getUrls');
Route::get('urls/pop', 'API\UrlsController@getUrlsPop')->name('getUrlsPop');
Route::get('url/{url}', 'API\UrlsController@getUrl')->name('url');
Route::get('url/byid/{url}', 'API\UrlsController@getUrlbyId')->name('getUrlbyId');
Route::delete('urls/delete/{url}', 'API\UrlsController@deleteUrl')->name('deleteUrl');
Route::get('urls/estadisticas', 'API\UrlsController@getEstadisticas')->name('getestadisticas');
Route::get('urls/analytic', 'API\UrlsController@getAnalytic')->name('getAnalytic');
Route::get('urls/monthdata', 'API\UrlsController@getMonthData')->name('getMonthData');
Route::get('urls/checkurl/{url}', 'API\UrlsController@CheckUrl')->name('CheckUrl');
Route::get('urls/estadadmin', 'API\UrlsController@getEstadAdmin')->name('getestadadmin');
Route::get('urls/admin', 'API\UrlsController@getUrlsAdmin')->name('geturlsadmin');
Route::delete('urls/del/admin/{url}', 'API\UrlsController@deleteUrlAdmin')->name('deleteurladmin');

Route::get('blogs', 'API\BlogController@getBlogs')->name('getBlogs');
Route::post('blog/photob', 'API\BlogController@photob')->name('photob');
Route::get('blog/removephotob', 'API\BlogController@removePhotob')->name('removephotob');
Route::post('blogs/create', 'API\BlogController@createBlog')->name('createBlog');
Route::put('blogs/update/{blog}', 'API\BlogController@updateBlog')->name('updateBlog');
Route::delete('blogs/delete/{blog}', 'API\BlogController@deleteBlog')->name('deleteblog');
Route::get('blog/{blog}', 'API\BlogController@getBlog')->name('getBlog');
Route::get('blog/edit/{blog}', 'API\BlogController@getBlogEdit')->name('getBlogEdit');
Route::get('blogs/lastnoti3', 'API\BlogController@lastNoti3')->name('lastNoti3');
Route::get('blogs/popular', 'API\BlogController@Popular')->name('popular');
Route::get('blogs/lastsalud', 'API\BlogController@LastSalud')->name('lastsalud');
Route::get('blogs/lastcuriosidad', 'API\BlogController@LastCuriosidades')->name('lastcuriosidad');
Route::get('blogs/lastmanual', 'API\BlogController@LastManualidades')->name('lastmanual');
Route::get('blogs/lastentre', 'API\BlogController@LastEntretenimientos')->name('lastentre');
Route::get('blogs/lastvideo', 'API\BlogController@LastVideos')->name('lastvideo');
Route::get('blogs/lasttecno', 'API\BlogController@LastTecnologia')->name('lasttecno');
Route::get('blogs/allsalud', 'API\BlogController@AllSalud')->name('allsalud');
Route::get('blogs/allgracioso', 'API\BlogController@AllGracioso')->name('allgracioso');
Route::get('blogs/allcuriosidades', 'API\BlogController@AllCurio')->name('allcuriosidades');
Route::get('blogs/allvideo', 'API\BlogController@AllVideo')->name('allvideo');
Route::get('blogs/alltecnologia', 'API\BlogController@AllTecno')->name('alltecnologia');
Route::get('blogs/allmanualidades', 'API\BlogController@AllManual')->name('allmanualidades');
Route::post('blogs/create/mensaje', 'API\BlogController@createMensaje')->name('createMensaje');

Route::get('mgid/getdata', 'API\MgidController@getData')->name('getdata');