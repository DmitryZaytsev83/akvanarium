<?php

require_once "../config/config.php";
require_once "../config/dbconfig.php";
require_once "../engine/Autoloader.php";

use app\engine\Autoloader;

spl_autoload_register([new Autoloader(), 'loadClass']);

$controllerName = $_SERVER['REQUEST_URI'];
$uri = explode("/", $controllerName);
$uri = array_filter($uri);
if (count($uri) < 1) {
    $controllerClass = "app\\controllers\\ProductController";
} else
    $controllerClass = "app\\controllers\\" . ucfirst($uri[1]) . "Controller";
if (count($uri) < 2) {
    $actionName = "";
} else {
    $actionName = $uri[2];
}
if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
}
