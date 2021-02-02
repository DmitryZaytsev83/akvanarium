<?php

function dump($obj) {
    echo "<pre>";
    var_dump($obj);
    echo "</pre>";
}

require_once "../engine/Autoloader.php";

use app\engine\Autoloader;
use app\models\Product;

spl_autoload_register([new Autoloader(), 'loadClass']);

$product = new Product(1, "Product", "description 1", 50);
dump($product);


