<?php

use Phroute\Phroute\RouteCollector;

$router->filter('auth', function(){
    if(!isset($_SESSION['user']))
    {
        $errors[]='Please login';
        $_SESSION['errors']=$errors;
        header('Location: /login');
        exit() ;
    }
});


$router->controller('/', \App\controllers\frontend\HomeController::class ) ;
$router->controller('/product',\App\controllers\frontend\ProductController::class);
$router->controller('/users', \App\controllers\frontend\UserController::class) ;
//deshboard
$router->group(['before' => 'auth','prefix'=>'deshboard'],function (RouteCollector $router){
    $router->controller('/',\App\Controllers\Backend\DeshboardController::class);
    $router->controller('categories',\App\Controllers\Backend\CategoryController::class);
    $router->controller('/products',\App\Controllers\Backend\ProductController::class);
});



