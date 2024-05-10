<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $databaseConfig = (require 'config.php')['database'];
    $db = new Database($databaseConfig);
    $errors = [];
    if (strlen($_POST['body']) == 0) {
        $errors['body'] = 'Note body is required';
    }
    if (strlen($_POST['body']) > 1000) {
        $errors['body'] = 'Note body can not be more than 1,000 characters';
    }
    if (empty($errors)) {
        $db->query('INSERT INTO `notes` (`body`, `user_id`) VALUES (:body, :user_id)', [
            'body'    => $_POST['body'],
            'user_id' => 1,
        ]);
    }
}
$heading = 'Create Note';
require 'views/note-create.view.php';
