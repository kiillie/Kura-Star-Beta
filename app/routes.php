<?php

Route::resource('public', 'PublicController');

Route::get('/', [
	'uses'	=>	'PublicController@index',
	'as'	=>	'index'
]);

Route::get('registration', [
	'uses'	=>	'PublicController@registration',
	'as'	=>	'registration'
]);

Route::post('user/register', [
	'uses'	=>	'UserController@store',
	'as'	=>	'user.registration'
]);


/** Articles **/

Route::get('article/create', [
	'uses'	=> 'ArticleController@index',
	'as'	=>	'article.create'
]);

Route::get('article/view', [
	'uses'	=>	'ArticleController@show',
	'as'	=>	'article.view'
]);

Route::get('article/category', [
	'uses'	=>	'ArticleController@showByCategory',
	'as'	=>	'article.bycategory'
]);

/** Login **/

Route::post('user/login', [
	'uses'	=>	'SessionController@store',
	'as'	=>	'login'
]);

Route::get('user/logout', [
	'uses'	=>	'SessionController@destroy',
	'as'	=>	'logout'
]);


?>