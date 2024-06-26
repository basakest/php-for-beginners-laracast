<?php

namespace Core;

class Authenticator
{
    public function attempt(string $email, string $password): bool
    {
        /** @var Database $db */
        $db = App::resolve(Database::class);
        $user = $db->query('SELECT * FROM `users` WHERE `email` = :email', [
            'email' => $email,
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login(['email' => $email]);
                return true;
            }
        }

        return false;
    }

    public function login(array $user): void
    {
        $_SESSION['user']['email'] = $user['email'];
        session_regenerate_id(true);
    }

    public function logout(): void
    {
        Session::destroy();
    }
}
