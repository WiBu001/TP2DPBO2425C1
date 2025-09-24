public class Product {
    // Common attributes for all products
    private int id;        // unique identifier
    private String name;   // product name
    private String brand;  // product brand
    private int price;     // product price

    // Default constructor
    public Product() {
        this.id = 0;
        this.name = "";
        this.brand = "";
        this.price = 0;
    }

    // Constructor with parameters
    public Product(int id, String name, String brand, int price) {
        this.id = id;
        this.name = name;
        this.brand = brand;
        this.price = price;
    }

    // Getters
    public int getId() {
        return this.id;
    }

    public String getName() {
        return this.name;
    }

    public String getBrand() {
        return this.brand;
    }

    public int getPrice() {
        return this.price;
    }

    // Setters
    public void setName(String name) {
        this.name = name;
    }

    public void setBrand(String brand) {
        this.brand = brand;
    }

    public void setPrice(int price) {
        this.price = price;
    }
}
