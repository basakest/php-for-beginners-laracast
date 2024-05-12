<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
// permission validate
$currentUserId = 1;
$id = $_POST['id'];
$note = $db->query('SELECT * FROM notes WHERE `id` = :id', ['id' => $id])->findOrFail();
authorize($currentUserId === $note['user_id']);

$db->query('delete from `notes` where `id` = :id', ['id' => $_POST['id']]);
header('Location: /notes');
exit();
