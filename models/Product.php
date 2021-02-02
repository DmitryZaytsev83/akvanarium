<?php


namespace app\models;


use app\engine\Db;

class Product {

    /**
     * Product constructor.
     * @param int $id
     * @param string $title
     * @param string $description
     * @param int $price
     */
    public function __construct(
        private int $id,
        private string $title,
        private string $description,
        private int $price
    ) {

    }

    public static function getOne($id) {
        $sql = "SELECT * FROM `products` WHERE `id` = {$id}";
        Db::queryOne($sql, [":id" => $id]);
    }

    public static function getAll() {
        $sql = "SELECT * FROM `products`";
        Db::queryAll($sql);
    }
}
