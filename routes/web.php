<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('dashboard')->group(function() {

	Route::get('users/{user}/roles/{role}/detach', 'UserController@detach')->name('detach.role');
	Route::get('menus/{menu}/roles/{role}/detach', 'MenuController@detach')->name('detach.menu.role');
	Route::get('navigations/{navigation}/roles/{role}', 'NavigationController@detach')->name('detach.nav.role');

	// Resource Elements
	Route::resource('categories', 'CategoryController');
	Route::resource('tags', 'TagController');
	Route::resource('posts', 'PostController');
	Route::resource('menus', 'MenuController');
	Route::resource('navigations', 'NavigationController');
	Route::resource('roles', 'RoleController');
	Route::resource('users', 'UserController');

	Route::get('/', 'DashboardController@index')->name('dashboard');
});
