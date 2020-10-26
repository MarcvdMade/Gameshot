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

Route::get('about', 'AboutController@show')->name('about');

Route::get('admin', 'AdminController@index')->name('admin')->middleware('can:is_admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/your-posts', 'HomeController@showAllUserPosts')->name('your-posts');
Route::get('/home/tag/{tag}', 'HomeController@tagFilter')->name('tag');
Route::get('/home/tag', 'HomeController@tagFilter')->name('tag-filter');
Route::get('/home/game', 'HomeController@gameFilter')->name('game');
Route::get('/home/search', 'HomeController@search')->name('search');
Route::post('/home/tag', 'HomeController@tagFilter');
Route::post('/home', 'HomeController@store');
Route::put('/home/{post}', 'HomeController@update')->name('home.post.update');
Route::get('/home/create', 'HomeController@create')->name('create');
Route::get('/home/{post}', 'HomeController@show')->name('home.post');
Route::get('/home/{post}/edit', 'HomeController@edit')->name('home.post.edit');
Route::delete('/home/{post}', 'HomeController@destroy');
Route::put('/home/{post}/hide', 'HomeController@hide')->name('home.post.hide');
Route::post('/home/{post}/like', 'PostLikeController@store')->name('home.post.like');
Route::delete('home/{post}/like', 'PostLikeController@destroy')->name('home.post.like');
