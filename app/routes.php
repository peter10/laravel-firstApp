<?php

Route::get('/', array('as' => 'home', function()
{
	return View::make('index');
}));

Route::get('users', array('as' => 'user.index', 'uses' => 'UserController@index'));

Route::get('users/register', array('as' => 'user.create', 'uses' => 'UserController@register'));

Route::post('users/register', array('as' => 'user.create.post', 'uses' => 'UserController@postRegister'));

Route::get('users/login', array('as' => 'user.login', 'uses' => 'UserController@login'));

Route::post('users/login', array('as' => 'user.login.post', 'uses' => 'UserController@postLogin'));

Route::get('users/logout', array('as' => 'user.logout', 'uses' => 'UserController@logout'));

Route::get('users/delete/{id}', array('as' => 'user.delete', 'uses' => 'UserController@delete'));

Route::get('colours', array('as' => 'colour.index', 'uses' => 'ColourController@index'));

Route::post('colours/new', array('as' => 'colour.create', 'before' => 'auth', 'uses' => 'ColourController@postColour'));

Route::any('colours/delete/{id}', array('as' => 'colour.delete', 'before' => 'auth', 'uses' => 'ColourController@deleteColour'));