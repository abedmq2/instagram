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
Route::get('/images/{id}/{size?}', 'ImagesController@show')->name('images');


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::namespace('Admin')->name('admin.')->prefix('admin')->group(function () {
    Auth::routes();
});
Route::get('verification.notice','HomeController@notice')->name('verification.notice');
Route::get('/home', 'HomeController@index')->name('home');

