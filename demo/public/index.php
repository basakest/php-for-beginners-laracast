<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require base_path($class . '.php');
});
// require base_path('Database.php');
// require base_path('Response.php');
require base_path('Core/route.php');

// $databaseConfig = (require 'config.php')['database'];
// $db = new Database($databaseConfig);
// // $posts = $db->query('SELECT * FROM post')->fetchAll(PDO::FETCH_ASSOC);
// $query = 'SELECT * FROM post WHERE id = :id';
// $post = $db->query($query, ['id' => $_GET['id']])->fetch();
//
// // dd(['post' => $post, 'posts' => $posts]);
// dd($post);
