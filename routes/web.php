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
    return view('auth.login');
});

Route::group(['middleware' => 'auth'] , function () {
    Route::get('/suburb', [
        'uses' => 'SuburbController@index',
        'as' => 'suburb.index'
    ]);

    Route::get('suburb/create', [
        'uses' => 'SuburbController@create',
        'as' => 'suburb.create'
    ]);

    Route::post('suburb/store', [
        'uses' => 'SuburbController@store',
        'as' => 'suburb.store'
    ]);

    Route::get('suburb/delete/{id}', [
        'uses' => 'SuburbController@destroy',
        'as' => 'suburb.delete'
    ]);

    Route::get('club', [
        'uses' => 'ClubController@show',
        'as' => 'club.show'
    ]);

    Route::get('club/search', [
        'uses' => 'ClubController@search',
        'as' => 'club.search'
    ]);

    Route::get('club/create', [
        'uses' => 'ClubController@create',
        'as' => 'club.create'
    ]);

    Route::post('club/store', [
        'uses' => 'ClubController@store',
        'as' => 'club.store'
    ]);

    Route::get('club/shown/{id}', [
        'uses' => 'ClubController@shown',
        'as' => 'club.shown'
    ]);

    Route::get('club/unshown/{id}', [
        'uses' => 'ClubController@unshown',
        'as' => 'club.unshown'
    ]);

    Route::get('club/delete/{id}', [
        'uses' => 'ClubController@destroy',
        'as' => 'club.delete'
    ]);

    Route::get('/category', [
        'uses' => 'CategoryController@index',
        'as' => 'category.index'
    ]);

    Route::get('category/create', [
        'uses' => 'CategoryController@create',
        'as' => 'category.create'
    ]);

    Route::post('category/store', [
        'uses' => 'CategoryController@store',
        'as' => 'category.store'
    ]);

    Route::get('category/delete/{id}', [
        'uses' => 'CategoryController@destroy',
        'as' => 'category.delete'
    ]);

    Route::get('events', [
        'uses' => 'EventController@show',
        'as' => 'event.show'
    ]);

    Route::get('event/search', [
        'uses' => 'EventController@search',
        'as' => 'event.search'
    ]);

    Route::get('event/create', [
        'uses' => 'EventController@create',
        'as' => 'event.create'
    ]);

    Route::post('event/store', [
        'uses' => 'EventController@store',
        'as' => 'event.store'
    ]);

    Route::get('event/delete/{id}', [
        'uses' => 'EventController@destroy',
        'as' => 'event.delete'
    ]);

    Route::get('gallery', [
        'uses' => 'ClubGalleryController@show',
        'as' => 'gallery.show'
    ]);


    Route::get('gallery/create', [
        'uses' => 'ClubGalleryController@create',
        'as' => 'gallery.create'
    ]);

    Route::post('gallery/store', [
        'uses' => 'ClubGalleryController@store',
        'as' => 'gallery.store'
    ]);

    Route::get('gallery/delete/{id}', [
        'uses' => 'ClubGalleryController@destroy',
        'as' => 'gallery.delete'
    ]);


    Route::get('djs', [
        'uses' => 'DjController@show',
        'as' => 'dj.show'
    ]);

    Route::get('dj/search', [
        'uses' => 'DjController@search',
        'as' => 'dj.search'
    ]);

    Route::get('dj/create', [
        'uses' => 'DjController@create',
        'as' => 'dj.create'
    ]);

    Route::post('dj/store', [
        'uses' => 'DjController@store',
        'as' => 'dj.store'
    ]);

    Route::get('dj/delete/{id}', [
        'uses' => 'DjController@destroy',
        'as' => 'dj.delete'
    ]);

    Route::get('dj/shown/{id}', [
        'uses' => 'DjController@shown',
        'as' => 'dj.shown'
    ]);

    Route::get('dj/unshown/{id}', [
        'uses' => 'DjController@unshown',
        'as' => 'dj.unshown'
    ]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
