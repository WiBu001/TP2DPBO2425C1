#include "Laptop.cpp"

// Derived class: LaptopGaming inherits from Laptop
class LaptopGaming : public Laptop {
    private:
        string gpu;        // Graphics card (GPU) model
        string cooler;     // Cooling system type
        int refreshRate;   // Display refresh rate in Hz

    public:
        // Default constructor
        // Initializes attributes with default values
        LaptopGaming() : Laptop() {
            this->gpu = "";
            this->cooler = "";
            this->refreshRate = 0;
        }

        // Parameterized constructor
        // Allows initialization with values for both Laptop and LaptopGaming attributes
        LaptopGaming(int id, string name, string brand, int price, string processor, int ram, int battery, int warranty,
                     string gpu, string cooler, int refreshRate) 
                     : Laptop(id, name, brand, price, processor, ram, battery, warranty) {
            this->gpu = gpu;
            this->cooler = cooler;
            this->refreshRate = refreshRate;
        }

        // Getter methods
        string getGpu() {
            return this->gpu;
        }

        string getCooler() {
            return this->cooler;
        }

        int getRefreshRate() {
            return this->refreshRate;
        }

        // Setter methods
        void setGpu(string gpu) {
            this->gpu = gpu;
        }

        void setCooler(string cooler) {
            this->cooler = cooler;
        }

        // Typo in method name: should be setRefreshRate instead of setRefrashRate
        void setRefrashRate(int refreshRate) {
            this->refreshRate = refreshRate;
        }

        // Destructor
        ~LaptopGaming() {
        }
};