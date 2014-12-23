<?php

Breadcrumbs::register('index', function($breadcrumbs) {
    $breadcrumbs->push('Home', route('index'));
});

Breadcrumbs::register('registration', function($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push('User Registration', route('registration'));
});

Breadcrumbs::register('category', function($breadcrumbs, $category) {
    $breadcrumbs->parent('blog');

    foreach ($category->ancestors as $ancestor) {
        $breadcrumbs->push($ancestor->title, route('category', $ancestor->id));
    }

    $breadcrumbs->push($category->title, route('category', $category->id));
});

Breadcrumbs::register('page', function($breadcrumbs, $page) {
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});

?>