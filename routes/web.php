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


Route::get('/', 'HomeController@index')->name('page.index');
Route::get('/detail/{id}', 'HomeController@show')->name('page.detail');
Route::get('/about', 'HomeController@about')->name('page.about');
Route::get('/contact', 'HomeController@contact')->name('page.contact');
Route::post('/', 'HomeController@search')->name('page.search');
Route::get('/tag/{tag}', 'HomeController@tag')->name('page.tag');
Route::get('/images', 'HomeController@imagesList')->name('page.images');
Route::get('/images/detail/{id}', 'HomeController@imagesDetail')->name('page.images.detail');


Route::get('/pdf/{id}', 'HomeController@pdf')->name('page.pdf');

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('user')->group(function () {
        Route::get('/edit', 'UserController@edit')->name('user.edit');
        Route::post('/update/{id}', 'UserController@update')->name('user.update');
        Route::get('/changepassword', 'UserController@viewChangePassword')->name('user.viewChangePassword');
        Route::post('/changepassword', 'UserController@changePassword')->name('user.changePassword');
    });
    Route::prefix('posts')->group(function () {
        Route::get('index', 'PostController@index')->name('post.index');
        Route::get('detail/{id}', 'PostController@show')->name('post.show');
        Route::get('create', 'PostController@create')->name('post.create');
        Route::post('create', 'PostController@store')->name('post.store');
        Route::get('edit/{id}', 'PostController@edit')->name('post.edit');
        Route::post('edit/{id}', 'PostController@update')->name('post.update');
        Route::get('delete/{id}', 'PostController@destroy')->name('post.destroy');
        Route::post('index', 'PostController@search')->name('post.search');
        Route::get('/share/{id}', 'PostController@getShareLink')->name('get.shareLink');
        Route::post('/share/{id}', 'PostController@shareLink')->name('shareLink');
        Route::get('/inbox', 'PostController@inbox')->name('inbox');
        Route::get('/inboxDelete/{id}', 'PostController@inboxDelete')->name('inbox.delete');
        Route::get('/send-gmail/{id}', 'PostController@viewSendGmail')->name('view.send');
        Route::post('/send-gmail/{id}', 'PostController@sendGmail')->name('send.gmail');
    });
    Route::prefix('images')->group(function () {
        Route::get('index', 'ImageAlbumController@index')->name('images.index');
        Route::get('detail', 'ImageAlbumController@show')->name('images.show');
        Route::get('create', 'ImageAlbumController@create')->name('images.create');
        Route::post('create', 'ImageAlbumController@store')->name('images.store');
        Route::get('edit/{id}', 'ImageAlbumController@edit')->name('images.edit');
        Route::post('edit/{id}', 'ImageAlbumController@update')->name('images.update');
        Route::get('delete/{id}', 'ImageAlbumController@destroy')->name('images.destroy');
        Route::post('index', 'ImageAlbumController@search')->name('images.search');
        Route::get('/share', 'ImageAlbumController@getShareLink')->name('get.shareLink.images');
        Route::post('/share', 'ImageAlbumController@shareLink')->name('shareLink.images');
        Route::get('/send-gmail', 'ImageAlbumController@viewSendGmail')->name('view.send.images');
        Route::post('/send-gmail', 'ImageAlbumController@sendGmail')->name('send.gmail.images');
    });
});


Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback', 'SocialController@Callback');
