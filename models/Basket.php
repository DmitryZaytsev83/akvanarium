<?php


namespace app\models;


class Basket extends Record {
    /**
     * Basket constructor.
     * @param int|null $id
     * @param string|null $session_id
     * @param int|null $product_id
     */
    public function __construct(
        protected ?int $id = null,
        protected ?string $session_id = null,
        protected ?int $product_id = null
    ) {
    }

    static function getTableName(): string {
        return "basket";
    }
}
