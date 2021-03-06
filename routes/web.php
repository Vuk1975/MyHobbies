<?php

use Illuminate\Support\Facades\Route;

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
    return view('starting');
});

Route::get('/info', function () {
    return view('info');
});

/*
Route::get('/test/{name}/{age}', 'HobbyController@index');
*/

Route::resource('hobby', 'HobbyController');

Route::resource('tag', 'TagController');

Route::resource('user', 'UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//filtered view

Route::get('/hobby/tag/{tag_id}', 'HobbyTagController@getFilteredHobbies')->name('hobby_tag');

//attach and detach Tags in hobbies

Route::get('/hobby/{hobby_id}/tag/{tag_id}/attach', 'HobbyTagController@attachTag')->middleware('auth');

Route::get('/hobby/{hobby_id}/tag/{tag_id}/detach', 'HobbyTagController@detachTag')->middleware('auth');

// Delete images from hobby

Route::get('/delete-images/hobby/{hobby_id}', 'HobbyController@deleteImages');

// Delete images from user

Route::get('/delete-images/user/{user_id}', 'UserController@deleteImages');


