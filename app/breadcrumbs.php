<?php

Breadcrumbs::register('index', function($breadcrumbs) {
    $breadcrumbs->push('HOME', route('index'));
});

Breadcrumbs::register('registration', function($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push('USER REGISTRATION', route('registration'));
});

Breadcrumbs::register('view_article', function($breadcrumbs){
    $breadcrumbs->parent('index');

    $breadcrumbs->push('Article Title', route('article.view'));
});

Breadcrumbs::register('article_category', function($breadcrumbs){
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Category', route('article.bycategory'));
});
Breadcrumbs::register('article', function($breadcrumbs, $article) {
    $breadcrumbs->parent('index');

    $breadcrumbs->push($article->CURATION_TITLE, route('article.view', $article->CURATION_ID));
});
Breadcrumbs::register('country', function($breadcrumbs, $country) {
    $breadcrumbs->parent('index');

    $breadcrumbs->push($country->COUNTRY_NAME);
});
Breadcrumbs::register('category', function($breadcrumbs, $category) {
    $breadcrumbs->parent('index');

    $breadcrumbs->push($category->CATEGORY_NAME);
});
Breadcrumbs::register('search', function($breadcrumbs, $country, $category) {
    $breadcrumbs->parent('index');

	$breadcrumbs->push($country->COUNTRY_NAME, route('article.bycountry', $country->COUNTRY_ID));
    $breadcrumbs->push($category->CATEGORY_NAME, route('article.bycategory', $category->CATEGORY_ID));
});
Breadcrumbs::register('profile', function($breadcrumbs, $user) {
    $breadcrumbs->parent('index');

	$breadcrumbs->push("CURATORS", route('curators'));
    $breadcrumbs->push($user->CURATER, route('user.profile', $user->CURATER_ID));
});
Breadcrumbs::register('login', function($breadcrumbs) {
    $breadcrumbs->parent('index');

	$breadcrumbs->push("USER LOGIN");
});
Breadcrumbs::register('page', function($breadcrumbs, $page) {
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});

?>