public class Laptop extends Product {
    private String processor;
    private int ram;
    private int battery;
    private int warranty;

    // Constructor default
    public Laptop() {
        super(); // panggil constructor Product()
        this.processor = "";
        this.ram = 0;
        this.battery = 0;
        this.warranty = 0;
    }

    // Constructor dengan parameter
    public Laptop(int id, String name, String brand, int price,
                  String processor, int ram, int battery, int warranty) {
        super(id, name, brand, price); // panggil constructor Product dengan argumen
        this.processor = processor;
        this.ram = ram;
        this.battery = battery;
        this.warranty = warranty;
    }

    // Getter
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

    // Setter
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
