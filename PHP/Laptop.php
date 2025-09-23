<?php
require_once "Product.php"; // Import class Product

class Laptop extends Product {
    private string $processor;
    private int $ram;
    private int $battery;
    private int $warranty;

    // Constructor default
    public function __construct(
        int $id = 0,
        string $name = "",
        string $brand = "",
        int $price = 0,
        string $processor = "",
        int $ram = 0,
        int $battery = 0,
        int $warranty = 0
    ) {
        // Panggil constructor parent (Product)
        parent::__construct($id, $name, $brand, $price);

        $this->processor = $processor;
        $this->ram = $ram;
        $this->battery = $battery;
        $this->warranty = $warranty;
    }

    // Getter
    public function getProcessor(): string {
        return $this->processor;
    }

    public function getRam(): int {
        return $this->ram;
    }

    public function getBattery(): int {
        return $this->battery;
    }

    public function getWarranty(): int {
        return $this->warranty;
    }

    // Setter
    public function setProcessor(string $processor): void {
        $this->processor = $processor;
    }

    public function setRam(int $ram): void {
        $this->ram = $ram;
    }

    public function setBattery(int $battery): void {
        $this->battery = $battery;
    }

    public function setWarranty(int $warranty): void {
        $this->warranty = $warranty;
    }
}