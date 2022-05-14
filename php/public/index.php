<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;
use app\router;
use app\controllers\ProductController;
use app\controllers\ClubController;
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
$app->router->get('/index/create',[new ProductController(),'createFalse']);
$app->router->post('/index/create',[new ProductController(),'createFalse']);
$app->router->get('/index/update',[new ProductController(),'updateFalse']);
$app->router->post('/index/update',[new ProductController(),'updateFalse']);
$app->router->post('/index/delete',[new ProductController(),'DeleteFalse']);
$app->router->get('/index/info',[new ProductController(),'infoFalse']);
$app->router->get('/clublist',[new ClubController(),'clubListFalse']);
$app->router->get('/clublist/create',[new ClubController(),'createClubFalse']);
$app->router->post('/clublist/create',[new ClubController(),'createClubFalse']);
$app->router->get('/clublist/update',[new ClubController(),'updateClubFalse']);
$app->router->post('/clublist/update',[new ClubController(),'updateClubFalse']);
$app->router->post('/clublist/delete',[new ClubController(),'deleteClubFalse']);
$app->router->get('/clublist/playerlist',[new ProductController(),'getPlayerFromClubFalse']);
$app->router->get('/BT01',[new ProductController(),'BT01']);
if(!Application::isGuest()){
    $router= new router();
    $router->get('/index',[new ProductController(),'index']);
    $router->get('/index/create',[new ProductController(),'create']);
    $router->post('/index/create',[new ProductController(),'create']);
    $router->get('/index/update',[new ProductController(),'update']);
    $router->post('/index/update',[new ProductController(),'update']);
    $router->post('/index/delete',[new ProductController(),'delete']);
    $router->get('/index/info',[new ProductController(),'info']);
    $router->get('/clublist',[new ClubController(),'clubList']);
    $router->get('/clublist/create',[new ClubController(),'createClub']);
    $router->post('/clublist/create',[new ClubController(),'createClub']);
    $router->get('/clublist/update',[new ClubController(),'updateClub']);
    $router->post('/clublist/update',[new ClubController(),'updateClub']);
    $router->post('/clublist/delete',[new ClubController(),'deleteClub']);
    $router->get('/clublist/playerlist',[new ProductController(),'getPlayerFromClub']);
    $router->resolve();
}
$app->run();