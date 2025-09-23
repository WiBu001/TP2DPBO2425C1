from Laptop import Laptop

class LaptopGaming(Laptop):
    def __init__(self, id=0, name="", brand="", price=0, processor="", ram=0, battery=0, warranty=0, gpu="", cooler="", refresh_rate=0):
        super().__init__(id, name, brand, price, processor, ram, battery, warranty)
        self.__gpu = gpu
        self.__cooler = cooler
        self.__refresh_rate = refresh_rate

    # Getter
    def get_gpu(self):
        return self.__gpu

    def get_cooler(self):
        return self.__cooler

    def get_refresh_rate(self):
        return self.__refresh_rate

    # Setter
    def set_gpu(self, gpu):
        self.__gpu = gpu

    def set_cooler(self, cooler):
        self.__cooler = cooler

    def set_refresh_rate(self, refresh_rate):
        self.__refresh_rate = refresh_rate

