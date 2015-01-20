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

Route::post('article/store', [
	'uses'	=>	'ArticleController@store',
	'as'	=>	'article.store'
]);

Route::get('article/{id}/view', [
	'uses'	=>	'ArticleController@show',
	'as'	=>	'article.view'
]);

Route::get('article/{id}/category', [
	'uses'	=>	'ArticleController@showByCategory',
	'as'	=>	'article.bycategory'
]);

Route::post('article/search', [
	'uses'	=>	'ArticleController@searchArticle',
	'as'	=>	'article.search'
]);

Route::get('article/{id}/country', [
	'uses'	=>	'ArticleController@showByCountry',
	'as'	=>	'article.bycountry'
]);

Route::post('file/upload', [
	'uses'	=>	'ArticleController@upload',
	'as'	=>	'article.imgupload'
]);

/** Login **/

Route::get('login',[
	'uses'	=>	'SessionController@create',
	'as'	=> 'login'
]);

Route::post('user/login', [
	'uses'	=>	'SessionController@store',
	'as'	=>	'user.login'
]);

Route::get('user/logout', [
	'uses'	=>	'SessionController@destroy',
	'as'	=>	'logout'
]);

/** Continent & Countries **/

Route::get('continent/create', [
	'uses'	=>	'CountryController@createContinent',
	'as'	=>	'continent.create'
]);

Route::post('continent/store', [
	'uses'	=>	'CountryController@storeContinent',
	'as'	=>	'continent.store'
]);

Route::get('country/create', [
	'uses'	=>	'CountryController@createCountry',
	'as'	=>	'country.create'
]);

Route::post('counry/store', [
	'uses'	=>	'CountryController@storeCountry',
	'as'	=>	'country.store'
]);

/** Category **/
Route::get('category/create', [
	'uses'	=>	'CategoryController@create',
	'as'	=>	'category.create'
]);

Route::post('category/store', [
	'uses'	=>	'CategoryController@store',
	'as'	=>	'category.store'
]);

?>