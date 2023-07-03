<?php
namespace Core;
class Validator
{
    public static function required($value,$min = 1, $max = INF): bool
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <=$max;
    }

    public static function max($value, $limit): bool
    {
        return trim(strlen($value)) > $limit;
    }

    public static function email($value): bool
    {
        return filter_var(trim($value),FILTER_VALIDATE_EMAIL);
    }

}