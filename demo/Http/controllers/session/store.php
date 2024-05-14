<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    } else {
        $form->error('email', 'email or password is wrong');
    }
}

// PRG(post, request, get) pattern
Session::flash('errors', $form->errors());
Session::flash('old', compact('email'));
redirect('/login');
