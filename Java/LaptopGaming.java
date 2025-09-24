public class LaptopGaming extends Laptop {
    // Attributes specific to gaming laptops
    private String gpu;        // graphics card
    private String cooler;     // cooling system
    private int refreshRate;   // screen refresh rate (Hz)

    // Default constructor
    public LaptopGaming() {
        super(); // call Laptop constructor
        this.gpu = "";
        this.cooler = "";
        this.refreshRate = 0;
    }

    // Constructor with parameters
    public LaptopGaming(int id, String name, String brand, int price,
                        String processor, int ram, int battery, int warranty,
                        String gpu, String cooler, int refreshRate) {
        super(id, name, brand, price, processor, ram, battery, warranty); // call Laptop constructor with arguments
        this.gpu = gpu;
        this.cooler = cooler;
        this.refreshRate = refreshRate;
    }

    // Getters
    public String getGpu() {
        return gpu;
    }

    public String getCooler() {
        return cooler;
    }

    public int getRefreshRate() {
        return refreshRate;
    }

    // Setters
    public void setGpu(String gpu) {
        this.gpu = gpu;
    }

    public void setCooler(String cooler) {
        this.cooler = cooler;
    }

    public void setRefreshRate(int refreshRate) {
        this.refreshRate = refreshRate;
    }
}
