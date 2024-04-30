<?php

require 'functions.php';
require 'Database.php';
// require 'route.php';

$db = new Database();
$posts = $db->query('SELECT * FROM post')->fetchAll(PDO::FETCH_ASSOC);
$post = $db->query('SELECT * FROM post WHERE id = 1')->fetch(PDO::FETCH_ASSOC);

dd(['post' => $post, 'posts' => $posts]);
