<?php

/** @var Core\Route $route */
$route->get('/', 'index.php');
$route->get('/about', 'about.php');
$route->get('/contact', 'contact.php');
$route->get('/mission', 'mission.php');

$route->get('/notes', 'notes/index.php')->only('auth');
$route->get('/note', 'notes/show.php')->only('auth');
$route->post('/note', 'notes/store.php')->only('auth');
$route->delete('/note', 'notes/destroy.php')->only('auth');
$route->get('/notes/create', 'notes/create.php')->only('auth');
$route->get('/notes/edit', 'notes/edit.php')->only('auth');
$route->patch('/note', 'notes/update.php')->only('auth');

$route->get('/register', 'registration/create.php')->only('guest');
$route->post('/register', 'registration/store.php');
$route->get('/login', 'session/create.php')->only('guest');
$route->post('/session', 'session/store.php')->only('guest');
$route->delete('/session', 'session/destroy.php')->only('auth');
