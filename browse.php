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
            <form method="post" action="browse.php">
                <h3>Prices</h3>
                <div id="myPrices">
                    <input type="number" placeholder="Minimum" name="minprice" min="0" max="9999" value="1">
                    <input type="number" placeholder="Maximum" name="maxprice" min="1" max="10000" value="10000">
                </div>
                <br>
                <h3>Brands</h3>
                <div id="myBrandDropdown">
                    <select name="selected_brand">
                        <option value="">Select Brand</option>
                        <option value="Apple">Apple</option>
                        <option value="Samsung">Samsung</option>
                        <!-- Add more options for other brands as needed -->
                    </select>
                </div>
                <h3>Warranty</h3>
                <div id="myWarrantyDropdown">
                    <select name="selected_warranty">
                        <option value="">Select Warranty</option>
                        <option value="12">1 Year</option>
                        <option value="24">2 Years</option>
                        <option value="36">3 Years</option>
                        <!-- Add more options for other warranty durations as needed -->
                    </select>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
    <br>
    <div id="productlist">
<?php
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
    Brand ON Item.Item_ID = Brand.Item_ID
  LEFT JOIN
    Warranty ON Item.Item_ID = Warranty.Item_ID";

// Initialize an array to hold conditions
$conditions = [];
// Initialize parameters array
$parameters = [];

// Check if a search query has been submitted
if(isset($_POST['searchitem']) && !empty($_POST['searchitem'])) {
    $_SESSION['searched_word'] = $_POST['searchitem'];
} elseif(isset($_SESSION['searched_word'])) {
    // If the search word is already stored in session, use it
    $_POST['searchitem'] = $_SESSION['searched_word'];
}

// Check if a search query exists
if(isset($_POST['searchitem']) && !empty($_POST['searchitem'])) {
    $search = $_POST['searchitem'];
    // Add condition to the array
    $conditions[] = "(Item.ItemName LIKE '%$search%' OR Brand.BrandName LIKE '%$search%')";
}

// Check if brand has been selected
if(isset($_POST['selected_brand']) && !empty($_POST['selected_brand'])) {
    $brand = $_POST['selected_brand'];
    // Add condition to the array
    $conditions[] = "Brand.BrandName = ?";
    // Add brand to the parameters array
    $parameters[] = $brand;
}

// If other filters are applied, add them to the conditions array
if(isset($_POST['minprice']) && isset($_POST['maxprice'])) {
    $minprice = $_POST['minprice'];
    $maxprice = $_POST['maxprice'];
    // Add condition to the array
    $conditions[] = "Item.Price BETWEEN ? AND ?";
    // Add price range to the parameters array
    $parameters[] = $minprice;
    $parameters[] = $maxprice;
}

// Check if warranty duration has been selected
if(isset($_POST['selected_warranty']) && !empty($_POST['selected_warranty'])) {
    $warranty = $_POST['selected_warranty'];
    // Add condition to the array
    $conditions[] = "Warranty.WarrantyDetails >= ?";
    // Add warranty duration to the parameters array
    $parameters[] = $warranty . " Months"; // Assuming the warranty details are stored as 'X Months'
}

// If conditions exist, add WHERE clause to the query
if(!empty($conditions)) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}

// Prepare and execute the query
$statement = $pdo->prepare($query);
$statement->execute($parameters);

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
</body>
</html>
