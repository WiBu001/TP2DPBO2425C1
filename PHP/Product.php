<?php
class Product {
    // Properties with strict typing
    private int $id;       // Unique ID of the product
    private string $name;  // Name of the product
    private string $brand; // Brand of the product
    private int $price;    // Price of the product
    private string $image; // Image filename or path (for PHP only)

    // Default constructor (initial values if no parameters are provided)
    public function __construct(int $id = 0, string $name = "", string $brand = "", int $price = 0, string $image = "") {
        $this->id = $id;
        $this->name = $name;
        $this->brand = $brand;
        $this->price = $price;
        $this->image = $image;
    }

    // Getter methods (to retrieve property values)

    // Get product ID
    public function getId(): int {
        return $this->id;
    }

    // Get product name
    public function getName(): string {
        return $this->name;
    }

    // Get product brand
    public function getBrand(): string {
        return $this->brand;
    }

    // Get product price
    public function getPrice(): int {
        return $this->price;
    }

    // Get product image
    public function getImage(): string { 
        return $this->image; 
    }

    // Setter methods (to update property values)

    // Set product name
    public function setName(string $name): void {
        $this->name = $name;
    }

    // Set product brand
    public function setBrand(string $brand): void {
        $this->brand = $brand;
    }

    // Set product price
    public function setPrice(int $price): void {
        $this->price = $price;
    }

    // Set product image
    public function setImage(string $image): void { 
        $this->image = $image; 
    }
}
