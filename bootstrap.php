<?php

use Core\App;
use Core\Container;
use Core\Db;

$container = new Container();

$container->bind(Db::class, function () {
    $config = require base_path('config/db.php');
    return new Db($config);
});

App::setContainer($container);
