<?php
class Product {
    private int $id;
    private string $name;
    private string $brand;
    private int $price;

    // Constructor default (nilai awal)
    public function __construct(int $id = 0, string $name = "", string $brand = "", int $price = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->brand = $brand;
        $this->price = $price;
    }

    // Getter
    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getBrand(): string {
        return $this->brand;
    }

    public function getPrice(): int {
        return $this->price;
    }

    // Setter
    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setBrand(string $brand): void {
        $this->brand = $brand;
    }

    public function setPrice(int $price): void {
        $this->price = $price;
    }
}