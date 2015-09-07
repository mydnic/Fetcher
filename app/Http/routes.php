<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'Admin\SourceController@index']);
    Route::get('settings', ['as' => 'settings', 'uses' => 'Admin\UserController@edit']);
    Route::put('settings', ['as' => 'settings.update', 'uses' => 'Admin\UserController@update']);
    Route::resource('source', 'Admin\SourceController');
    Route::resource('category', 'Admin\CategoryController');
});

Route::group(['prefix' => 'api/v1'], function () {
    Route::get('category', 'API\CategoryController@index');
    Route::get('category/{id}/{number}', 'API\CategoryController@getArticles');
});
