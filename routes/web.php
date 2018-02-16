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
    return view('map');
})->name('home');

/*Route::get('/{name}', function () {
    return view('map');
});*/

Route::get('/search/{city}/', 'SearchController@searchCity')->name('home');

//Route::get('/search', 'SearchController@getCity');
Route::post('/search', 'SearchController@postMeteo');

Route::get('/search/', 'MeteoController@getMeteo')->name('search');

//Route::get('/search/{data}', 'MeteoController@getMeteo')->name('meteo');

/*Route::get('/search', function () {
    return view('map');
});*/

/*Route::get('/search/{strName}', 'SearchController@getCity')->name('search');*/
/*Route::get('/search', 'SearchController@searchCity');*/


Route::get('/test', function (){
  return 'test';
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('admin');
});


Route::get('admin/getzone', 'ZoneController@get')->name('get_zones');

Route::post('admin/savezone', 'ZoneController@save')->name('save_zone');

Route::post('admin/updatezone', 'ZoneController@update')->name('update_zone');

Route::post('admin/deletezone', 'ZoneController@delete')->name('delete_zone');
