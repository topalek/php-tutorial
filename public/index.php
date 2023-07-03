<?php

use Core\Router;

const BASE_PATH = __DIR__ . "/../";
require(BASE_PATH . 'Core/functions.php');

spl_autoload_register(function ($class) {
    $class = str_replace('\\',DIRECTORY_SEPARATOR,$class);
    require base_path($class . '.php');
});

$router = new Router();

$routes = require base_path("routes.php");

$path = parse_url($_SERVER['REQUEST_URI'])['path'];