<?php

	Route::resource('movie','MovieController');	
	Route::get('movie/destroy/{id}', ['as' => 'movie/destroy', 'uses' => 'MovieController@destroy']);
	Route::post('movie/show', ['as' => 'movie/show', 'uses' => 'MovieController@show']);
	Route::post('movie/store', ['as' => 'movie/store', 'uses' => 'MovieController@store']);

	Route::resource('user','UserController');
	Route::get('user/destroy/{id}', ['as' => 'user/destroy', 'uses' => 'UserController@destroy']);
	Route::post('user/show', ['as' => 'user/show', 'uses' => 'UserController@show']);

	Route::resource('category','CategoryController');
	Route::get('category/destroy/{id}', ['as' => 'category/destroy', 'uses' => 'CategoryController@destroy']);
	Route::post('category/show', ['as' => 'category/show', 'uses' => 'CategoryController@show']);
	Route::post('category/store', ['as' => 'category/store', 'uses' => 'CategoryController@store']);
	Route::put('category/update', ['as' => 'category/update', 'uses' => 'CategoryController@update']);