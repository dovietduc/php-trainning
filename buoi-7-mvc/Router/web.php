<?php

// thêm định tuyến với path là gì, sẽ load ra controller, action là gì?
$routeinstance->addRoute(
    '/',
    [
        'controller' => 'App\Http\Controllers\HomeController',
        'action' => 'index'
    ]
);
$routeinstance->addRoute(
    '/news',
    [
        'controller' => 'App\Http\Controllers\NewController',
        'action' => 'index'
    ]
);

// add product
$routeinstance->addRoute(
    '/product/add',
    [
        'controller' => 'App\Http\Controllers\HomeController',
        'action' => 'create'
    ]
);
$routeinstance->addRoute(
    '/product/edit',
    [
        'controller' => 'App\Http\Controllers\HomeController',
        'action' => 'edit'
    ]
);


