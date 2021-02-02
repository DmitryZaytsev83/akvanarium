<?php


namespace app\engine;


class Db {
    public static function queryOne($sql, $params = []): bool {
        dump($sql);
        return true;
    }

    public static function queryAll($sql, $params = []): bool {
        dump($sql);
        return true;
    }
}
