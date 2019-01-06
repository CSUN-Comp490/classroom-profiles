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



/*
Route::get('/equip', function () {
    return "This is equip";
});
Route::get("/classRoomNumber/{roomNum}",function($roomNum){
    return $roomNum;
});
Route::get('/equip', function () {
    return view('pages.equip');
});

*/

Route::get('/', function () {
    //$title="This is a test";
    //return view('pages.index')->with("apple",$title);
    return view('pages.index');
});


Route::get('/image', function () {
    return view('image');
})-> name('image');

//To test getting a room given as a query
Route::get('/map', 'MapsController@map');

//To test a predefined array of rooms at once
Route::get('/mapTest', 'MapsController@mapTest');

//Gets the route between of a collection of rooms, in the order given
Route::get('/route', 'MapsController@mapRoute');

Route::get('/index', function () {
    //$title="This is a test";
    //return view('pages.index')->with("apple",$title);
    return view('pages.index');
});

Route::resource("equip","EquipmentsController");
