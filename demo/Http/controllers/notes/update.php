<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
// permission validate
$currentUserId = 1;
$note = $db->query('SELECT * FROM notes WHERE `id` = :id', ['id' => $_POST['id']])->findOrFail();
authorize($currentUserId === $note['user_id']);



$errors = [];
if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}
if (empty($errors)) {

    $db = App::resolve(Database::class);
    $db->query('UPDATE `notes` SET `body` = :body WHERE `id` = :id', [
        'body' => $_POST['body'],
        'id'   => $note['id'],
    ]);
    redirect('/notes');
}

view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'errors'  => $errors,
    'note'    => $note,
]);
