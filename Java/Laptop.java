public class Laptop extends Product {
    // Attributes specific to Laptop
    private String processor;
    private int ram;
    private int battery;
    private int warranty;

    // Default constructor
    public Laptop() {
        super(); // call Product() constructor
        this.processor = "";
        this.ram = 0;
        this.battery = 0;
        this.warranty = 0;
    }

    // Constructor with parameters
    public Laptop(int id, String name, String brand, int price,
                  String processor, int ram, int battery, int warranty) {
        super(id, name, brand, price); // call Product constructor with arguments
        this.processor = processor;
        this.ram = ram;
        this.battery = battery;
        this.warranty = warranty;
    }

    // Getters
    public String getProcessor() {
        return processor;
    }

    public int getRam() {
        return ram;
    }

    public int getBattery() {
        return battery;
    }

    public int getWarranty() {
        return warranty;
    }

    // Setters
    public void setProcessor(String processor) {
        this.processor = processor;
    }

    public void setRam(int ram) {
        this.ram = ram;
    }

    public void setBattery(int battery) {
        this.battery = battery;
    }

    public void setWarranty(int warranty) {
        this.warranty = warranty;
    }
}
