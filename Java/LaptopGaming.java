public class LaptopGaming extends Laptop {
    private String gpu;
    private String cooler;
    private int refreshRate;

    // Constructor default
    public LaptopGaming() {
        super(); // panggil constructor Laptop
        this.gpu = "";
        this.cooler = "";
        this.refreshRate = 0;
    }

    // Constructor dengan parameter
    public LaptopGaming(int id, String name, String brand, int price, String processor, int ram, int battery, int warranty, String gpu, String cooler, int refreshRate) {
        super(id, name, brand, price, processor, ram, battery, warranty);
        this.gpu = gpu;
        this.cooler = cooler;
        this.refreshRate = refreshRate;
    }

    // Getter
    public String getGpu() {
        return gpu;
    }

    public String getCooler() {
        return cooler;
    }

    public int getRefreshRate() {
        return refreshRate;
    }

    // Setter
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
