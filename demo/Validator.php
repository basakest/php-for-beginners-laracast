<?php

class Validator
{
    public static function string(string $value, int $min = 1, int $max = INF): bool
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
