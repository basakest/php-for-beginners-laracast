<?php

$heading = 'My Notes';
$databaseConfig = (require 'config.php')['database'];
$db = new Database($databaseConfig);
$notes = $db->query('SELECT * FROM notes WHERE `user_id` = 1')->get();
// dd($notes);
// dd($db);
require 'views/notes.view.php';
