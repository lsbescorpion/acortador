<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => ''], function () {
	Route::get('/', 'BlogController@blogIndex')->name('blogIndex');
	Route::get('/login', 'AuthController@showLogin')->name('showLogin');
	Route::post('/login', 'AuthController@Login')->name('Login');
	Route::post('/logout', 'AuthController@logout')->middleware(['auth'])->name('logout');
	Route::get('/app/dashboard', 'AuthController@DashBoard')->middleware(['auth'])->name('DashBoard');
	Route::get('/404', 'AuthController@Error404')->name('Error404');
	Route::get('/getadsense', 'UsersController@getAdsense')->name('getAdsense');
});

Route::group(['prefix' => 'blog'], function () {
	Route::get('allsalud', 'BlogController@AllSalud')->name('allsalud');
	Route::get('allgracioso', 'BlogController@AllGracioso')->name('allgracioso');
	Route::get('allcuriosidades', 'BlogController@AllCurio')->name('allcuriosidades');
	Route::get('allvideo', 'BlogController@AllVideo')->name('allvideo');
	Route::get('alltecnologia', 'BlogController@AllTecno')->name('alltecnologia');
	Route::get('allmanualidades', 'BlogController@AllManual')->name('allmanualidades');
	Route::get('categoria/{categoria}/{id}', 'BlogController@getBlog')->name('getBlog');
});

Route::group(['prefix' => 'blog', 'middleware' => ['auth','role:Administrador|Moderador']], function () {
	Route::get('addnoticia', 'BlogController@addNoticia')->name('addNoticia');
	Route::post('editnoticia', 'BlogController@editNoticia')->name('editNoticia');
	Route::post('uploadphoto', 'BlogController@uploadPhotoBlog')->name('uploadPhotoBlog');
	Route::post('removephoto', 'BlogController@removePhotoBlog')->name('removePhotoBlog');
	Route::post('updatenoticia', 'BlogController@updateNoticia')->name('updateNoticia');
	Route::get('createnoticia', 'BlogController@createNoticia')->name('createNoticia');
	Route::post('upnoticia', 'BlogController@upNoticia')->name('upNoticia');
	Route::post('deletenoticia', 'BlogController@deleteNoticia')->name('deleteNoticia');
	Route::post('searchblogs', 'BlogController@searchBlogs')->name('searchBlogs');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:Administrador']], function () {
	Route::get('users', 'UsersController@getUsers')->name('users');
	Route::get('createuser', 'UsersController@createUser')->name('createUser');
	Route::post('createuser', 'UsersController@saveUser')->name('saveUser');
	Route::post('uploadphoto', 'UsersController@uploadPhoto')->name('uploadPhoto');
	Route::post('removephoto', 'UsersController@removePhoto')->name('removePhoto');
	Route::post('removephotouser', 'UsersController@removePhotoUser')->name('removePhotoUser');
	Route::get('edituser', 'UsersController@editUser')->name('editUser');
	Route::post('updateuser', 'UsersController@updateUser')->name('updateUser');
	Route::post('activeuser', 'UsersController@activeUser')->name('activeUser');
	Route::post('blockuser', 'UsersController@blockUser')->name('blockUser');
	Route::post('deleteuser', 'UsersController@deleteUser')->name('deleteUser');
	Route::get('estadisticas', 'UsersController@estadisticasAdmin')->name('estadisticasAdmin');
	Route::get('analytic', 'UsersController@getAnalytic')->name('getAnalytic');
	Route::post('deleteurl', 'UsersController@deleteUrl')->name('deleteUrl');
	Route::post('updatecpm', 'UsersController@updateCpm')->name('updateCpm');
});

Route::group(['prefix' => 'client', 'middleware' => ['auth']], function () {
	Route::get('personalin', 'UsersController@personalIn')->name('personalIn');
	Route::post('savepersonalin', 'UsersController@savePersonalIn')->name('savePersonalIn');
	Route::get('infopago', 'UsersController@infoPago')->name('infoPago');
	Route::post('updatepago', 'UsersController@updatePago')->name('updatePago');
	Route::get('password', 'UsersController@passwordUser')->name('passwordUser');
	Route::post('updatepassword', 'UsersController@updatePassword')->name('updatePassword');
	Route::get('gananciamenuales', 'UsersController@GananciaMenuales')->name('GananciaMenuales');
	Route::get('ranking', 'UsersController@Ranking')->name('Ranking');
	Route::post('getstates', 'UsersController@GetStates')->name('GetStates');
	Route::get('pagomensual', 'UsersController@PagoMensual')->name('PagoMensual');
});

Route::group(['prefix' => 'urls', 'middleware' => ['auth']], function () {
	Route::get('list', 'UrlsController@listUrls')->name('listUrls');
	Route::post('acortar', 'UrlsController@acortarUrl')->name('acortarUrl');
	Route::post('disableurl', 'UrlsController@disableUrl')->name('disableUrl');
	Route::post('getestaditicas', 'UrlsController@getEstaditicasUrl')->name('getEstaditicasUrl');
	Route::post('searchurls', 'UrlsController@searchUrls')->name('searchUrls');
});

Route::group(['prefix' => 'publica'], function () {
	Route::get('salud/{id}', 'UrlsController@getUrl');
	Route::get('entretenimiento/{id}', 'UrlsController@getUrl');
	Route::get('curiosidades/{id}', 'UrlsController@getUrl');
	Route::get('videos/{id}', 'UrlsController@getUrl');
	Route::get('tecnologia/{id}', 'UrlsController@getUrl');
	Route::get('manualidades/{id}', 'UrlsController@getUrl');
});

Route::get('/storage/{fileName}', 'UsersController@showAvatar')
 		->where(['fileName' => '.*'])->middleware(['auth'])->name('showAvatar');

Route::get('/img/{fileName}', 'UsersController@showImageUrl')
 		->where(['fileName' => '.*'])->middleware(['auth'])->name('showImageUrl');

Route::get('/systemblog/{fileName}', 'BlogController@showImageBlog')
 		->where(['fileName' => '.*'])->name('showImageBlog');

