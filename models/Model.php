<?php


namespace app\models;


use app\engine\Db;

abstract class Model {
    protected static Db $db;

    /**
     * Model constructor.
     */
    public function __construct() {
        static::$db = Db::getInstance();
    }

    abstract static function getTableName();

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `id` = {$id}";
        return static::$db->queryOne($sql, [":id" => $id]);
    }

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return static::$db->queryAll($sql);
    }
}
