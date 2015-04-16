<?php

Route::resource('public', 'PublicController');

Route::get('/', [
	'uses'	=>	'PublicController@index',
	'as'	=>	'index'
]);

/****  DUMMY   ****/
Route::get('/index', [
	'uses'	=>	'PublicController@trial',
	'as'	=>	'trial'
]);
/****  END   ****/

Route::get('registration', [
	'uses'	=>	'PublicController@registration',
	'as'	=>	'registration'
]);

Route::post('user/register', [
	'uses'	=>	'UserController@store',
	'as'	=>	'user.registration'
]);
 
Route::get('user/profile/{id}', [
	'uses'	=>	'ArticleController@showArticlesByUser',
	'as'	=>	'user.profile'
]);

Route::get('user/article/{id}', [
	'uses'	=>	'ArticleController@showArticlesByUser',
	'as'	=>	'user.articles'
]);

Route::get('test', [
	'uses'	=>	'PublicController@test',
	'as'	=>	'public.test'
]);
/** Articles **/

Route::get('article/{id}/create', [
	'uses'	=> 'ArticleController@index',
	'as'	=>	'article.create'
]);

Route::get('article/insert', [
	'uses'	=>	'ArticleController@insert',
	'as'	=>	'article.insert'
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

Route::post('article/publish', [
	'uses'	=>	'ArticleController@publish',
	'as'	=>	'article.publish'
]);

Route::post('file/upload', [
	'uses'	=>	'ArticleController@upload',
	'as'	=>	'article.imgupload'
]);

Route::get('article/test', [
	'uses'	=>	'ArticleController@test',
	'as'	=>	'article.test'
]);

Route::get('article/preview/{id}',[
	'uses'	=>	'ArticleController@preview',
	'as'	=>	'article.preview'
]);

Route::post('article/image', [
	'uses'	=>	'ArticleController@insertImg',
	'as'	=>	'article.image'
]);

Route::post('addon/new', [
	'uses'	=>	'ArticleController@addon',
	'as'	=>	'article.addon'
]);

Route::post('article/favorited', [
	'uses'	=>	'ArticleController@favorite',
	'as'	=>	'article.favorite'
]);

Route::get('article/{id}/favorites', [
	'uses'	=>	'ArticleController@showFavoritedArticles',
	'as'	=>	'articles.favorited'
]);

Route::post('article/delete', [
	'uses'	=>	'ArticleController@delete',
	'as'	=>	'article.delete'
]);

Route::post('addon/edit', [
	'uses'	=>	'ArticleController@addonEdit',
	'as'	=>	'article.addonedit'
]);

Route::post('addon/insert', [
	'uses'	=>	'ArticleController@addonInsert',
	'as'	=>	'article.addoninsert'
]);

Route::post('addon/delete', [
	'uses'	=>	'ArticleController@addonDelete',
	'as'	=>	'addon.delete'
]);

Route::post('addon/twitter', [
	'uses'	=>	'ArticleController@twitter',
	'as'	=>	'addon.twitter'
]);

Route::post('addon/tweet', [
	'uses'	=> 	'ArticleController@tweet',
	'as'	=>	'addon.tweet'
]);

Route::post('addon/picture', [
	'uses'	=>	'ArticleController@addonPic',
	'as'	=>	'addon.picture'
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

Route::get('user/{id}/edit', [
	'uses'	=> 'UserController@edit',
	'as'	=> 'user.edit'
]);

Route::post('user/update', [
	'uses'	=>	'UserController@update',
	'as'	=>	'user.update'
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

//Facebook Authentication
Route::get('fbauth/{auth?}', [
	'uses'	=> 'FacebookController@getFbAuth',
	'as'	=> 'auth.authenticate'
]);

Route::get('authlogout', [
	'uses'	=> 'FacebookController@getLogout',
	'as'	=>	'auth.logout'
]);

Route::get('/privacy-policy', [
	'uses'	=>	'PublicController@privacypolicy',
	'as'	=>	'privacy-policy'
]);

Route::get('/terms-of-services', [
	'uses'	=>	'PublicController@termsofservices',
	'as'	=>	'terms-of-services'
]);

?>