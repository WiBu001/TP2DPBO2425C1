#include "Product.cpp"

class Laptop : public Product {
    private:
        string processor;  // Processor type (e.g., Intel i7, AMD Ryzen)
        int ram;           // RAM size in GB
        int battery;       // Battery capacity inn mAh
        int warranty;      // Warranty period in years
    
    public:
        // Default constructor
        Laptop() : Product() {
            this->processor = "";
            this->ram = 0;
            this->battery = 0;
            this->warranty = 0;
        }

        // Parameterized constructor
        Laptop(int id, string name, string brand, int price, string processor, int ram, int battery, int warranty) 
            : Product(id, name, brand, price) {
            this->processor = processor;
            this->ram = ram;
            this->battery = battery;
            this->warranty = warranty;
        }

        // Getters
        string getProcessor() {
            return this->processor;
        }

        int getRam() {
            return this->ram;
        }

        int getBattery() {
            return this->battery;
        }

        int getWarranty() {
            return this->warranty;
        }

        // Setters
        void setProcessor(string processor) {
            this->processor = processor;
        }

        void setRam(int ram) {
            this->ram = ram;
        }

        void setBattery(int battery) {
            this->battery = battery;
        }

        void setWarranty(int warranty) {
            this->warranty = warranty;
        }

        // Destructor
        ~Laptop() {
        }
};