<?php

use Core\Router;
use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . "/../";
require '../vendor/autoload.php';

session_start();

$routes = require base_path("bootstrap.php");

$router = new Router();

$routes = require base_path("routes.php");

$path = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($path, $method);
} catch (ValidationException $e) {
    Session::flash('errors', $e->errors);
    Session::flash('old', $e->old);
    redirect($router->previousUrl());
}
Session::unflash();