<?php

use Core\App;
use Core\Db;
use Core\Validator;

/**
 * @var string $password
 * @var string $email
 */
extract($_POST);

$db = App::get(Db::class);
$errors = [];

$user = $db->query('select * from users where email=:email', ['email' => $email])->find();
if (!$user) {
    $errors['email'] = 'No matching account for this email';
}
if (!Validator::email($email)) {
    $errors['email'] = 'Provide a valid email';
}
if (!Validator::required($email, 1, 255)) {
    $errors['email'] = 'Field is required';
}

if (!Validator::required($password)) {
    $errors['password'] = 'Field is required';
}


if (count($errors)) {
    view('login/index', ['errors' => $errors]);
    exit;
}
if (password_verify($password, $user['password'])) {
    unset($user['password']);
    login($user);
    redirect('/');
} else {
    view('login/index', ['errors' => ['email' => 'No matching account for this email & password']]);
    exit;
}

