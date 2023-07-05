<?php

$router->get('/', "controllers/index.php");
$router->get('/about', "controllers/about.php");
$router->get('/contact', "controllers/contact.php");

$router->get('/notes', "controllers/notes/index.php")->only('auth');
$router->get('/note', "controllers/notes/view.php");
$router->get('/note/create', "controllers/notes/create.php");
$router->post('/note/create', "controllers/notes/create.php");
$router->get('/note/edit', "controllers/notes/edit.php");
$router->delete('/note', 'controllers/notes/delete.php');
$router->patch('/note', 'controllers/notes/update.php');

$router->get('/register', 'controllers/register/index.php')->only('guest');
$router->post('/register', 'controllers/register/register.php');

$router->get('/login', 'controllers/login/index.php');
$router->post('/login', 'controllers/login/login.php');

$router->get('/logout', 'controllers/logout.php');
