<?php

use Core\App;
use Core\Db;
use Core\Validator;

extract($_POST);

$db = App::get(Db::class);
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Provide a valid email';
}
if (!Validator::required($email, 1, 255)) {
    $errors['email'] = 'Field is required';
}
if (!Validator::required($name, 1, 255)) {
    $errors['name'] = 'Field is required';
}
if (!Validator::required($password, 6, 255)) {
    $errors['password'] = 'Field is required and min 6';
}

if (count($errors)) {
    view('register/index', ['errors' => $errors]);
    exit;
}

