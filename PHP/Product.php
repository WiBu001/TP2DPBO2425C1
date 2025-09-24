<?php
class Product {
    // Properties dengan tipe data ketat (strict typing)
    private int $id;       // ID unik produk
    private string $name;  // Nama produk
    private string $brand; // Merek produk
    private int $price;    // Harga produk
    private string $image;

    // Constructor default (nilai awal jika tidak diberikan parameter)
    public function __construct(int $id = 0, string $name = "", string $brand = "", int $price = 0, string $image = "") {
        $this->id = $id;
        $this->name = $name;
        $this->brand = $brand;
        $this->price = $price;
        $this->image = $image;
    }

    // Getter (mengambil nilai properti)

    // Ambil ID produk
    public function getId(): int {
        return $this->id;
    }

    // Ambil nama produk
    public function getName(): string {
        return $this->name;
    }

    // Ambil brand produk
    public function getBrand(): string {
        return $this->brand;
    }

    // Ambil harga produk
    public function getPrice(): int {
        return $this->price;
    }

    public function getImage(): string { 
        return $this->image; 
    }

    // Setter (mengubah nilai properti)

    // Ubah nama produk
    public function setName(string $name): void {
        $this->name = $name;
    }

    // Ubah brand produk
    public function setBrand(string $brand): void {
        $this->brand = $brand;
    }

    // Ubah harga produk
    public function setPrice(int $price): void {
        $this->price = $price;
    }

    public function setImage(string $image): void { 
        $this->image = $image; 
    }
}
