<?php


namespace app\models;


use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel {
    protected static Db $db;

    /**
     * Model constructor.
     */
    public function __construct() {
        static::$db = Db::getInstance();
    }

    abstract static function getTableName(): string;

    public static function getOne(int $id): object {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `id` = {$id}";
        return static::$db->queryOne($sql, [":id" => $id]);
    }

    public static function getAll(): array {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return static::$db->queryAll($sql);
    }
}
