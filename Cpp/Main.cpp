#include <vector>
#include <algorithm>
#include <math.h>
#include <iomanip>
#include "LaptopGaming.cpp"

//create procedure for clearScreen
void clearScreen() {
#ifdef _WIN32
    system("cls");   // for Windows
#else
    system("clear"); //for Linux/Mac
#endif
}

int countDigit(int number){
    int temp = 0;
    while(number > 0){
        number /= 10;
        temp++;
    }

    return temp;
}

void displayCatalogue(vector<LaptopGaming> catalogue) {
    // Inisialisasi lebar minimum tiap kolom
    int maxID = 2, maxName = 12, maxBrand = 5, maxPrice = 5;
    int maxProcessor = 9, maxRam = 5, maxBattery = 7, maxWarranty = 7;
    int maxGPU = 3, maxCooler = 6, maxRefresh = 12; // 12 biar muat "Refresh Rate"

    // Cari panjang maksimal tiap kolom dari data
    for (auto &lap : catalogue) {
        maxID = max(maxID, countDigit(lap.getId()));
        maxName = max(maxName, (int)lap.getName().size());
        maxBrand = max(maxBrand, (int)lap.getBrand().size());
        maxPrice = max(maxPrice, countDigit(lap.getPrice()));
        maxProcessor = max(maxProcessor, (int)lap.getProcessor().size());
        maxRam = max(maxRam, (int)(to_string(lap.getRam()).size() + 3)); // + "GB"
        maxBattery = max(maxBattery, (int)(to_string(lap.getBattery()).size() + 4)); // + " mAh"
        maxWarranty = max(maxWarranty, (int)(to_string(lap.getWarranty()).size() + 6)); // + " Tahun"
        maxGPU = max(maxGPU, (int)lap.getGpu().size());
        maxCooler = max(maxCooler, (int)lap.getCooler().size());
        maxRefresh = max(maxRefresh, (int)(to_string(lap.getRefreshRate()).size() + 3)); // + " Hz"
    }

    // Function print garis
    auto printLine = [&]() {
        cout << "+-" << string(maxID, '-') 
             << "-+-" << string(maxName, '-') 
             << "-+-" << string(maxBrand, '-') 
             << "-+-" << string(maxPrice, '-') 
             << "-+-" << string(maxProcessor, '-') 
             << "-+-" << string(maxRam, '-') 
             << "-+-" << string(maxBattery, '-') 
             << "-+-" << string(maxWarranty, '-') 
             << "-+-" << string(maxGPU, '-') 
             << "-+-" << string(maxCooler, '-') 
             << "-+-" << string(maxRefresh, '-') << "-+" << endl;
    };

    // Print header
    printLine();
    cout << "| " << left << setw(maxID) << "ID"
         << " | " << setw(maxName) << "Nama Laptop"
         << " | " << setw(maxBrand) << "Brand"
         << " | " << setw(maxPrice) << "Harga"
         << " | " << setw(maxProcessor) << "Processor"
         << " | " << setw(maxRam) << "RAM"
         << " | " << setw(maxBattery) << "Baterai"
         << " | " << setw(maxWarranty) << "Garansi"
         << " | " << setw(maxGPU) << "GPU"
         << " | " << setw(maxCooler) << "Cooler"
         << " | " << setw(maxRefresh) << "Refresh Rate"
         << " |" << endl;
    printLine();

    // Print data tiap laptop
    for (auto &lap : catalogue) {
        cout << "| " << setw(maxID) << lap.getId()
             << " | " << setw(maxName) << lap.getName()
             << " | " << setw(maxBrand) << lap.getBrand()
             << " | " << setw(maxPrice) << lap.getPrice()
             << " | " << setw(maxProcessor) << lap.getProcessor()
             << " | " << setw(maxRam) << (to_string(lap.getRam()) + " GB")
             << " | " << setw(maxBattery) << (to_string(lap.getBattery()) + " mAh")
             << " | " << setw(maxWarranty) << (to_string(lap.getWarranty()) + " Tahun")
             << " | " << setw(maxGPU) << lap.getGpu()
             << " | " << setw(maxCooler) << lap.getCooler()
             << " | " << setw(maxRefresh) << (to_string(lap.getRefreshRate()) + " Hz")
             << " |" << endl;
    }

    printLine();
}

void addLaptop(vector<LaptopGaming> &catalogue, int &idCounter) {
    string name, brand, processor, gpu, cooler; int price, ram, battery, warranty, refreshRate;

    cin.ignore();
    cout << "Nama Laptop: "; getline(cin, name);
    cout << "Brand: "; getline(cin, brand);
    cout << "Harga: "; cin >> price;
    cin.ignore();
    cout << "Processor: "; getline(cin, processor);
    cout << "RAM (GB): "; cin >> ram;
    cout << "Baterai (mAh): "; cin >> battery;
    cout << "Garansi (tahun): "; cin >> warranty;
    cin.ignore();
    cout << "GPU: "; getline(cin, gpu);
    cout << "Cooler: "; getline(cin, cooler);
    cout << "Refresh Rate (Hz): "; cin >> refreshRate;

    catalogue.push_back(LaptopGaming(idCounter++, name, brand, price, processor, ram, battery, warranty, gpu, cooler, refreshRate));
    cout << "Laptop berhasil ditambahkan!" << endl;
}

void menu(){
    cout << "=============================================" << endl;
    cout << "            CATALOGUE LAPTOP GAMING          " << endl;
    cout << "=============================================" << endl;
    cout << "1. Tambah Laptop Gaming" << endl;
    cout << "2. Tampilkan Catalogue" << endl;
    cout << "3. Keluar" << endl;
    cout << "=============================================" << endl;
}

int main(){
    vector<LaptopGaming> catalogue;
    int id = 1;

    catalogue.push_back(LaptopGaming(id++, "ROG Strix G18", "Asus", 25000000, "Intel i9-13900HX", 32, 9000, 2, "RTX 4080", "Liquid Cooling", 240));
    catalogue.push_back(LaptopGaming(id++, "Predator Helios 16", "Acer", 22000000, "Intel i7-13700HX", 16, 8000, 2, "RTX 4070", "AeroBlade 3D", 165));
    catalogue.push_back(LaptopGaming(id++, "Legion Pro 7", "Lenovo", 23000000, "AMD Ryzen 9 7945HX", 32, 9900, 3, "RTX 4090", "ColdFront 5.0", 240));
    catalogue.push_back(LaptopGaming(id++, "Alienware m18", "Dell", 28000000, "Intel i9-13980HX", 64, 10000, 3, "RTX 4090", "Cryo-Tech", 480));
    catalogue.push_back(LaptopGaming(id++, "MSI Raider GE78", "MSI", 24000000, "Intel i9-13950HX", 32, 9500, 2, "RTX 4080", "Cooler Boost 5", 240));


    clearScreen();
    int choice = 0;
    do{
        menu();
        cout << "Masukkan pilihan anda : ";
        cin >> choice;

        switch(choice){
            case 1:
                addLaptop(catalogue, id);
                break;
            case 2:
                if (catalogue.empty()) {
                    cout << "Catalogue masih kosong!" << endl;
                } else {
                    clearScreen();
                    displayCatalogue(catalogue);
                }
                break;
            case 3:
                cout << "Keluar dari program..." << endl;
                break;
            default:
                cout << "Pilihan tidak valid" << endl;
        }

        if (choice != 3) {
            cout << "\nTekan ENTER untuk melanjutkan...";
            cin.ignore();
            cin.get();
            clearScreen(); // Bersihkan setelah user lihat
        }
    }while(choice != 3);
}