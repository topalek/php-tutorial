<?php

namespace Core;

class Auth
{
    public static function attempt($email, $password): bool
    {
        $user = App::get(Db::class)->query('select * from users where email=:email', ['email' => $email])->find();

        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']);
            static::login($user);
            return true;
        }
        return false;
    }

    public static function login($user)
    {
        Session::put('user', $user);
        session_regenerate_id(1);
    }

    public static function logout()
    {
        Session::destroy();
    }

    public static function user()
    {
        return Session::get('user');
    }

    public static function id()
    {
        return $_SESSION['user']['id'] ?? null;
    }
}