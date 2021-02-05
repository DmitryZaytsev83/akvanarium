<?php


namespace app\models;


use app\engine\Db;
use app\interfaces\IModel;
use JetBrains\PhpStorm\NoReturn;

abstract class Model implements IModel {

    abstract static function getTableName(): string;

    public static function getOne(int $id): array {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `id` = :id";
        return static::getDb()->queryOne($sql, [":id" => $id]);
    }

    public static function getAll(): array {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return static::getDb()->queryAll($sql);
    }

    #[NoReturn] public function insert(): void {
        $tableName = static::getTableName();
        $columns = [];
        $values = [];
        foreach ($this as $key => $value) {
            if ($key != 'id') {
                array_push($columns, "`" . $key . "`");
                array_push($values, "'" . $value . "'");
            }
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", $values);
        $sql = "INSERT INTO `{$tableName}` ({$columns}) VALUES ({$values})";
        static::getDb()->execute($sql);
    }

    public static function getDb(): Db {
        return Db::getInstance();
    }
}
