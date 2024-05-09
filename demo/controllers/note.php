<?php

$heading = 'My Notes';
$databaseConfig = (require 'config.php')['database'];
$db = new Database($databaseConfig);
$id = $_GET['id'];
$note = $db->query('SELECT * FROM notes WHERE `id` = :id', ['id' => $id])->fetch();
// dd($notes);
// dd($db);
require 'views/note.view.php';
