<?php

namespace Core;

class Validator
{
    public static function string(string $value, int $min = 1, int $max = INF): bool
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email(string $email): bool
    {
        // add : bool to function definition, when the email address is valid, the email string will be convert to true
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function greaterThan(int $value, int $min): bool
    {
        return $value > $min;
    }
}
