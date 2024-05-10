<?php

require 'Validator.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $databaseConfig = (require 'config.php')['database'];
    $db = new Database($databaseConfig);
    $errors = [];
    if (!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required.';
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
