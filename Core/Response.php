<?php
namespace Core;

class Response
{
    const NOT_FOUND = 404;
    const FORBIDDEN = 403;

    public static function statusMessages(): array
    {
        return [
            static::FORBIDDEN => 'Forbidden',
            static::NOT_FOUND => 'Not found',
        ];
    }

    public static function statusMessage($statusCode): string
    {
        return static::statusMessages()[$statusCode];
    }
}