<?php
require_once "Product.php"; // Import Product class

class Laptop extends Product {
    // Additional properties specific to Laptop
    private string $processor; // Laptop processor type
    private int $ram;          // RAM capacity (in GB)
    private int $battery;      // Battery capacity (in mAh)
    private int $warranty;     // Warranty period (in years)

    // Constructor with default values
    public function __construct(
        int $id = 0,
        string $name = "",
        string $brand = "",
        int $price = 0,
        string $processor = "",
        int $ram = 0,
        int $battery = 0,
        int $warranty = 0,
        string $image = ""
    ) {
        // Call parent constructor (Product)
        parent::__construct($id, $name, $brand, $price, $image);

        // Initialize Laptop-specific properties
        $this->processor = $processor;
        $this->ram = $ram;
        $this->battery = $battery;
        $this->warranty = $warranty;
    }

    // Getters (to access private properties)
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

    // Setters (to modify private properties)
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
