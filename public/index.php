<?php

require_once "../config/config.php";
require_once "../config/dbconfig.php";
require_once "../engine/Autoloader.php";

use app\engine\Autoloader;
use app\engine\Db;
use app\models\Product;

spl_autoload_register([new Autoloader(), 'loadClass']);

$product1 = Product::getOne(5);
dump($product1);
//$product1->delete();
//dump($product1);
//$product = new Product(null, "fish", "simple fish", 10);
//$product->insert();
