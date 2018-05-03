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
Route::group(['prefix'=>'admin'],function() {

    Route::resource('categories', 'CategoriesController');
    Route::resource('types', 'TypesController');
    Route::resource('posts', 'PostsController');
    Route::resource('users', 'UsersController');
    Route::resource('slides', 'SlidesController');
    Route::get('ajax/types/{id_category}, AjaxController@get_types');
    Route::get('comments/delete/{id}/{id_post}, CommentsController@get_delete');

});

Route::get('index','PagesController@index');
Route::get('posts/{id}/{unsigned_title}','PagesController@post');
Route::get('types/{id}/{unsigned_title}','PagesController@type');
Route::get('introduce','PagesController@introduce');
Route::get('contact','PagesController@contact');
//
Route::get('sign_in','PagesController@show_sign_in');
Route::post('sign_in','PagesController@post_sign_in');
Route::get('sign_out','PagesController@sign_out');
Route::get('resign','PagesController@show_resign');
Route::post('resign','PagesController@resign');


Route::post('comments/{id}','CommentsController@comment');
Route::post('search','PagesController@search');

Route::get('user','PagesController@get_user');
Route::post('user','PagesController@post_user');
Route::get('posts/create/{id}/{unsigned_title}','PagesController@create_post');
Route::post('posts/create/{id}/{unsigned_title}','PagesController@upload_post');


Route::get('admin/sign_in','UsersController@show_admin_sign_in');
Route::post('admin/sign_in','UsersController@post_admin_sign_in');
Route::get('admin/sign_out','UsersController@sign_admin_out');


