<?php


use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\RouteParser;
use Phroute\Phroute\Dispatcher ;
require_once 'vendor/autoload.php';
$router=new RouteCollector(new RouteParser());
include_once __DIR__.'/routers.php';


$dispatcher = new Dispatcher($router->getData());

try{
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}catch (HttpRouteNotFoundException $e)  {
    echo $e->getMessage();
    die();
} catch (HttpMethodNotAllowedException $e) {
    echo $e->getMessage();
    die();
}
echo $response;
