<?php

use app\core\Application;

require_once __DIR__.'/vendor/autoload.php';
require_once './helpers/functions.php';

$app = new Application(__DIR__);

$app->router->get('/', 'index');
$app->router->get('/category', 'category');

$app->run();
?>