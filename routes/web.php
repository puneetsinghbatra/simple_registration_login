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
    return view('register');
});

Auth::routes();

Route::get('/profile', 'UserController@showProfile')->middleware('auth')->name('profile');
Route::get('/profile/edit', 'UserController@editProfile')->middleware('auth')->name('editprofile');
Route::post('/profile/update', 'UserController@updateProfile')->name('updateprofile');