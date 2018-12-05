<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List Events
Route::get('eventlist', 'EventController@index');

// List Events in live in current date
Route::get('live', 'EventController@liveEvent');

// List Events in upcoming weeks
Route::get('upcoming', 'EventController@upComing');

// List specific event by id
Route::get('eventbyclick/{id}', 'EventController@showById');

// List all the events in a club
Route::get('eventbyclub/{id}', 'EventController@eventByClub');

// List all the events in a suburb
Route::get('eventbysuburb/{id}', 'EventController@eventBySuburb');

// List all the events in a category
Route::get('eventbycategory/{id}', 'EventController@eventByCategory');

// List all the events in a suburb and category
Route::get('eventbysucat/suid={suid}&&catid={catid}', 'EventController@eventBySuCat');

//List all the Category
Route::get('category', 'CategoryController@index');

// List all clubs
Route::get('club' , 'ClubController@index');

// List specific club by id
Route::get('clubbyid/{id}' , 'ClubController@showById');

// List all club in a suburb
Route::get('clubbysuburb/{id}' ,'ClubController@showBySuburb');

// List all the pictures in the gallery
Route::get('gallerybyclub/{id}' , 'ClubGalleryController@showByClub');

// List all the djs
Route::get('dj' , 'DjController@index');

// List the specified dj's details
Route::get('djbyid/{id}' , 'DjController@showById');

//List of all partners
Route::get('partner', 'PartnerController@index');

//Details of specified partner
Route::get('partner/{id}', 'PartnerController@showById');

//list all the suburb
Route::get('suburb', 'SuburbController@show');

