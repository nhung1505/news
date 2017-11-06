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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware(["auth"])->group(function () {

    Route::prefix('songs')->group(function () {

        Route::get('/upload', 'SongController@create')->name('song.create');
        Route::post('/upload', 'SongController@upload')->name('song.upload');
        Route::get('/', 'SongController@index')->name('song.list');
        Route::post('/{id}/delete', 'SongController@delete')->name('song.delete');
        Route::get('/{id}/details' , 'SongController@detailSong')->name('song.details_song');
        Route::get('/{id}/edit' , 'SongController@edit')->name('song.showEdit_song');
        Route::post('/{id}/edit' , 'SongController@update')->name('song.edit_song');
        Route::get('/search' , 'SongController@search')->name('song.search');

    });








});