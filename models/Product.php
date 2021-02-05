<?php


namespace app\models;


class Product extends Model {

    /**
     * Product constructor.
     * @param int $id
     * @param string $title
     * @param string $description
     * @param int $price
     */
    public function __construct(
        protected ?int $id,
        protected string $title,
        protected string $description,
        protected int $price
    ) {
    }

    static function getTableName(): string {
        return 'products';
    }
}
