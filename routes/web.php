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

Route::get('/','HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Auth::routes();

// Route::resource('/admin/series', 'Admin\SeriesController',['except'=>['create','store']]);

//admin routes

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:edit-users')->group(function(){
    Route::resource('/users', 'UserController',['except'=>['create','store']]);
});
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:edit-users')->group(function(){
    Route::resource('/series', 'SeriesController',['except'=>['create','store']]);
});

Route::resource('/posts', 'PostsController');


//series
Route::resource('/series', 'SeriesController')->middleware('can:is-user');
Route::get('/series/{series}/episode/{episodeNumber}', 'SeriesController@episode')->name('series.episode');

//videos
Route::resource('Videos', 'VideosController');