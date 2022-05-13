<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;
use app\router;
use app\controllers\ProductController;
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config=[
    'userClass'=>\app\models\User::class,
    'db'=>[
        'dsn'=>$_ENV['DB_DSN'],
        'user'=>$_ENV['DB_USER'],
        'pass'=>$_ENV['DB_PASS']
    ]
];

$app = new Application(dirname(__DIR__),$config);


$app->router->get('/',[SiteController::class,'home']);
$app->router->get('/contact',[SiteController::class,'contact']);
$app->router->post('/contact',[SiteController::class,'handleContact']);
#Login
$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);
#Register
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);
#logout
$app->router->get('/logout',[AuthController::class,'logout']);
$app->router->get('/index',[ProductController::class,'indexFalse']);
if(!Application::isGuest()){
    $router= new router();
    $router->get('/index',[new ProductController(),'index']);
    $router->resolve();
}
$app->run();