<?php


namespace app\interfaces;


interface IModel {
    static function getOne(int $id): array;

    static function getAll(): array;

    static function getTableName(): string;
}
