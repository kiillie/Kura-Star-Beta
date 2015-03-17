<?php

Breadcrumbs::register('index', function($breadcrumbs) {
    $breadcrumbs->push('Home', route('index'));
});

Breadcrumbs::register('registration', function($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push('User Registration', route('registration'));
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

    // foreach ($article->ancestors as $ancestor) {
    //     $breadcrumbs->push($ancestor->CURATION_TITLE, route('ARTICLE.VIEW', $ancestor->CURATION_ID));
    // }

    $breadcrumbs->push($article->CURATION_TITLE, route('article.view', $article->CURATION_ID));
});

Breadcrumbs::register('page', function($breadcrumbs, $page) {
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});

?>