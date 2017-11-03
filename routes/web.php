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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(["auth"])->group(function () {

    Route::get('/upload', 'SongController@create')->name('song.create');
    Route::post('/upload', 'SongController@upload')->name('song.upload');
    Route::get('/list', 'SongController@index')->name('song.list');
    Route::get('/song/{id}/details_song' , 'SongController@detailSong')->name('song.details_song');
    Route::get('/delete/{id}', 'SongController@delete');





});