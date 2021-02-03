<?php

require_once "../config/config.php";
require_once "../engine/Autoloader.php";

use app\engine\Autoloader;
use app\models\Product;

spl_autoload_register([new Autoloader(), 'loadClass']);
dump("hello");
$product = new Product(1, "Product", "description 1", 50);
Product::getAll();
dump($product);
