<?php

$router->get('/', "index.php");
$router->get('/about', "about.php");
$router->get('/contact', "contact.php");

$router->get('/notes', "notes/index.php")->only('auth');
$router->get('/note', "notes/view.php");
$router->get('/note/create', "notes/create.php");
$router->post('/note/create', "notes/create.php");
$router->get('/note/edit', "notes/edit.php");
$router->delete('/note', 'notes/delete.php');
$router->patch('/note', 'notes/update.php');

$router->get('/register', 'register/index.php')->only('guest');
$router->post('/register', 'register/register.php');

$router->get('/login', 'login/index.php');
$router->post('/login', 'login/login.php');

$router->delete('/logout', 'logout.php');
