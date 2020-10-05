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

Route::get('admin', 'AdminController@index')->name('admin')->middleware('can:view_admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@store');
Route::put('/home/{post}', 'HomeController@update');
Route::get('/home/create', 'HomeController@create')->name('create');
Route::get('/home/{post}', 'HomeController@show');
Route::get('/home/{post}/edit', 'HomeController@edit');
Route::delete('/home/{post}', 'HomeController@destroy');
