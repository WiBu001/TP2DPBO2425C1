public class Product {
    private int id;
    private String name;
    private String brand;
    private int price;

    // Constructor default
    public Product() {
        this.id = 0;
        this.name = "";
        this.brand = "";
        this.price = 0;
    }

    // Constructor dengan parameter
    public Product(int id, String name, String brand, int price) {
        this.id = id;
        this.name = name;
        this.brand = brand;
        this.price = price;
    }

    // Getter
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

    // Setter
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
