<?php

use Core\Auth;
use Core\Session;
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
Session::flash('errors', $form->errors());
redirect('/login');