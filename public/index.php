<?php

use app\core\Application;
use app\controllers\LoginController;
use app\controllers\apis\AuthController;

require_once __DIR__.'/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);
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