<?php

use Core\Auth;
use Http\Forms\LoginForm;

/**
 * @var string $password
 * @var string $email
 */
extract($_POST);

$form = LoginForm::validate(['email' => $email, 'password' => $password]);

if (!Auth::attempt($email, $password)) {
    $form->error('email', 'No matching account for this email & password')->throw();
}
redirect('/');