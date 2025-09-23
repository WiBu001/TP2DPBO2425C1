class Product:
    def __init__(self, id=0, name="", brand="", price=0):
        self.__id = id
        self.__name = name
        self.__brand = brand
        self.__price = price

    # Getter
    def get_id(self):
        return self.__id

    def get_name(self):
        return self.__name

    def get_brand(self):
        return self.__brand

    def get_price(self):
        return self.__price

    # Setter
    def set_name(self, name):
        self.__name = name

    def set_brand(self, brand):
        self.__brand = brand

    def set_price(self, price):
        self.__price = price
