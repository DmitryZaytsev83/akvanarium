<?php
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("TEMPLATE_DIR", ROOT . DS . ".." . DS . "views" . DS);
define("EXTENSION", ".php");

function dump($obj) {
    echo "<pre>";
    var_dump($obj);
    echo "</pre>";
}
