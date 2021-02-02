<?php


namespace app\models;


class Product {
    private int $id;
    private string $title;
    private string $description;
    private int $price;

    /**
     * Product constructor.
     * @param int $id
     * @param string $title
     * @param string $description
     * @param int $price
     */
    public function __construct(int $id, string $title, string $description, int $price) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }
}
