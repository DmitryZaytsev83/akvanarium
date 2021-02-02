<?php


namespace app\engine;


class Autoloader {
    public function loadClass(string $classname): void {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $filepath = str_replace(
            ['app', '\\'],
            [DIRECTORY_SEPARATOR . '..', DIRECTORY_SEPARATOR],
            $classname
        );
        $filepath = $root . $filepath . ".php";
        if (file_exists($filepath)) include $filepath;
    }
}
