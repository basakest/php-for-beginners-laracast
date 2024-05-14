<?php

namespace Core;

class ValidationException extends \Exception
{
    public readonly array $errors;

    public readonly array $old;

    /**
     * @param array $errors
     * @param array $old
     *
     * @return void
     *
     * @throws ValidationException
     */
    public static function throw(array $errors, array $old): void
    {
        $instance = new static('The form failed to validate.');
        $instance->errors = $errors;
        $instance->old = $old;
        throw $instance;
    }
}
