<?php
/**
 * Created by PhpStorm.
 * User: abedmq
 * Date: 04/05/19
 * Time: 08:30 م
 */

Route::middleware(['auth:admin'])->group(function () {


    Route::get('', 'HomeController@index')->name('dashboard');
    Route::post('', 'HomeController@images')->name('images');



    Route::put('users/{id}/change-status', 'UsersController@changeStatus')->name('users.changeStatus');
    Route::resource('categories', 'CategoryController');
    Route::resource('accounts', 'AccountsController');
    Route::resource('images', 'ImagesController');


    Route::get('profile', 'AdminController@profile')->name('profile');
    Route::put('profile/update', 'AdminController@updateProfile')->name('updateProfile');

    Route::post('settings/update', 'SettingsController@update')->name('settings.update');
    Route::get('settings', 'SettingsController@edit')->name('settings.index');

});
