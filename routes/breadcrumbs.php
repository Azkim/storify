<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Stories > Story
Breadcrumbs::for('stories.index', function (BreadcrumbTrail $trail) {
    $trail->push('Stories Page', route('stories.index'));
});

// Stories > Story
Breadcrumbs::for('stories.show', function (BreadcrumbTrail $trail) {
    $trail->parent('stories.index');
    $trail->push('Story Details', route('stories.index'));
});

// Stories > Create
Breadcrumbs::for('stories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('stories.index');
    $trail->push('Story Create', route('stories.index'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});
