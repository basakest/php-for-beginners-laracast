<?php

use Core\Authenticator;
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

view('session/create.view.php', [
    'errors' => $form->errors(),
    // should pass password back when validate false?
    'data'   => compact('email', 'password'),
]);
