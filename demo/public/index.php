<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'functions.php';
spl_autoload_register(function ($class) {
    require base_path('Core/' . $class . '.php');
});
// require base_path('Database.php');
// require base_path('Response.php');
require base_path('route.php');

// $databaseConfig = (require 'config.php')['database'];
// $db = new Database($databaseConfig);
// // $posts = $db->query('SELECT * FROM post')->fetchAll(PDO::FETCH_ASSOC);
// $query = 'SELECT * FROM post WHERE id = :id';
// $post = $db->query($query, ['id' => $_GET['id']])->fetch();
//
// // dd(['post' => $post, 'posts' => $posts]);
// dd($post);
