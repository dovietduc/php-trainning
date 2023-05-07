<?php

spl_autoload_register(
    function ($class) {
        $class = str_replace('\\', '/', $class);
        $classDir = __DIR__ . '/../' . $class . '.php';
        require $classDir;
    }
);
