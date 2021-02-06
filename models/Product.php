<?php


namespace app\models;


class Product extends Record {

    /**
     * Product constructor.
     * @param ?int $id
     * @param ?string $title
     * @param ?string $description
     * @param ?int $price
     */
    public function __construct(
        protected ?int $id = null,
        protected ?string $title = null,
        protected ?string $description = null,
        protected ?int $price = null
    ) {
    }

    static function getTableName(): string {
        return 'products';
    }
}
