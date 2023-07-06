<?php

use Core\Auth;
use Http\Forms\LoginForm;

/**
 * @var string $password
 * @var string $email
 */
extract($_POST);

$errors = [];

$form = new LoginForm();

if ($form->validate($email, $password)) {

    if (Auth::attempt($email, $password)) {
        redirect('/');
    }
    $form->error('email', 'No matching account for this email & password');
}

return view('login/index', ['errors' => $form->errors()]);

