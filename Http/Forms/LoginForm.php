<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Provide a valid email';
        }
        if (!Validator::required($attributes['email'], 1, 255)) {
            $this->errors['email'] = 'Field is required';
        }

        if (!Validator::required($attributes['password'])) {
            $this->errors['password'] = 'Field is required';
        }
    }


    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function failed()
    {
        return (bool)count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
        return $this;
    }

    public function throw()
    {
        ValidationException::throw($this->errors, $this->attributes);
    }

}