<?php

/** @var Core\Route $route */
$route->get('/', 'controllers/index.php');
$route->get('/about', 'controllers/about.php');
$route->get('/contact', 'controllers/contact.php');
$route->get('/mission', 'controllers/mission.php');

$route->get('/notes', 'controllers/notes/index.php');
$route->get('/note', 'controllers/notes/show.php');
$route->post('/note', 'controllers/notes/store.php');
$route->delete('/note', 'controllers/notes/destroy.php');
$route->get('/notes/create', 'controllers/notes/create.php');
$route->get('/notes/edit', 'controllers/notes/edit.php');
$route->patch('/note', 'controllers/notes/update.php');
