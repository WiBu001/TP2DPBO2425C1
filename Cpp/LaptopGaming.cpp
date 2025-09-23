#include "Laptop.cpp"

class LaptopGaming : public Laptop{
    private:
        string gpu;
        string cooler;
        int refreshRate;

    public:
        LaptopGaming() : Laptop(){
            this->gpu = "";
            this->cooler = "";
            this->refreshRate = 0;
        }

        LaptopGaming(int id, string name, string brand, int price, string processor, int ram, int battery, int warranty, string gpu, string cooler, int refreshRate) : Laptop(id, name, brand, price, processor, ram, battery, warranty){
            this->gpu = gpu;
            this->cooler = cooler;
            this->refreshRate = refreshRate;
        }

        string getGpu(){
            return this->gpu;
        }

        string getCooler(){
            return this->cooler;
        }

        int getRefreshRate(){
            return this->refreshRate;
        }

        void setGpu(string gpu){
            this->gpu = gpu;
        }

        void setCooler(string cooler){
            this->cooler = cooler;
        }

        void setRefrashRate(int refreshRate){
            this->refreshRate = refreshRate;
        }

        ~LaptopGaming(){
        }
};