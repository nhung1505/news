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
        Route::get('/search' , 'SongController@search')->name('song.search');
    });

    Route::prefix('albums')->group(function () {

        Route::get('/create', 'AlbumController@create')->name('album.create');
        Route::post('/create', 'AlbumController@store')->name('album.store');
        Route::post('/{id}/edit', 'AlbumController@edit')->name('album.edit');
        Route::post('/update', 'AlbumController@update')->name('album.update');
        Route::get('/', 'AlbumController@index')->name('album.list');
        Route::get('/{id}/detail','AlbumController@detailAlbum')->name('album.detail_album');
        Route::get('/add_one_song','AlbumController@addOneSong')->name('album.add_one_song');
        Route::get('/{id}/edit' , 'AlbumController@edit')->name('album.showEdit');
        Route::post('/{id}/edit' , 'AlbumController@update')->name('album.edit');

        Route::post('/{id}/upload/song' , 'AlbumController@ upload_song_album')->name('album_song.upload');



    });





});