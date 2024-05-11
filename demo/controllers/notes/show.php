<?php

use Core\Database;

$databaseConfig = (require base_path('config.php'))['database'];
$db = new Database($databaseConfig);
// permission validate
$currentUserId = 1;
$id = $_SERVER['REQUEST_METHOD'] == 'GET' ? $_GET['id'] : $_POST['id'];
$note = $db->query('SELECT * FROM notes WHERE `id` = :id', ['id' => $id])->findOrFail();
authorize($currentUserId === $note['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query('delete from `notes` where `id` = :id', ['id' => $_POST['id']]);
    header('Location: /notes');
    exit();
}

view('notes/show.view.php', [
    'heading' => 'My Notes',
    'note'    => $note,
]);
