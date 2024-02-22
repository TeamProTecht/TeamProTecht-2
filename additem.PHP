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
    <form action="" method="post">
        <label for="brandname">Brand Name:</label><br>
        <input type="text" name="brandname" required  maxlength="50"><br><br>

        <label for="itemname">Item Name:</label><br>
        <input type="text" name="itemname" required maxlength="50"><br><br>

        <label for="quantity">Quantity:</label><br>
        <input type="number" name="quantity" required min="1"><br><br>

        <label for="itemdescription">Item Description:</label><br>
        <textarea name="itemdescription" rows="4" required></textarea><br><br>

        <label for="photoname">Photo Name:</label><br>
        <input type="text" name="photoname" required maxlength="100"><br><br>

        <label for="shelf">Shelf:</label><br>
        <input type="text" name="shelf" required><br><br>

        <label for="row">Row:</label><br>
        <input type="text" name="row" required><br><br>

        <label for="os">Operating System:</label><br>
<select name="os" required>
    <option value="Android">Android</option>
    <option value="iOS">iOS</option>
    <option value="windowsOS">HarmonyOS</option>

</select><br><br>

        <label for="displaySize">Display Size:</label><br>
        <input type="text" name="displaySize" required maxlength="20"><br><br>

        <label for="displayResolution">Display Resolution:</label><br>
        <input type="text" name="displayResolution" required maxlength="20"><br><br>

        <label for="batteryLife">Battery Life:</label><br>
        <input type="text" name="batteryLife" required min="1"><br><br>

        <label for="cameraMegapixels">Camera Megapixels:</label><br>
        <input type="text" name="cameraMegapixels" required><br><br>

        <label for="biometricAuthentication">Biometric Authentication:</label><br>
<select name="biometricAuthentication" required>
    <option value="Face ID">Face ID</option>
    <option value="Fingerprint">Fingerprint</option>
    <option value="Other">Other</option>
</select><br><br>

<label for="colors">Colors (separated by comma):</label><br>
<input type="text" name="colors" required><br><br>

<label for="sizes">storage (separated by comma):</label><br>
<input type="text" name="sizes" required><br><br>

        <input type="submit" value="Submit">
    </form>
<section>

</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Insert sizes into item_storage table
        foreach ($sizes as $size) {
            $sizeQuery = $pdo->prepare("INSERT INTO item_storage (Item_ID, Storage) VALUES ((SELECT MAX(Item_ID) FROM Item), ?)");
            $sizeQuery->execute([$size]);
        }

        $pdo->commit();
        
        echo "Form submitted successfully!";
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>
