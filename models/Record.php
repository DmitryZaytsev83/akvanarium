<?php


namespace app\models;


use app\engine\Db;
use app\interfaces\IRecord;
use JetBrains\PhpStorm\NoReturn;

abstract class Record implements IRecord {

    abstract static function getTableName(): string;

    public static function getOne(int $id): object {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `id` = :id";
        return static::getDb()->queryObject($sql, [":id" => $id],
            static::class);
    }

    public static function getAll(): array {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return static::getDb()->queryAll($sql);
    }

    public static function getCountWhere(string $field, string $value): int {
        $tableName = static::getTableName();
        $sql = "SELECT count(*) as count FROM `{$tableName}` WHERE `{$field}` = :$field";
        return (int)static::getDb()->queryOne($sql, [":$field" => $value])
        ['count'];
    }

    #[NoReturn] private function insert(): void {
        $tableName = static::getTableName();
        $columns = [];
        $values = [];
        foreach ($this as $key => $value) {
            if ($key !== 'id') {
                array_push($columns, "`" . $key . "`");
                array_push($values, "'" . $value . "'");
            }
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", $values);
        $sql = "INSERT INTO `{$tableName}` ({$columns}) VALUES ({$values})";
        static::getDb()->execute($sql);
        $this->id = static::getDb()->getLastInsertId();
    }

    #[NoReturn] private function update(): void {
        $tableName = static::getTableName();
        $values = [];
        foreach ($this as $key => $value) {
            if ($key !== 'id')
                array_push($values, "`$key` = '$value'");
        }
        $values = implode(", ", $values);
        $sql = "UPDATE `{$tableName}` SET {$values} WHERE `id` = :id";
        static::getDb()->execute($sql, [':id' => $this->id]);
    }

    #[NoReturn] public function delete(): void {
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
        static::getDb()->execute($sql, [':id' => $this->id]);
    }

    #[NoReturn] public function save(): void {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public static function getDb(): object {
        return Db::getInstance();
    }
}
