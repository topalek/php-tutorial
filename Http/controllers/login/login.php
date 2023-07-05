<?php

use Core\App;
use Core\Db;
use Core\Validator;
use Http\Forms\LoginForm;

/**
 * @var string $password
 * @var string $email
 */
extract($_POST);

$db = App::get(Db::class);
$errors = [];

$user = $db->query('select * from users where email=:email', ['email' => $email])->find();
$form = new LoginForm();

if($form->validate($email,$password)){
    view('login/index', ['errors' => $form->errors()]);
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

