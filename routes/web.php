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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('kids','KidController');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('kids/{id}/history', 'KidController@history');
Route::post('ibm/personality-traits', 'IbmWatsonController@getPersonalityTraits')->name('personality.post');
Route::post('ibm/speech-to-text', 'IbmWatsonController@getSpeechToText')->name('speech.post');
Route::get('getDaily', 'IbmWatsonController@getNote');
#Route::post('getText','IbmWatsonController@getText');
Route::post('getText', ['as' => 'getText', 'uses' => 'IbmWatsonController@getText']);
