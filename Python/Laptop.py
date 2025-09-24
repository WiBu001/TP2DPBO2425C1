from Product import Product

class Laptop(Product):
    def __init__(self, id=0, name="", brand="", price=0, processor="", ram=0, battery=0, warranty=0):
        # Call parent constructor (Product) to initialize common attributes
        super().__init__(id, name, brand, price)
        # Private attributes specific to Laptop
        self.__processor = processor
        self.__ram = ram
        self.__battery = battery
        self.__warranty = warranty

    # Getters
    def get_processor(self):
        return self.__processor

    def get_ram(self):
        return self.__ram

    def get_battery(self):
        return self.__battery

    def get_warranty(self):
        return self.__warranty

    # Setters
    def set_processor(self, processor):
        self.__processor = processor

    def set_ram(self, ram):
        self.__ram = ram

    def set_battery(self, battery):
        self.__battery = battery

    def set_warranty(self, warranty):
        self.__warranty = warranty
