<?php

require_once "../config/config.php";
require_once "../config/dbconfig.php";
require_once "../engine/Autoloader.php";

use app\engine\Autoloader;
use app\models\Record;
use app\models\Product;

spl_autoload_register([new Autoloader(), 'loadClass']);

/**
 * @var Record $product
 */
$product = Product::getOne(1);
dump($product);
$product->save();
