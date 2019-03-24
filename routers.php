<?php
$router->controller('/', \App\controllers\frontend\HomeController::class ) ;
$router->controller('/product',\App\controllers\frontend\ProductController::class);
$router->controller('/users', \App\controllers\frontend\UserController::class) ;