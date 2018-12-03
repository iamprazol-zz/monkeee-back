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

Route::get('/', function () {
    return view('home');
});


Route::group(['middleware' => 'admin'] , function () {

    Route::get('country', [
        'uses' => 'CountryController@show',
        'as' => 'country.show'
    ]);

    Route::get('country/create', [
        'uses' => 'CountryController@create',
        'as' => 'country.create'
    ]);

    Route::post('country/store', [
        'uses' => 'CountryController@store',
        'as' => 'country.store'
    ]);

    Route::get('country/edit/{id}', [
        'uses' => 'CountryController@edit',
        'as' => 'country.edit'
    ]);

    Route::post('country/update/{id}', [
        'uses' => 'CountryController@update',
        'as' => 'country.update'
    ]);

    Route::get('country/delete/{id}', [
        'uses' => 'CountryController@destroy',
        'as' => 'country.delete'
    ]);

    Route::get('city', [
        'uses' => 'CityController@show',
        'as' => 'city.show'
    ]);

    Route::get('city/search', [
        'uses' => 'CityController@search',
        'as' => 'city.search'
    ]);

    Route::get('city/create', [
        'uses' => 'CityController@create',
        'as' => 'city.create'
    ]);

    Route::post('city/store', [
        'uses' => 'CityController@store',
        'as' => 'city.store'
    ]);

    Route::get('city/edit/{id}', [
        'uses' => 'CityController@edit',
        'as' => 'city.edit'
    ]);

    Route::post('city/update/{id}', [
        'uses' => 'CityController@update',
        'as' => 'city.update'
    ]);

    Route::get('city/delete/{id}', [
        'uses' => 'CityController@destroy',
        'as' => 'city.delete'
    ]);

    Route::get('suburb', [
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

    Route::get('suburb/edit/{id}', [
        'uses' => 'SuburbController@edit',
        'as' => 'suburb.edit'
    ]);

    Route::post('suburb/update/{id}', [
        'uses' => 'SuburbController@update',
        'as' => 'suburb.update'
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

    Route::get('club/edit/{id}', [
        'uses' => 'ClubController@edit',
        'as' => 'club.edit'
    ]);

    Route::post('club/update/{id}', [
        'uses' => 'ClubController@update',
        'as' => 'club.update'
    ]);

    Route::get('club/delete/{id}', [
        'uses' => 'ClubController@destroy',
        'as' => 'club.delete'
    ]);

    Route::get('/category', [
        'uses' => 'CategoryController@show',
        'as' => 'category.show'
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

    Route::get('event/edit/{id}', [
        'uses' => 'EventController@edit',
        'as' => 'event.edit'
    ]);

    Route::post('event/update/{id}', [
        'uses' => 'EventController@update',
        'as' => 'event.update'
    ]);

    Route::get('event/delete/{id}', [
        'uses' => 'EventController@destroy',
        'as' => 'event.delete'
    ]);

    Route::get('videos', [
        'uses' => 'VideoController@show',
        'as' => 'video.show'
    ]);

    Route::get('video/search', [
        'uses' => 'VideoController@search',
        'as' => 'video.search'
    ]);

    Route::get('video/create', [
        'uses' => 'VideoController@create',
        'as' => 'video.create'
    ]);

    Route::post('video/store', [
        'uses' => 'VideoController@store',
        'as' => 'video.store'
    ]);

    Route::get('video/delete/{id}', [
        'uses' => 'VideoController@destroy',
        'as' => 'video.delete'
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

    Route::get('dj/edit/{id}', [
        'uses' => 'DjController@edit',
        'as' => 'dj.edit'
    ]);

    Route::post('dj/update/{id}', [
        'uses' => 'DjController@update',
        'as' => 'dj.update'
    ]);

    Route::get('partners', [
        'uses' => 'PartnerController@show',
        'as' => 'partner.show'
    ]);

    Route::get('partner/search', [
        'uses' => 'PartnerController@search',
        'as' => 'partner.search'
    ]);

    Route::get('partner/create', [
        'uses' => 'PartnerController@create',
        'as' => 'partner.create'
    ]);

    Route::post('partner/store', [
        'uses' => 'PartnerController@store',
        'as' => 'partner.store'
    ]);

    Route::get('partner/edit/{id}', [
        'uses' => 'PartnerController@edit',
        'as' => 'partner.edit'
    ]);

    Route::post('partner/update/{id}', [
        'uses' => 'PartnerController@update',
        'as' => 'partner.update'
    ]);

    Route::get('partner/delete/{id}', [
        'uses' => 'PartnerController@destroy',
        'as' => 'partner.delete'
    ]);

    Route::get('partner/shown/{id}', [
        'uses' => 'PartnerController@shown',
        'as' => 'partner.shown'
    ]);

    Route::get('partner/unshown/{id}', [
        'uses' => 'PartnerController@unshown',
        'as' => 'partner.unshown'
    ]);

    Route::get('partnercat', [
        'uses' => 'PartnerCategoryController@show',
        'as' => 'partnercat.show'
    ]);

    Route::get('partnercat/create', [
        'uses' => 'PartnerCategoryController@create',
        'as' => 'partnercat.create'
    ]);

    Route::post('partnercat/store', [
        'uses' => 'PartnerCategoryController@store',
        'as' => 'partnercat.store'
    ]);

    Route::get('partnercat/edit/{id}', [
        'uses' => 'PartnerCategoryController@edit',
        'as' => 'partnercat.edit'
    ]);

    Route::post('partnercat/update/{id}', [
        'uses' => 'PartnerCategoryController@update',
        'as' => 'partnercat.update'
    ]);

    Route::get('partnercat/delete/{id}', [
        'uses' => 'PartnerCategoryController@destroy',
        'as' => 'partnercat.delete'
    ]);

});

