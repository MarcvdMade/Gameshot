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

Route::get('/', 'FrontpageController@show')->name('frontpage');

//about routes
Route::get('about', 'AboutController@show')->name('about');

//admin routes
Route::middleware('can:is_admin')->group(function(){
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('admin/make', 'AdminController@errorHandler')->name('admin.make');
    Route::get('admin/delete', 'AdminController@errorHandler')->name('admin.delete');
    Route::post('admin/make', 'AdminController@makeAdmin')->name('admin.make');
    Route::delete('admin/delete', 'AdminController@destroy')->name('admin.delete');
});

Auth::routes();

// home routes
Route::get('/home', 'HomeController@index')->name('home');

//filter routes
Route::get('/home/filter/', 'HomeController@filter')->name('filter');
Route::get('/home/tag/{tag}', 'HomeController@tagFilter')->name('tag');
Route::get('/home/search', 'HomeController@search')->name('search');


//crud routes
Route::post('/home', 'HomeController@store');
Route::put('/home/{post}', 'HomeController@update')->name('home.post.update');
Route::get('/home/create', 'HomeController@create')->name('create');
Route::put('/home/{post}/hide', 'HomeController@hide')->name('home.post.hide');
Route::get('/home/{post}', 'HomeController@show')->name('home.post');
Route::get('/home/{post}/edit', 'HomeController@edit')->name('home.post.edit');
Route::delete('/home/{post}', 'HomeController@destroy');

//like routes
Route::get('home/{post}/like', 'PostLikeController@index')->name('home.post.like');
Route::post('home/{post}/like', 'PostLikeController@store')->name('home.post.like');
Route::delete('home/{post}/like', 'PostLikeController@destroy')->name('home.post.like');

//profile routes
Route::patch('profiles/{user:username}', 'ProfilesController@update');
Route::get('profiles/{user:username}', 'ProfilesController@show')->name('profile');
Route::get('profiles/{user:username}/edit', 'ProfilesController@edit');

