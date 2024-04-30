<?php

require 'functions.php';
// require 'route.php';

$dsn = 'mysql:dbname=myapp;host=127.0.0.1';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);

$statement = $pdo->prepare('SELECT * FROM post');
$statement->execute();
$res = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($res as $post) {
    echo '<li>' . $post['title'] . '</li>';
}

