<?php

$databaseConfig = (require base_path('config.php'))['database'];
$db = new Database($databaseConfig);
$notes = $db->query('SELECT * FROM notes WHERE `user_id` = 1')->get();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes'   => $notes,
]);
