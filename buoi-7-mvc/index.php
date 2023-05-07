<?php

// 1. require file autoload
require __DIR__ . '/autoload/autoload.php';

// require route
$routeinstance = new Router\Route();
require __DIR__ . '/Router/web.php';


// dispath route
$routeinstance->dispatchRoute($_SERVER['REQUEST_URI']);