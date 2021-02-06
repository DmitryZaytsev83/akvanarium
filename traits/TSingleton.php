<?php


namespace app\traits;


trait TSingleton {
    private static ?object $instance = null;

    private function __construct() {
    }

    private function __clone() {
    }

    public function __wakeup() {
    }

    public static function getInstance(): object {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}
