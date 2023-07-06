<?php

namespace Core;

class Auth
{
    public static function attempt($email, $password): bool
    {
        $user = App::get(Db::class)->query('select * from users where email=:email', ['email' => $email])->find();

        if (password_verify($password, $user['password'])) {
            unset($user['password']);
            static::login($user);
            return true;
        }
        return false;
    }


    public static function login($user)
    {
        $_SESSION['user'] = $user;
        session_regenerate_id(1);
    }

    public static function logout()
    {
        $_SESSION = [];
        session_destroy();
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain']);
    }
}