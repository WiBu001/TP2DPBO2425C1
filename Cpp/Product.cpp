#include<iostream>
#include<string>
using namespace std;

class Product{
private:
    int id;
    string name;
    string brand;
    int price;

public:
    Product(){
        this->id = 0;
        this->name = "";
        this->brand = "";
        this->price = 0;
    }

    Product(int id, string name, string brand, int price){
        this->id = id;
        this->name = name;
        this->brand = brand;
        this->price = price;
    }

    int getId(){
        return this->id;
    }

    string getName(){
        return this->name;
    }

    string getBrand(){
        return this->brand;
    }

    int getPrice(){
        return this->price;
    }

    void setName(string name){
        this->name = name;
    }

    void setBrand(string brand){
        this->brand = brand;
    }

    void setPrice(int price){
        this->price = price;
    }

    ~Product(){
    };
};
