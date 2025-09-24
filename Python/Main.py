import os
from LaptopGaming import LaptopGaming

# Function to clear terminal screen (works for Windows, Linux, Mac)
def clear_screen():
    os.system("cls" if os.name == "nt" else "clear")

# Function to count digits of an integer
def count_digit(number: int) -> int:
    return len(str(number))

# Function to display all laptops in the catalogue in a formatted table
def display_catalogue(catalogue: list[LaptopGaming]):
    if not catalogue:
        print("Catalogue masih kosong!")  # Empty check
        return

    # Minimum column widths (for table formatting)
    max_id, max_name, max_brand, max_price = 2, 12, 5, 5
    max_processor, max_ram, max_battery, max_warranty = 9, 5, 7, 7
    max_gpu, max_cooler, max_refresh = 3, 6, 12

    # Adjust column widths dynamically based on longest data
    for lap in catalogue:
        max_id = max(max_id, count_digit(lap.get_id()))
        max_name = max(max_name, len(lap.get_name()))
        max_brand = max(max_brand, len(lap.get_brand()))
        max_price = max(max_price, count_digit(lap.get_price()))
        max_processor = max(max_processor, len(lap.get_processor()))
        max_ram = max(max_ram, len(f"{lap.get_ram()} GB"))
        max_battery = max(max_battery, len(f"{lap.get_battery()} mAh"))
        max_warranty = max(max_warranty, len(f"{lap.get_warranty()} Tahun"))
        max_gpu = max(max_gpu, len(lap.get_gpu()))
        max_cooler = max(max_cooler, len(lap.get_cooler()))
        max_refresh = max(max_refresh, len(f"{lap.get_refresh_rate()} Hz"))

    # Helper function to print horizontal line separator
    def print_line():
        print("+-" + "-" * max_id +
              "-+-" + "-" * max_name +
              "-+-" + "-" * max_brand +
              "-+-" + "-" * max_price +
              "-+-" + "-" * max_processor +
              "-+-" + "-" * max_ram +
              "-+-" + "-" * max_battery +
              "-+-" + "-" * max_warranty +
              "-+-" + "-" * max_gpu +
              "-+-" + "-" * max_cooler +
              "-+-" + "-" * max_refresh + "-+")

    # Print table header
    print_line()
    print(f"| {'ID':<{max_id}}"
          f" | {'Nama Laptop':<{max_name}}"
          f" | {'Brand':<{max_brand}}"
          f" | {'Harga':<{max_price}}"
          f" | {'Processor':<{max_processor}}"
          f" | {'RAM':<{max_ram}}"
          f" | {'Baterai':<{max_battery}}"
          f" | {'Garansi':<{max_warranty}}"
          f" | {'GPU':<{max_gpu}}"
          f" | {'Cooler':<{max_cooler}}"
          f" | {'Refresh Rate':<{max_refresh}} |")
    print_line()

    # Print each laptop data
    for lap in catalogue:
        print(f"| {lap.get_id():<{max_id}}"
              f" | {lap.get_name():<{max_name}}"
              f" | {lap.get_brand():<{max_brand}}"
              f" | {lap.get_price():<{max_price}}"
              f" | {lap.get_processor():<{max_processor}}"
              f" | {str(lap.get_ram()) + ' GB':<{max_ram}}"
              f" | {str(lap.get_battery()) + ' mAh':<{max_battery}}"
              f" | {str(lap.get_warranty()) + ' Tahun':<{max_warranty}}"
              f" | {lap.get_gpu():<{max_gpu}}"
              f" | {lap.get_cooler():<{max_cooler}}"
              f" | {str(lap.get_refresh_rate()) + ' Hz':<{max_refresh}} |")
    print_line()

# Function to add a new laptop to the catalogue
def add_laptop(catalogue: list[LaptopGaming], id_counter: list[int]):
    # Take input from user
    name = input("Nama Laptop: ")
    brand = input("Brand: ")
    price = int(input("Harga: "))
    processor = input("Processor: ")
    ram = int(input("RAM (GB): "))
    battery = int(input("Baterai (mAh): "))
    warranty = int(input("Garansi (tahun): "))
    gpu = input("GPU: ")
    cooler = input("Cooler: ")
    refresh_rate = int(input("Refresh Rate (Hz): "))

    # Create LaptopGaming object
    lap = LaptopGaming(id_counter[0], name, brand, price, processor, ram, battery, warranty, gpu, cooler, refresh_rate)
    id_counter[0] += 1  # Increment ID
    catalogue.append(lap)  # Add to list
    print("Laptop berhasil ditambahkan!")

# Function to print menu options
def menu():
    print("=============================================")
    print("            CATALOGUE LAPTOP GAMING          ")
    print("=============================================")
    print("1. Tambah Laptop Gaming")
    print("2. Tampilkan Catalogue")
    print("3. Keluar")
    print("=============================================")

# Main program function
def main():
    catalogue = []         # List to store laptops
    id_counter = [1]       # Use list for mutable ID counter (passed by reference)

    # Add some dummy data (preloaded laptops)
    catalogue.append(LaptopGaming(id_counter[0], "ROG Strix G18", "Asus", 25000000, "Intel i9-13900HX", 32, 9000, 2, "RTX 4080", "Liquid Cooling", 240)); id_counter[0]+=1
    catalogue.append(LaptopGaming(id_counter[0], "Predator Helios 16", "Acer", 22000000, "Intel i7-13700HX", 16, 8000, 2, "RTX 4070", "AeroBlade 3D", 165)); id_counter[0]+=1
    catalogue.append(LaptopGaming(id_counter[0], "Legion Pro 7", "Lenovo", 23000000, "AMD Ryzen 9 7945HX", 32, 9900, 3, "RTX 4090", "ColdFront 5.0", 240)); id_counter[0]+=1
    catalogue.append(LaptopGaming(id_counter[0], "Alienware m18", "Dell", 28000000, "Intel i9-13980HX", 64, 10000, 3, "RTX 4090", "Cryo-Tech", 480)); id_counter[0]+=1
    catalogue.append(LaptopGaming(id_counter[0], "MSI Raider GE78", "MSI", 24000000, "Intel i9-13950HX", 32, 9500, 2, "RTX 4080", "Cooler Boost 5", 240)); id_counter[0]+=1

    clear_screen()
    choice = 0
    while choice != 3:
        menu()
        try:
            choice = int(input("Masukkan pilihan anda : "))  # User choice
        except ValueError:
            print("Input tidak valid!")  # Handle invalid input
            continue

        if choice == 1:
            add_laptop(catalogue, id_counter)  # Add new laptop
        elif choice == 2:
            clear_screen()
            display_catalogue(catalogue)       # Show catalogue
        elif choice == 3:
            print("Keluar dari program...")    # Exit
            break
        else:
            print("Pilihan tidak valid")       # Handle wrong menu choice

        # Pause before refreshing menu
        if choice != 3:
            input("\nTekan ENTER untuk melanjutkan...")
            clear_screen()

# Run program
if __name__ == "__main__":
    main()
