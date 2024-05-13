<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function validate(string $email, string $password): bool
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = 'email format wrong';
        }
        if (!Validator::string($password, 7, 255)) {
            $this->errors['password'] = 'password must be between 7 and 255 characters';
        }
        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}