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
    return view('home');
});

Route::post('users/{user}/block', 'UserController@block')->name('users.block');
Route::post('users/{user}/unblock', 'UserController@unblock')->name('users.unblock');

Route::resources([
	'lists' => 'CheckListController',
	'lists.items' => 'ItemController',
    'permissions' => 'PermissionController',
    'users' => 'UserController'
]);

Auth::routes();

Route::post('login', 'AuthController@login');

Route::get('/home', 'HomeController@index')->name('home');
