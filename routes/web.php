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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Auth::routes();

Route::get('/welcome','PagesController@welcome')->name('welcome')->middleware('guest');
Route::get('/idea/{token}','ArticleController@show');

Route::middleware('auth')->group(function(){
    Route::get('/article','ArticleController@index');

    Route::get('/', 'PagesController@home')->name('home');
    Route::get('/bookmarks','PagesController@bookmarks');

    Route::get('/profile/publications','ProfileController@publications');
    Route::get('/profile/{token}','ProfileController@index');
    Route::post('/profile/edit','ProfileController@update');
    Route::get('/profile/{token}/edit','ProfileController@edit')->middleware('can_edit');

    Route::get('/new-idea','ArticleController@create');
    Route::post('/new-idea', 'ArticleController@store');

    Route::get('/tag','TagController@index');
    Route::get('/tag/search','TagController@search');
    Route::get('/tag/load','TagController@load');
    Route::get('/tag/{name}','TagController@show');

    Route::post('/point','PointController@store');

    Route::get('/bookmark', 'BookmarkController@index');
    Route::post('/bookmark','BookmarkController@store');

    Route::get('/featured','ArticleController@featured');
    Route::get('/sub-featured','ArticleController@subFeatured');

    Route::get('/popular','ArticleController@popular');

    Route::post('/follow','FollowController@store');
});


