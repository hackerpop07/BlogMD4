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
Route::get('/search', 'HomeController@search')->name('page.search');

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
        Route::post('search', 'PostController@search')->name('post.search');
    });
});


Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback', 'SocialController@Callback');
