<?php
session_start();
require_once "../config/config.php";
require_once "../config/dbconfig.php";
require_once "../engine/Autoloader.php";

use app\engine\Autoloader;
use app\engine\Render;
use app\engine\Request;

spl_autoload_register([new Autoloader(), 'loadClass']);

$request = new Request();
//die();

if (class_exists($request->getControllerClass())) {
    $controller = new ($request->getControllerClass())(new Render());
    $controller->runAction($request->getActionName());
}
