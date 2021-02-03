<?php


namespace app\engine;


class Db {
    private static ?Db $instance = null;

    public static function getInstance(): Db {
        if (is_null(static::$instance)) {
            static::$instance = new Db();
        }
        return static::$instance;
    }

    public static function queryOne($sql, $params = []): bool {
        dump($sql);
        return true;
    }

    public static function queryAll($sql, $params = []): bool {
        dump($sql);
        return true;
    }
}
