<?php
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "Add to basket" button was clicked
    if (isset($_POST['add_to_basket'])) {
        // Get the product ID from the form
        $product_id = $_POST['product_id'];

        // Check if the product ID is valid (you would typically validate this against a database)
        if (is_numeric($product_id) && $product_id > 0) {
            // Add the product to the basket (you would typically store this in a session or database)
            $_SESSION['basket'][] = $product_id;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Teamprotecht</title>
    <link rel="stylesheet" href="CSS/browse.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Add styles for filters */
        #filter {
            float: left;
            width: 30%;
            margin-right: 20px;
        }
        #myPrices input, #myPrices button {
            margin-bottom: 10px;
        }
        #myBrandDropdown label {
            display: block;
        }
        #productlist {
            float: left;
            width: 65%;
        }
        .product-item {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <ul> 
            <li><img src="CSS HP/images/logo.png" width="90px" height="65px"></li>
            <li><a href="Teamprotecht - HomePage.html">Home</a></li>
            <li><a href="browse.php">Browse</a></li>
            <li><a href="">About Us</a></li>
            <li style="float:right"><a href="Product_Basket.php"><i class="fa fa-shopping-basket"></i></a></li>
            <li style="float:right"><a href="#"><i class="fa fa-user"></i></a></li>
        </ul>
    </nav>
    <br><br>
    <h1>Search Products</h1>
    <form class="searchbox" method="post" action="browse.php">
        <input type="text" placeholder="Search" name="searchitem">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    <br>
    <div id="searchresult">
        <div id="filter">
            <br>
            <h2>Filters</h2>
            <h3>Prices</h3>
            <div id="myPrices">
                <input type="number" placeholder="Minimum" name="minprice" min="0" max="9999">
                <input type="number" placeholder="Maximum" name="maxprice" min="1" max="10000">
                <button type="submit">Update</button>
            </div><br>
            <h3>Brands</h3>
            <div id="myBrandDropdown">
                <input type="checkbox" id="brand1" name="brand1">
                <label for="brand1">Apple</label><br>
                <input type="checkbox" id="brand2" name="brand2">
                <label for="brand2">Samsung</label><br>
                <input type="checkbox" id="brand3" name="brand3">
                <label for="brand3">Huawei</label><br>
                <input type="checkbox" id="brand4" name="brand4">
                <label for="brand4">Google</label><br>
                <input type="checkbox" id="brand5" name="brand5">
                <label for="brand5">Blackberry</label><br>
                <input type="checkbox" id="brand6" name="brand6">
                <label for="brand6">Other</label><br>
            </div><br>
        </div>
        <br>

<?php

// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=stockpage', 'root', '');

// Query to select all products
$query = "SELECT
            Location.Shelf,
            Location.Row,
            Item.ItemName,
            Item.Item_ID,
            Brand.BrandName,
            Item.Quantity,
            Item.Price, 
            Item.Img
          FROM
            Item
          JOIN
            Location ON Item.Location_ID = Location.Location_ID
          LEFT JOIN
            Brand ON Item.Item_ID = Brand.Item_ID;";
// Execute the query
$statement = $pdo->query($query);

?>


         <div id="productlist">
            <?php
            // Display all products fetched from the database
            foreach ($statement as $row) {
                echo "<div class='product-item'>";
                echo "<strong>" . $row['BrandName'] . " " . $row['ItemName'] . "</strong><br>";
                echo "<strong>£" . $row['Price'] . "</strong><br>";
                echo "<img src='" . $row['Img'] . "'><br>";
                echo "<form method='post' action=''>"; // Assuming you want to use separate forms for each product
                echo "<input type='hidden' name='product_id' value='" . $row['Item_ID'] . "'>";
                echo "<button type='submit' name='add_to_basket'>Add to basket</button>";
                echo "</form>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>