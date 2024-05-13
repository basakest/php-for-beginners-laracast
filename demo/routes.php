<?php

/** @var Core\Route $route */
$route->get('/', 'controllers/index.php');
$route->get('/about', 'controllers/about.php');
$route->get('/contact', 'controllers/contact.php');
$route->get('/mission', 'controllers/mission.php');

$route->get('/notes', 'controllers/notes/index.php')->only('auth');
$route->get('/note', 'controllers/notes/show.php')->only('auth');
$route->post('/note', 'controllers/notes/store.php')->only('auth');
$route->delete('/note', 'controllers/notes/destroy.php')->only('auth');
$route->get('/notes/create', 'controllers/notes/create.php')->only('auth');
$route->get('/notes/edit', 'controllers/notes/edit.php')->only('auth');
$route->patch('/note', 'controllers/notes/update.php')->only('auth');

$route->get('/register', 'controllers/registration/create.php')->only('guest');
$route->post('/register', 'controllers/registration/store.php');
$route->get('/login', 'controllers/session/create.php')->only('guest');
$route->post('/session', 'controllers/session/store.php')->only('guest');
$route->delete('/session', 'controllers/session/destroy.php')->only('auth');
