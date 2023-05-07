<?php

// thêm định tuyến với path là gì, sẽ load ra controller, action là gì?
$routeinstance->addRoute(
    '/new/post/{id}',
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