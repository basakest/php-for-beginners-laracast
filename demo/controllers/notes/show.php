<?php

use Core\Database;

$databaseConfig = (require base_path('config.php'))['database'];
$db = new Database($databaseConfig);
// permission validate
$currentUserId = 1;
$id = $_GET['id'];
$note = $db->query('SELECT * FROM notes WHERE `id` = :id', ['id' => $id])->findOrFail();
authorize($currentUserId === $note['user_id']);

view('notes/show.view.php', [
    'heading' => 'My Notes',
    'note'    => $note,
]);
