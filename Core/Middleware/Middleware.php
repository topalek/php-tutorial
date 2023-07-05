<?php

namespace Core\Middleware;
class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth'  => Auth::class,
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }
        $middleware = static::MAP[$key] ?? false;
        if (!$middleware) {
            throw new \InvalidArgumentException("No matching middleware found for key '{$key}'.");
        }
        (new $middleware())->handle();
    }
}