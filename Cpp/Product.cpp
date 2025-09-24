#include<iostream>
#include<string>
using namespace std;

// Base class: Product
class Product {
private:
    int id;         // Unique product ID
    string name;    // Name of the product
    string brand;   // Brand of the product
    int price;      // Price of the product

public:
    // Default constructor (initializes attributes with default values)
    Product() {
        this->id = 0;
        this->name = "";
        this->brand = "";
        this->price = 0;
    }

    // Parameterized constructor (allows initialization with specific values)
    Product(int id, string name, string brand, int price) {
        this->id = id;
        this->name = name;
        this->brand = brand;
        this->price = price;
    }

    // Getter methods (to access private attributes)
    int getId() {
        return this->id;
    }

    string getName() {
        return this->name;
    }

    string getBrand() {
        return this->brand;
    }

    int getPrice() {
        return this->price;
    }

    // Setter methods (to modify private attributes)
    void setName(string name) {
        this->name = name;
    }

    void setBrand(string brand) {
        this->brand = brand;
    }

    void setPrice(int price) {
        this->price = price;
    }

    // Destructor
    ~Product() {
    };
};