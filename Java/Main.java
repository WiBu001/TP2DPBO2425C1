import java.util.ArrayList;
import java.util.Scanner;

public class Main {

    private static void clearScreen() {
        System.out.print("\033[H\033[2J");
    }

    static Scanner sc = new Scanner(System.in);

    static int countDigit(int number) {
        return String.valueOf(number).length();
    }

    public static void displayCatalogue(ArrayList<LaptopGaming> catalogue) {
        if (catalogue.isEmpty()) {
            System.out.println("Catalogue masih kosong!");
            return;
        }

        // Default lebar minimal kolom
        int maxID = 2, maxName = 12, maxBrand = 5, maxPrice = 5;
        int maxProcessor = 9, maxRam = 5, maxBattery = 7, maxWarranty = 7;
        int maxGPU = 3, maxCooler = 6, maxRefresh = 12;

        // Cari panjang maksimum dari data
        for (LaptopGaming lap : catalogue) {
            maxID = Math.max(maxID, String.valueOf(lap.getId()).length());
            maxName = Math.max(maxName, lap.getName().length());
            maxBrand = Math.max(maxBrand, lap.getBrand().length());
            maxPrice = Math.max(maxPrice, String.valueOf(lap.getPrice()).length());
            maxProcessor = Math.max(maxProcessor, lap.getProcessor().length());
            maxRam = Math.max(maxRam, (String.valueOf(lap.getRam()) + " GB").length());
            maxBattery = Math.max(maxBattery, (String.valueOf(lap.getBattery()) + " mAh").length());
            maxWarranty = Math.max(maxWarranty, (String.valueOf(lap.getWarranty()) + " Tahun").length());
            maxGPU = Math.max(maxGPU, lap.getGpu().length());
            maxCooler = Math.max(maxCooler, lap.getCooler().length());
            maxRefresh = Math.max(maxRefresh, (String.valueOf(lap.getRefreshRate()) + " Hz").length());
        }

        // Buat format string dinamis
        String format = "| %-" + maxID + "s"
                + " | %-" + maxName + "s"
                + " | %-" + maxBrand + "s"
                + " | %-" + maxPrice + "s"
                + " | %-" + maxProcessor + "s"
                + " | %-" + maxRam + "s"
                + " | %-" + maxBattery + "s"
                + " | %-" + maxWarranty + "s"
                + " | %-" + maxGPU + "s"
                + " | %-" + maxCooler + "s"
                + " | %-" + maxRefresh + "s |\n";

        // Cetak header
        printLine(maxID, maxName, maxBrand, maxPrice, maxProcessor, maxRam, maxBattery, maxWarranty, maxGPU, maxCooler, maxRefresh);
        System.out.printf(format, "ID", "Nama Laptop", "Brand", "Harga", "Processor", "RAM", "Baterai", "Garansi", "GPU", "Cooler", "Refresh Rate");
        printLine(maxID, maxName, maxBrand, maxPrice, maxProcessor, maxRam, maxBattery, maxWarranty, maxGPU, maxCooler, maxRefresh);

        // Cetak isi tabel
        for (LaptopGaming lap : catalogue) {
            System.out.printf(format,
                    lap.getId(),
                    lap.getName(),
                    lap.getBrand(),
                    lap.getPrice(),
                    lap.getProcessor(),
                    lap.getRam() + " GB",
                    lap.getBattery() + " mAh",
                    lap.getWarranty() + " Tahun",
                    lap.getGpu(),
                    lap.getCooler(),
                    lap.getRefreshRate() + " Hz");
        }
        printLine(maxID, maxName, maxBrand, maxPrice, maxProcessor, maxRam, maxBattery, maxWarranty, maxGPU, maxCooler, maxRefresh);
    }

    private static void printLine(int... widths) {
        StringBuilder sb = new StringBuilder("+");
        for (int w : widths) {
            sb.append("-".repeat(w + 2)).append("+");
        }
        System.out.println(sb);
    }

    static void addLaptop(ArrayList<LaptopGaming> catalogue, int[] idCounter) {
        sc.nextLine(); // flush newline
        System.out.print("Nama Laptop: ");
        String name = sc.nextLine();
        System.out.print("Brand: ");
        String brand = sc.nextLine();
        System.out.print("Harga: ");
        int price = sc.nextInt(); sc.nextLine();
        System.out.print("Processor: ");
        String processor = sc.nextLine();
        System.out.print("RAM (GB): ");
        int ram = sc.nextInt();
        System.out.print("Baterai (mAh): ");
        int battery = sc.nextInt();
        System.out.print("Garansi (tahun): ");
        int warranty = sc.nextInt(); sc.nextLine();
        System.out.print("GPU: ");
        String gpu = sc.nextLine();
        System.out.print("Cooler: ");
        String cooler = sc.nextLine();
        System.out.print("Refresh Rate (Hz): ");
        int refreshRate = sc.nextInt();

        catalogue.add(new LaptopGaming(idCounter[0]++, name, brand, price,
                processor, ram, battery, warranty, gpu, cooler, refreshRate));

        System.out.println("Laptop berhasil ditambahkan!");
    }

    static void menu() {
        System.out.println("=============================================");
        System.out.println("            CATALOGUE LAPTOP GAMING          ");
        System.out.println("=============================================");
        System.out.println("1. Tambah Laptop Gaming");
        System.out.println("2. Tampilkan Catalogue");
        System.out.println("3. Keluar");
        System.out.println("=============================================");
    }

    public static void main(String[] args) {
        ArrayList<LaptopGaming> catalogue = new ArrayList<>();
        int[] id = {1};

        // Dummy data
        catalogue.add(new LaptopGaming(id[0]++, "ROG Strix G18", "Asus", 25000000, "Intel i9-13900HX", 32, 9000, 2, "RTX 4080", "Liquid Cooling", 240));
        catalogue.add(new LaptopGaming(id[0]++, "Predator Helios 16", "Acer", 22000000, "Intel i7-13700HX", 16, 8000, 2, "RTX 4070", "AeroBlade 3D", 165));
        catalogue.add(new LaptopGaming(id[0]++, "Legion Pro 7", "Lenovo", 23000000, "AMD Ryzen 9 7945HX", 32, 9900, 3, "RTX 4090", "ColdFront 5.0", 240));
        catalogue.add(new LaptopGaming(id[0]++, "Alienware m18", "Dell", 28000000, "Intel i9-13980HX", 64, 10000, 3, "RTX 4090", "Cryo-Tech", 480));
        catalogue.add(new LaptopGaming(id[0]++, "MSI Raider GE78", "MSI", 24000000, "Intel i9-13950HX", 32, 9500, 2, "RTX 4080", "Cooler Boost 5", 240));

        clearScreen();
        int choice;
        do {
            menu();
            System.out.print("Masukkan pilihan anda : ");
            choice = sc.nextInt();

            switch (choice) {
                case 1 -> addLaptop(catalogue, id);
                case 2 -> {
                    if (catalogue.isEmpty()) {
                        System.out.println("Catalogue masih kosong!");
                    } else {
                        clearScreen();
                        displayCatalogue(catalogue);
                    }
                }
                case 3 -> System.out.println("Keluar dari program...");
                default -> System.out.println("Pilihan tidak valid");
            }

            if (choice != 3) {
                System.out.println("\nTekan ENTER untuk melanjutkan...");
                sc.nextLine(); // flush
                sc.nextLine(); // tunggu enter
                clearScreen();
            }
        } while (choice != 3);
    }
}
