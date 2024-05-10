<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $databaseConfig = (require 'config.php')['database'];
    $db = new Database($databaseConfig);
    $db->query('INSERT INTO `notes` (`body`, `user_id`) VALUES (:body, :user_id)', [
        'body'    => $_POST['body'],
        'user_id' => 1,
    ]);
}
$heading = 'Create Note';
require 'views/note-create.view.php';
