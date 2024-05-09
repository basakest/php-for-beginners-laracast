<?php

$heading = 'My Notes';
$databaseConfig = (require 'config.php')['database'];
$db = new Database($databaseConfig);
$id = $_GET['id'];
$currentUserId = 1;
$note = $db->query('SELECT * FROM notes WHERE `id` = :id', ['id' => $id])->fetch();
if (!$note) {
    abort();
}
if ($currentUserId !== $note['user_id']) {
    abort(Response::FORBIDDEN);
}
// dd($notes);
// dd($db);
require 'views/note.view.php';
