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
        <input type="text" name="brandname" required><br><br>


        <label for="itemname">Item Name:</label><br>
        <input type="text" name="itemname" required><br><br>


        <label for="quantity">Quantity:</label><br>
        <input type="number" name="quantity" required><br><br>


        <label for="itemdescription">Item Description:</label><br>
        <textarea name="itemdescription" rows="4" required></textarea><br><br>


        <label for="photoname">Photo Name:</label><br>
        <input type="text" name="photoname" required required><br><br>


        <label for="shelf">Shelf:</label><br>
        <input type="text" name="shelf" required><br><br>


        <label for="row">Row:</label><br>
        <input type="text" name="row" required><br><br>


        <input type="submit" value="Submit">
    </form>
<section>

</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brandname = $_POST["brandname"];
    $itemname = $_POST["itemname"];
    $quantity = $_POST["quantity"];
    $itemdescription = $_POST["itemdescription"];
    $photo = $_POST["photoname"];
    $shelf = $_POST["shelf"];
    $itemrow = $_POST["row"];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
        
        $pdo->exec("INSERT INTO location (Shelf, Row) VALUES ('$shelf', '$itemrow')");


        $pdo->exec("INSERT INTO Brand (BrandName) VALUES ('$brandname')");

        $pdo->exec("
            INSERT INTO Item (ItemName, Quantity, ItemDesc, Price, Img, Location_ID) 
            VALUES ('$itemname', $quantity, '$itemdescription', '$quantity', '$photo', 
            (SELECT Location_ID FROM location WHERE Shelf = '$shelf' AND Row = '$itemrow' LIMIT 1))
        ");
        
        echo "Form submitted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
