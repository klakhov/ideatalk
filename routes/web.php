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

use Illuminate\Support\Facades\Route;

Route::get('/welcome','PagesController@welcome')->name('welcome')->middleware('guest');
Auth::routes();

Route::get('/', 'PagesController@home')->middleware('auth')->name('home');
Route::get('/profile/{token}','ProfileController@index');
Route::get('/profile/{token}/edit','ProfileController@edit')->middleware('can_edit');
Route::post('/profile/edit','ProfileController@update');

Route::get('/article','ArticleController@index');
Route::get('/new-article','ArticleController@create');
Route::post('/new-article', 'ArticleController@store');

Route::get('/tag','TagController@index');
