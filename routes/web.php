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
Route::get('/user',function (){
    return view('layouts.user');
});



Route::middleware(["auth","localization"])->group(function () {
    Route::post('/language', 'LangController@postLang')->name('postLang');

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
        Route::post('/{id}/remove' , 'SongController@remove')->name('song.remove');
        Route::post('/{id}/album/{album_id}' , 'SongController@addSong')->name('album_song.add');

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
        Route::post('/{id}/delete', 'AlbumController@delete')->name('album.delete');
        Route::get('/{id}/search', 'AlbumController@searchAddSong')->name('album.search_add');
        Route::post('/{id}/removeSong', 'AlbumController@removeSongSearchAdd')->name('album.removeSong');
        Route::get('/search/album_list_song/{id?}','AlbumController@searchSong')->name('album.searchSong');
        Route::post('/{id}/album_list_song', 'AlbumController@addSong')->name('album.addSong');
        Route::post('/{id}/upload/song' , 'AlbumController@ upload_song_album')->name('album_song.upload');
        Route::post('/{id}/remove' , 'AlbumController@remove')->name('album.remove');
    });

    Route::prefix('artists')->group(function (){

        Route::get('/','ArtistController@index')->name('artist.list');
        Route::get('/{id}/detail','ArtistController@IndexDetail')->name('artist.detail');
        Route::get('/{id}/detail/songs','ArtistController@IndexArtitsSong')->name('artist.detail_artist_song');
        Route::get('/{id}/detail/songs/play','ArtistController@PlaySongsArtist')->name('artist.songs.play');

    });





});