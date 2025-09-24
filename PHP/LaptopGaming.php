<?php
require_once "Laptop.php";

// LaptopGaming is a subclass of Laptop, specifically for gaming laptops
class LaptopGaming extends Laptop {
    private $gpu;          // GPU type
    private $cooler;       // Cooling system
    private $refreshRate;  // Screen refresh rate

    // Constructor with default values
    public function __construct(
        $id = 0,
        $name = "",
        $brand = "",
        $price = 0,
        $processor = "",
        $ram = 0,
        $battery = 0,
        $warranty = 0,
        $gpu = "",
        $cooler = "",
        $refreshRate = 0,
        $image = ""
    ) {
        // Call parent constructor from Laptop
        parent::__construct($id, $name, $brand, $price, $processor, $ram, $battery, $warranty, $image);
        $this->gpu = $gpu;
        $this->cooler = $cooler;
        $this->refreshRate = $refreshRate;
    }

    // Getters
    public function getGpu() { return $this->gpu; }
    public function getCooler() { return $this->cooler; }
    public function getRefreshRate() { return $this->refreshRate; }

    // Setters
    public function setGpu($gpu) { $this->gpu = $gpu; }
    public function setCooler($cooler) { $this->cooler = $cooler; }
    public function setRefreshRate($refreshRate) { $this->refreshRate = $refreshRate; }
    // Method to display a laptop card with details
    public function displayCard($index) {
        echo "<div class='card'>";

        // Display laptop image if available, otherwise show placeholder
        if ($this->getImage()) {
            echo "<img src='uploads/" . htmlspecialchars($this->getImage()) . "' alt='Laptop Image' style='width:100%; border-radius:5px; margin-bottom:10px;'>";
        } else {
            echo "<div style='width:100%; height:150px; background:#ddd; border-radius:5px; display:flex; align-items:center; justify-content:center;'>No Image</div>";
        }   

        // Display laptop information
        echo "<h3>" . htmlspecialchars($this->getName()) . "</h3>";
        echo "<p><strong>Brand:</strong> " . htmlspecialchars($this->getBrand()) . "</p>";
        echo "<p><strong>Price:</strong> Rp " . number_format($this->getPrice(), 0, ',', '.') . "</p>";
        echo "<p><strong>Processor:</strong> " . htmlspecialchars($this->getProcessor()) . "</p>";
        echo "<p><strong>RAM:</strong> " . $this->getRam() . " GB</p>";
        echo "<p><strong>Battery:</strong> " . $this->getBattery() . " Wh</p>";
        echo "<p><strong>Warranty:</strong> " . $this->getWarranty() . " Years</p>";
        echo "<p><strong>GPU:</strong> " . htmlspecialchars($this->getGpu()) . "</p>";
        echo "<p><strong>Cooler:</strong> " . htmlspecialchars($this->getCooler()) . "</p>";
        echo "<p><strong>Refresh Rate:</strong> " . $this->getRefreshRate() . " Hz</p>";

        // Buttons for editing and deleting
        echo "<form method='post' style='display:inline;'>
                <input type='hidden' name='edit_index' value='$index'>
                <button type='submit' class='btn'>Edit</button>
              </form>
              <form method='post' style='display:inline;'>
                <input type='hidden' name='delete_index' value='$index'>
                <button type='submit' class='btn red'>Delete</button>
              </form>";
        echo "</div>";
    }
}
