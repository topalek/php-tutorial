<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate($email, $password)
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Provide a valid email';
        }
        if (!Validator::required($email, 1, 255)) {
            $this->errors['email'] = 'Field is required';
        }

        if (!Validator::required($password)) {
            $this->errors['password'] = 'Field is required';
        }
        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }

}