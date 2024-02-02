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
            <form method="post" action="browse.php">
    <div id="filter">
        <br>
        <h2>Filters</h2>
        <h3>Prices</h3>
        <div id="myPrices">
            <input type="number" placeholder="Minimum" name="minprice" min="0" max="9999">
            <input type="number" placeholder="Maximum" name="maxprice" min="1" max="10000">
        </div>
        <br>
        <h3>Brands</h3>
        <div id="myBrandDropdown">
            <!-- Add checkboxes for brands -->
            <!-- You can modify these to match your actual brands -->
            <input type="checkbox" id="brand1" name="brands[]" value="Apple">
            <label for="brand1">Apple</label><br>
            <input type="checkbox" id="brand2" name="brands[]" value="Samsung">
            <label for="brand2">Samsung</label><br>
            <!-- Add more checkboxes for other brands -->
        </div>
        <button type="submit">Update</button>
    </div>
</form>
            </div>
        </div>
        <br>

         <div id="productlist">
<?php
// PHP code for fetching and displaying products
session_start();

// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=stockpage', 'root', '');

// Construct the base query
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
            Brand ON Item.Item_ID = Brand.Item_ID";

// Add conditions for individual filters
$whereClauses = [];
$bindings = [];

// Handle search query
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchitem'])) {
    $search_query = $_POST['searchitem'];
    $whereClauses[] = "Item.ItemName LIKE ?";
    $bindings[] = "%$search_query%";
}

// Handle price filtering
if (isset($_POST['minprice']) && isset($_POST['maxprice'])) {
    $min_price = $_POST['minprice'];
    $max_price = $_POST['maxprice'];
    $whereClauses[] = "Item.Price BETWEEN ? AND ?";
    $bindings[] = $min_price;
    $bindings[] = $max_price;
}

// Handle brand filtering
if (isset($_POST['brands']) && !empty($_POST['brands'])) {
    $brands = $_POST['brands'];
    $placeholders = array_fill(0, count($brands), '?');
    $whereClauses[] = "Brand.BrandName IN (" . implode(',', $placeholders) . ")";
    $bindings = array_merge($bindings, $brands);
}

// Combine all where clauses
if (!empty($whereClauses)) {
    $filteredQuery = $query . " WHERE " . implode(" AND ", $whereClauses);
} else {
    $filteredQuery = $query;
}

// Execute the filtered query
$statement = $pdo->prepare($filteredQuery);
$statement->execute($bindings);

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
