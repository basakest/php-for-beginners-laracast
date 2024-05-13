<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'email format wrong';
}
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'password must be between 7 and 255 characters';
}

if (!empty($errors)) {
    view('session/create.view.php', [
        'errors' => $errors,
    ]);
}

/** @var Database $db */
$db = App::resolve(Database::class);
$user = $db->query('SELECT * FROM `users` WHERE `email` = :email', [
    'email' => $email,
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login(['email' => $email]);
        header('location: /');
        exit();
    }
}

view('session/create.view.php', [
    'errors' => ['email' => 'email or password is wrong'],
]);

