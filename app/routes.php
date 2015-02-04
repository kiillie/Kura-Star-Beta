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

Route::get('article/test', [
	'uses'	=>	'ArticleController@test',
	'as'	=>	'article.test'
]);

Route::post('addon/new', [
	'uses'	=>	'ArticleController@addon',
	'as'	=>	'article.addon'
]);

Route::post('addon/edit', [
	'uses'	=>	'ArticleController@addonEdit',
	'as'	=>	'article.addonedit'
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

Route::get('test', [
	'uses'	=>	'PublicController@test',
	'as'	=>	'test'
]);

Route::post('fetchlink', [
	'uses'	=>	'ArticleController@fetchlink',
	'as'	=>	'fetchlink'
]);

Route::get('tester', [
	'uses'	=>	'PublicController@tester',
	'as'	=>	'tester'
]);
?>