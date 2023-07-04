<?php

namespace Core;


use InvalidArgumentException;

class Container
{
    protected $bindings = [];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new InvalidArgumentException("No matching bindings found for {$key}");
        }
        if (array_key_exists($key, $this->bindings)) {
            $resolver = $this->bindings[$key];

            return call_user_func($resolver);
        }
    }


}