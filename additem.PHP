<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="employee.css">
    <title>Product Form</title>
</head>
<body>
<section id="sidebar">
          <a href="" class="brand">
            <span class="icon">
                <img src="logo.png" alt="teamprotect logo">
            </span>
          </a>
          <ul class="side-menu top">
            <li>
                <a href="stockview.php">
                    <i class='bx bxl-dropbox' ></i>
                    <span class="text">Stock View</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-mail-send' ></i>
                    <span class="text">Confirm Orders</span>
                </a>
            </li>            <li>
                <a href="pending_orders.php">
                    <i class='bx bxs-hourglass' ></i>
                    <span class="text">Pending Orders</span>
                </a>
            </li>            <li>
                <a href="#">
                    <i class='bx bxs-package' ></i>
                    <span class="text">Fulfilled Orders</span>
                </a>
            </li>
        </li>            <li>
            <a href="#">
                <i class='bx bx-log-out'></i>
                <span class="text">Logout</span>
            </a>
        </li>
          </ul>
    </section>

<section id="mainsection">
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="brandname">Brand Name:</label><br>
        <input type="text" name="brandname" required  maxlength="50"><br><br>

        <label for="itemname">Item Name:</label><br>
        <input type="text" name="itemname" required maxlength="50"><br><br>

        <label for="quantity">Quantity:</label><br>
<<<<<<< HEAD
        <input type="number" name="quantity" required><br><br>

                
        <label for="price">Price:</label><br>
        <input type="number" name="price" required><br><br>

=======
        <input type="number" name="quantity" required min="1"><br><br>
>>>>>>> c9e559b5bc105d96a2b277c9ff485795c788dd8f

        <label for="itemdescription">Item Description:</label><br>
        <textarea name="itemdescription" rows="4" required></textarea><br><br>

<<<<<<< HEAD

        <label for="image">Photo Name:</label><br>
        <input type="file" name="image" required required><br><br>

        
        <label for="operatingsystem">Operating System:</label><br>
        <input type="text" name="operatingsystem" required><br><br>

        
        <label for="screensize">Display Size:</label><br>
        <input type="text" name="screensize" required><br><br>

        <label for="disres">Display Resolution:</label><br>
        <input type="text" name="disres" required><br><br>

        
        <label for="batterylife">Battery Life:</label><br>
        <input type="number" name="batterylife" required><br><br>

        
        <label for="camera">Camera Resolution (MP):</label><br>
        <input type="text" name="camera" required><br><br>

        
        <label for="biometrics">Biometrics:</label><br>
        <input type="text" name="biometrics" required><br><br>

=======
        <label for="photoname">Photo Name:</label><br>
        <input type="text" name="photoname" required maxlength="100"><br><br>
>>>>>>> c9e559b5bc105d96a2b277c9ff485795c788dd8f

        <label for="shelf">Shelf:</label><br>
        <input type="text" name="shelf" required><br><br>

        <label for="row">Row:</label><br>
        <input type="text" name="row" required><br><br>

        <label for="os">Operating System:</label><br>
<input type="text"name="os" required>
<br><br>
<label for="warranty">Warranty (in months):</label><br>
<input type="number" name="warranty" required min="0"><br><br>

        <label for="displaySize">Display Size:</label><br>
        <input type="number" name="displaySize" required required min="0"><br><br>

        <label for="displayResolution">Display Resolution:</label><br>
        <input type="text" name="displayResolution" required maxlength="20"><br><br>

        <label for="batteryLife">Battery Life:</label><br>
        <input type="number" name="batteryLife" required min="0"><br><br>

        <label for="cameraMegapixels">Camera Megapixels:</label><br>
        <input type="number" name="cameraMegapixels" required><br><br>

        <label for="biometricAuthentication">Biometric Authentication:</label><br>
<sinput type="text" name="biometricAuthentication" required>
<br><br>

<label for="colors">Colors (separated by comma):</label><br>
<input type="text" name="colors" required><br><br>

<label for="sizes">storage (separated by comma & in GB but dont include it):</label><br>
<input type="text" name="sizes" required><br><br>

        <input type="submit" value="Submit">
    </form>
<section>

</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
<<<<<<< HEAD
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder =  'img/'.$file_name;

    $brandname = $_POST["brandname"];
    $itemname = $_POST["itemname"];
    $quantity = $_POST["quantity"];
    $itemdescription = $_POST["itemdescription"];
    $price = $_POST["price"]; 
    $operatingsystem= $_POST["operatingsystem"];
    $disres = $_POST["disres"];
    $screensize = $_POST["screensize"];
    $batterylife = $_POST["batterylife"];
    $camera= $_POST["camera"];
    $biometrics=  $_POST["biometrics"];
    $shelf = $_POST["shelf"];
    $itemrow = $_POST["row"];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
        
        // Prepare the statements
        $stmt_location = $pdo->prepare("INSERT INTO location (Shelf, Row) VALUES (?, ?)");
        $stmt_brand = $pdo->prepare("INSERT INTO Brand (BrandName) VALUES (?)");
        $stmt_item = $pdo->prepare("INSERT INTO Item (ItemName, Quantity, ItemDesc, Price, Img, Location_ID, OperatingSystem, DisplaySize, DisplayResolution, BatteryLife, CameraMegapixels, BiometricAuthentication) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
        // Bind parameters and execute
        $stmt_location->execute([$shelf, $itemrow]);
        $stmt_brand->execute([$brandname]);
        $location_id = $pdo->lastInsertId();
        
        $stmt_item->execute([$itemname, $quantity, $itemdescription, $price, $file_name, $location_id, $operatingsystem, $screensize, $disres, $batterylife, $camera, $biometrics]);
        
        if(move_uploaded_file($tempname, $folder)){
            echo "<alert>Product Uploaded Successfully</alert>";
        } else {
            echo "<alert>Product not added</alert>";
        }
    } catch(PDOException $e) {
=======
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=stockpage', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $brandname = $_POST["brandname"];
        $itemname = $_POST["itemname"];
        $quantity = $_POST["quantity"];
        $itemdescription = $_POST["itemdescription"];
        $photo = $_POST["photoname"];
        $shelf = $_POST["shelf"];
        $itemrow = $_POST["row"];

        // New fields
        $os = $_POST["os"];
        $displaySize = $_POST["displaySize"];
        $displayResolution = $_POST["displayResolution"];
        $batteryLife = $_POST["batteryLife"];
        $cameraMegapixels = $_POST["cameraMegapixels"];
        $biometricAuthentication = $_POST["biometricAuthentication"];

        // Colors and sizes
        $colors = explode(',', $_POST["colors"]);
        $sizes = explode(',', $_POST["sizes"]);

        $pdo->beginTransaction();

        $locationQuery = $pdo->prepare("INSERT INTO location (Shelf, Row) VALUES (?, ?)");
        $locationQuery->execute([$shelf, $itemrow]);

        $brandQuery = $pdo->prepare("INSERT INTO Brand (BrandName) VALUES (?)");
        $brandQuery->execute([$brandname]);

        $itemQuery = $pdo->prepare("INSERT INTO Item (ItemName, Quantity, ItemDesc, Price, Img, Location_ID, OperatingSystem, DisplaySize, DisplayResolution, BatteryLife, CameraMegapixels, BiometricAuthentication) 
                                    VALUES (?, ?, ?, ?, ?, (SELECT Location_ID FROM location WHERE Shelf = ? AND Row = ? LIMIT 1), ?, ?, ?, ?, ?, ?)");
        $itemQuery->execute([$itemname, $quantity, $itemdescription, $quantity, $photo, $shelf, $itemrow, $os, $displaySize, $displayResolution, $batteryLife, $cameraMegapixels, $biometricAuthentication]);

        // Insert colors
        foreach ($colors as $color) {
            $colorQuery = $pdo->prepare("INSERT INTO item_color (Item_ID, Color) VALUES ((SELECT MAX(Item_ID) FROM Item), ?)");
            $colorQuery->execute([$color]);
        }
$warranty = $_POST["warranty"];
// Insert warranty details into the database
$warrantyQuery = $pdo->prepare("INSERT INTO warranty (WarrantyDetails, Item_ID) VALUES (?, (SELECT MAX(Item_ID) FROM Item))");
$warrantyQuery->execute([$warranty]);

        // Insert sizes into item_storage table
        foreach ($sizes as $size) {
            $sizeQuery = $pdo->prepare("INSERT INTO item_storage (Item_ID, Storage) VALUES ((SELECT MAX(Item_ID) FROM Item), ?)");
            $sizeQuery->execute([$size]);
        }

        $pdo->commit();
        
        echo "Form submitted successfully!";
    } catch (PDOException $e) {
        $pdo->rollBack();
>>>>>>> c9e559b5bc105d96a2b277c9ff485795c788dd8f
        echo "Error: " . $e->getMessage();
    }
}
?>
