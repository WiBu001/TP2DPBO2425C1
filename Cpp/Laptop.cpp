#include "Product.cpp"

class Laptop : public Product{
    private:
        string processor;
        int ram;
        int battery;
        int warranty;
    
    public:
        Laptop() : Product(){
            this->processor = "";
            this->ram = 0;
            this->battery = 0;
            this->warranty = 0;
        }

        Laptop(int id, string name, string brand, int price, string processor, int ram, int battery, int warranty) : Product(id, name, brand, price){
            this->processor = processor;
            this->ram = ram;
            this->battery = battery;
            this->warranty = warranty;
        }

        string getProcessor(){
            return this->processor;
        }

        int getRam(){
            return this->ram;
        }

        int getBattery(){
            return this->battery;
        }

        int getWarranty(){
            return this->warranty;
        }

        void setProcessor(string processor){
            this->processor = processor;
        }

        void setRam(int ram){
            this->ram = ram;
        }

        void setBattery(int battery){
            this->battery = battery;
        }

        void setWarranty(int warranty){
            this->warranty = warranty;
        }

        ~Laptop(){
        }
};