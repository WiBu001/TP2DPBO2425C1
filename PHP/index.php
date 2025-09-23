<?php

require_once "LaptopGaming.php"; // Import class LaptopGaming

// Uncomment these two lines if you want to reset/clear the session data
// session_start();
// session_destroy();

session_start(); // Mulai session

// === Inisialisasi dummy data (jika session kosong) ===
if (!isset($_SESSION['laptops'])) {
    $_SESSION['laptops'] = [
        new LaptopGaming(1, "ROG Strix G16", "ASUS", 25000000, "Intel i9-13980HX", 32, 90, 2, "NVIDIA RTX 4080", "Liquid Metal Cooling", 240, "ROG Strix G16.png"),
        new LaptopGaming(2, "Predator Helios 300", "Acer", 20000000, "Intel i7-13700H", 16, 80, 2, "NVIDIA RTX 4070", "AeroBlade 3D Fan", 165, "Predator Helios 300.png"),
        new LaptopGaming(3, "Alienware M16", "Dell", 30000000, "AMD Ryzen 9 7945HX", 32, 99, 3, "NVIDIA RTX 4090", "Cryo-Tech Cooling", 240, "Alienware M16.jpg"),
        new LaptopGaming(4, "Legion Pro 7", "Lenovo", 27000000, "AMD Ryzen 9 7845HX", 32, 95, 3, "NVIDIA RTX 4080", "ColdFront 5.0", 240, "Legion Pro 7.jpg"),
        new LaptopGaming(5, "MSI Raider GE78", "MSI", 29000000, "Intel i9-13980HX", 64, 99, 3, "NVIDIA RTX 4090", "Cooler Boost Titan", 240, "MSI Raider GE78.jpg"),
    ];
}

// === Tambah LaptopGaming baru ===
if (isset($_POST['add'])) {
    $id = time(); // ID unik
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $processor = $_POST['processor'];
    $ram = $_POST['ram'];
    $battery = $_POST['battery'];
    $warranty = $_POST['warranty'];
    $gpu = $_POST['gpu'];
    $cooler = $_POST['cooler'];
    $refreshRate = $_POST['refreshRate'];

    $imageName = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        if (!is_dir("uploads")) mkdir("uploads");
        $imageName = uniqid() . "_" . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $imageName);
    }

     $_SESSION['laptops'][] = new LaptopGaming(
        $id, $name, $brand, $price,
        $processor, $ram, $battery, $warranty,
        $gpu, $cooler, $refreshRate,
        $imageName
    );

    header("Location: index.php");
    exit;
}

// === Hapus LaptopGaming ===
if (isset($_POST['delete_index'])) {
    $index = $_POST['delete_index'];
    if (isset($_SESSION['laptops'][$index])) {
        unset($_SESSION['laptops'][$index]);
        $_SESSION['laptops'] = array_values($_SESSION['laptops']); // reindex array
    }
    header("Location: index.php");
    exit;
}

// === Edit mode ===
$editMode = false;
$editIndex = -1;

if (isset($_POST['edit_index'])) {
    $editMode = true;
    $editIndex = $_POST['edit_index'];
}

// === Update LaptopGaming ===
if (isset($_POST['update'])) {
    $index = $_POST['update_index'];
    if (isset($_SESSION['laptops'][$index])) {
        $_SESSION['laptops'][$index]->setName($_POST['name']);
        $_SESSION['laptops'][$index]->setBrand($_POST['brand']);
        $_SESSION['laptops'][$index]->setPrice($_POST['price']);
        $_SESSION['laptops'][$index]->setProcessor($_POST['processor']);
        $_SESSION['laptops'][$index]->setRam($_POST['ram']);
        $_SESSION['laptops'][$index]->setBattery($_POST['battery']);
        $_SESSION['laptops'][$index]->setWarranty($_POST['warranty']);
        $_SESSION['laptops'][$index]->setGpu($_POST['gpu']);
        $_SESSION['laptops'][$index]->setCooler($_POST['cooler']);
        $_SESSION['laptops'][$index]->setRefreshRate($_POST['refreshRate']);

        // update gambar
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $imageName = uniqid() . "_" . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $imageName);
            $_SESSION['laptops'][$index]->setImage($imageName);
        }
    }
    header("Location: index.php");
    exit;
}

// === Pencarian ===
$laptops = $_SESSION['laptops'];
$searchQuery = "";
if (isset($_GET['search'])) {
    $searchQuery = strtolower(trim($_GET['search']));
    $laptops = array_filter($_SESSION['laptops'], function($laptop) use ($searchQuery) {
        return strpos(strtolower($laptop->getName()), $searchQuery) !== false ||
               strpos(strtolower($laptop->getBrand()), $searchQuery) !== false;
    });
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laptop Gaming Store</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f9; padding: 20px; text-align: center; }
        h1 { margin-bottom: 20px; }
        .container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .card { background: white; padding: 15px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); width: 280px; text-align: left; }
        .btn { display: inline-block; margin: 5px; padding: 8px 12px; text-decoration: none; background: #4CAF50; color: white; border-radius: 5px; border: none; cursor: pointer; }
        .btn.red { background: #e74c3c; }
        .form-container { background: white; padding: 20px; margin: 20px auto; width: 350px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }
        input { width: 90%; padding: 8px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px; }
        .search-box { margin: 20px 0; text-align: center; }
        .search-box input[type="text"] { padding: 10px 15px; width: 250px; border: 1px solid #ccc; border-radius: 20px; }
    </style>
</head>
<body>
    <h1>Laptop Gaming Store</h1>

    <div class="form-container">
        <h2><?= $editMode ? "Edit Laptop Gaming" : "Tambah Laptop Gaming"; ?></h2>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Name" value="<?= $editMode ? $laptops[$editIndex]->getName() : ''; ?>" required><br>
            <input type="text" name="brand" placeholder="Brand" value="<?= $editMode ? $laptops[$editIndex]->getBrand() : ''; ?>" required><br>
            <input type="number" name="price" placeholder="Price" value="<?= $editMode ? $laptops[$editIndex]->getPrice() : ''; ?>" required><br>
            <input type="text" name="processor" placeholder="Processor" value="<?= $editMode ? $laptops[$editIndex]->getProcessor() : ''; ?>" required><br>
            <input type="number" name="ram" placeholder="RAM (GB)" value="<?= $editMode ? $laptops[$editIndex]->getRam() : ''; ?>" required><br>
            <input type="number" name="battery" placeholder="Battery (Wh)" value="<?= $editMode ? $laptops[$editIndex]->getBattery() : ''; ?>" required><br>
            <input type="number" name="warranty" placeholder="Warranty (Years)" value="<?= $editMode ? $laptops[$editIndex]->getWarranty() : ''; ?>" required><br>
            <input type="text" name="gpu" placeholder="GPU" value="<?= $editMode ? $laptops[$editIndex]->getGpu() : ''; ?>" required><br>
            <input type="text" name="cooler" placeholder="Cooler" value="<?= $editMode ? $laptops[$editIndex]->getCooler() : ''; ?>" required><br>
            <input type="number" name="refreshRate" placeholder="Refresh Rate (Hz)" value="<?= $editMode ? $laptops[$editIndex]->getRefreshRate() : ''; ?>" required><br>
            
            <!-- Upload gambar -->
            <input type="file" name="image" accept="image/*"><br>

            <?php if ($editMode): ?>
                <input type="hidden" name="update_index" value="<?= $editIndex; ?>">
                <button type="submit" name="update" class="btn">Update</button>
                <a href="index.php" class="btn red">Cancel</a>
            <?php else: ?>
                <button type="submit" name="add" class="btn">Add</button>
            <?php endif; ?>
        </form>
    </div>

    <!-- Search -->
    <div class="search-box">
        <form method="get">
            <input type="text" name="search" placeholder="Search by name or brand" value="<?= htmlspecialchars($searchQuery); ?>">
            <button type="submit" class="btn">Search</button>
        </form>
    </div>

    <!-- List LaptopGaming -->
    <h2>All Laptop Gaming</h2>
    <div class="container">
        <?php
        if (empty($laptops)) {
            echo "<p>No laptops available.</p>";
        } else {
            foreach ($laptops as $index => $laptop) {
                $laptop->displayCard($index);
            }
        }
        ?>
    </div>
</body>
</html>
