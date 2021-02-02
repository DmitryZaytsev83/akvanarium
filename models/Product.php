<?php


namespace app\models;


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
}
