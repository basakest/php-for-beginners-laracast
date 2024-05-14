<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];
$attributes = compact('email', 'password');

$form = LoginForm::validate($attributes);

if (!(new Authenticator)->attempt($email, $password)) {
    $form->error('email', 'email or password is wrong')->throw();
}

redirect('/');
