<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'email format wrong';
        }
        if (!Validator::string($attributes['password'], 7, 255)) {
            $this->errors['password'] = 'password must be between 7 and 255 characters';
        }
    }

    public static function validate(array $attributes)
    {
        $instance = new self($attributes);

        if ($instance->failed()) {
            ValidationException::throw($instance->errors(), $attributes);
        }
        return $instance;
    }

    public function failed(): bool
    {
        return count($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($key, $message): static
    {
        $this->errors[$key] = $message;
        return $this;
    }

    public function throw(): void
    {
        unset($this->attributes['password']);
        ValidationException::throw($this->errors, $this->attributes);
    }
}