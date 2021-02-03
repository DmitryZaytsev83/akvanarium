<?php


namespace app\engine;


class Autoloader {
    public function loadClass(string $classname): void {
        $filepath = str_replace(['app', '\\'], [DS . '..', DS], $classname);
        $filepath = ROOT . $filepath . EXTENSION;
        if (file_exists($filepath)) include $filepath;
    }
}
