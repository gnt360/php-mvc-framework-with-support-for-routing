<?php

use app\core\Application;
use app\controllers\LoginController;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Application (dirname(__DIR__));
/** 
 * Routes handlers
 */
$app->router->get('/', 'home');
$app->router->get('/login', [LoginController::class, 'login']);
$app->router->post('/login', [LoginController::class, 'handleLogin']);

$app->run();