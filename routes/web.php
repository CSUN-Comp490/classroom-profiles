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
    return view('pages.index');
});

Route::post('store', 'ImageController@store');

Route::get('/login', 'Auth\LoginController@getLogin');
Route::post('/login', 'Auth\LoginController@postLogin')->name('login');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


//Route::get('/image', function () {
//    return view('pages.image');
//})-> name('image');

Route::get('/image', 'ImageController@index',['middleware' => ['auth']])-> name('image');

Route::get('image/{room}', 'ImageController@interactiveImages')->name('image-room');
Route::get('image/{room}', 'ImageController@imageAPI',['middleware' => ['auth']])->name('room-image');


//Route::resource("images","Controller");

//To test getting a room given as a query
Route::get('/map', 'MapsController@map');

//To test a predefined array of rooms at once
Route::get('/mapTest', 'MapsController@mapTest');


//Gets the route between of a collection of rooms, in the order given
Route::get('/route', 'MapsController@mapRoute');


Route::resource("equip","EquipmentsController",['middleware' => ['auth']]);