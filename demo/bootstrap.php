<?php

use Core\Container;
use Core\Database;

$container = new Container();

$container->bind(Database::class, function () {
    $databaseConfig = (require base_path('config.php'))['database'];
    return new Database($databaseConfig);
});

Core\App::setContainer($container);
