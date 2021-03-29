<?php

use app\core\Application;
use app\controllers\LoginController;
use app\controllers\apis\AuthController;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Application (dirname(__DIR__));
/** 
 * Routes handlers
 */
$app->router->get('/', 'home');
$app->router->get('/login', [LoginController::class, 'login']);
$app->router->post('/login', [LoginController::class, 'handleLogin']);

$app->router->get('/api/login', [AuthController::class, 'login']);
$app->router->post('/api/login', [AuthController::class, 'login']);

$app->router->get('/api/register', [AuthController::class, 'register']);
$app->router->post('/api/register', [AuthController::class, 'register']);

$app->run();