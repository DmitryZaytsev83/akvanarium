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

    /**
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void {
        $this->description = $description;
    }

    /**
     * @return int|null
     */
    public function getPrice(): ?int {
        return $this->price;
    }

    /**
     * @param int|null $price
     */
    public function setPrice(?int $price): void {
        $this->price = $price;
    }

    static function getTableName(): string {
        return 'products';
    }
}
