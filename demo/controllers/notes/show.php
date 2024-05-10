<?php

$heading = 'My Notes';
$databaseConfig = (require 'config.php')['database'];
$db = new Database($databaseConfig);
$id = $_GET['id'];
$currentUserId = 1;
$note = $db->query('SELECT * FROM notes WHERE `id` = :id', ['id' => $id])->findOrFail();

authorize($currentUserId === $note['user_id']);
// dd($notes);
// dd($db);
require 'views/notes/show.view.php';
