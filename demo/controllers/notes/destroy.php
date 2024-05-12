<?php

use Core\Database;

$databaseConfig = (require base_path('config.php'))['database'];
$db = new Database($databaseConfig);
// permission validate
$currentUserId = 1;
$id = $_POST['id'];
$note = $db->query('SELECT * FROM notes WHERE `id` = :id', ['id' => $id])->findOrFail();
authorize($currentUserId === $note['user_id']);

$db->query('delete from `notes` where `id` = :id', ['id' => $_POST['id']]);
header('Location: /notes');
exit();
