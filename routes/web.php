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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('cat', 'CatController');
//Route::resource('feed', 'FeedRecordController');
Route::group(["prefix" => "feedRecord"], function () {
    Route::get('/{cat_id}/create', 'FeedRecordController@create')->name('feed.create');
    Route::post('/create', 'FeedRecordController@store')->name('feed.store');
    
}); 



