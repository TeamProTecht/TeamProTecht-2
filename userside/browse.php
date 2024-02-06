<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Teamprotecht</title>
    <link rel="stylesheet" href="CSS/browse.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav>
        <ul> 
            <img src="CSS HP/images/logo.png" width="90px" height="65px">
            <a href="Teamprotecht - HomePage.html">Home</a>
            <a href="browse.php">Browse</a>
            <a href="">About Us</a>
            <li style="float:right"><a href="Product_Basket.php"><i class="fa fa-shopping-basket"></i></a></li>
            <li style="float:right"><a href="#"><i class="fa fa-user"></i></a></li>
        </ul>
    </nav>
    <br><br>
    <h1>Search Products</h1>
    <form class="searchbox" method="post" action="browse.php">
        <input type="text" placeholder="Search" name="searchitem" value="<?php echo isset($_POST['searchitem']) ? $_POST['searchitem'] : ''; ?>">
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
<input type="number" placeholder="Minimum" name="minprice" min="0" max="9999" value="<?php echo isset($_POST['minprice']) ? $_POST['minprice'] : '1'; ?>">
<input type="number" placeholder="Maximum" name="maxprice" min="1" max="10000" value="<?php echo isset($_POST['maxprice']) ? $_POST['maxprice'] : '10000'; ?>">

                </div>
                <br>
                <h3>Brands</h3>
                <div id="myBrandDropdown">
     <select name="selected_brand">
    <option value="">Select Brand</option>
    <option value="Apple"<?php if(isset($_POST['selected_brand']) && $_POST['selected_brand'] === 'Apple') echo ' selected'; ?>>Apple</option>
    <option value="Samsung"<?php if(isset($_POST['selected_brand']) && $_POST['selected_brand'] === 'Samsung') echo ' selected'; ?>>Samsung</option>
    <!-- Add more options for other brands as needed -->
</select>

                </div>
                <h3>Warranty</h3>
                <div id="myWarrantyDropdown">
 <select name="selected_warranty">
    <option value="">Select Warranty</option>
    <option value="12"<?php if(isset($_POST['selected_warranty']) && $_POST['selected_warranty'] === '12') echo ' selected'; ?>>1 Year</option>
    <option value="24"<?php if(isset($_POST['selected_warranty']) && $_POST['selected_warranty'] === '24') echo ' selected'; ?>>2 Years</option>
    <option value="36"<?php if(isset($_POST['selected_warranty']) && $_POST['selected_warranty'] === '36') echo ' selected'; ?>>3 Years</option>
    <!-- Add more options for other warranty durations as needed -->
</select>

                </div>
<h3>Sort</h3>
	<!-- Add sort options inside the form -->
<select name="sort_order">
    <option value="ASC"<?php if(isset($_POST['sort_order']) && $_POST['sort_order'] === 'ASC') echo ' selected'; ?>>Price Low to High</option>
    <option value="DESC"<?php if(isset($_POST['sort_order']) && $_POST['sort_order'] === 'DESC') echo ' selected'; ?>>Price High to Low</option>
</select>
<br><br>
                <button type="submit">Update</button><br><br>
<button type="button" id="resetButton" onclick="resetFilters()">Reset</button>
            </form>
        </div>
    <br>
    <div id="productlist">
<?php
session_start();

if(isset($_GET['reset']) && $_GET['reset'] === 'true') {
    // Unset all session variables
    session_unset();
    // Destroy the session
    session_destroy();
    // Redirect back to the same page to clear any stored parameters in the URL
    header("Location: browse.php");
    exit(); // Ensure script execution stops here to prevent further processing
}

// Check if a search query has been submitted
if(isset($_POST['searchitem']) && !empty($_POST['searchitem'])) {
    $_SESSION['searched_word'] = $_POST['searchitem'];
    // Unset other filter session variables
    unset($_SESSION['selected_brand']);
    unset($_SESSION['selected_warranty']);
    unset($_SESSION['minprice']);
    unset($_SESSION['maxprice']);
} elseif(isset($_SESSION['searched_word'])) {
    // If the search word is already stored in session, use it
    $_POST['searchitem'] = $_SESSION['searched_word'];
}

// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');

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
    // Store selected brand in session
    $_SESSION['selected_brand'] = $brand;
} elseif(isset($_SESSION['selected_brand'])) {
    // If the brand is already stored in session, use it
    $_POST['selected_brand'] = $_SESSION['selected_brand'];
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
    // Store price range in session
    $_SESSION['minprice'] = $minprice;
    $_SESSION['maxprice'] = $maxprice;
} elseif(isset($_SESSION['minprice']) && isset($_SESSION['maxprice'])) {
    // If price range is already stored in session, use it
    $_POST['minprice'] = $_SESSION['minprice'];
    $_POST['maxprice'] = $_SESSION['maxprice'];
}

// Check if warranty duration has been selected
if(isset($_POST['selected_warranty']) && !empty($_POST['selected_warranty'])) {
    $warranty = $_POST['selected_warranty'];
    // Add condition to the array
    $conditions[] = "Warranty.WarrantyDetails >= ?";
    // Add warranty duration to the parameters array
    $parameters[] = $warranty . " Months"; // Assuming the warranty details are stored as 'X Months'
    // Store selected warranty duration in session
    $_SESSION['selected_warranty'] = $warranty;
} elseif(isset($_SESSION['selected_warranty'])) {
    // If warranty duration is already stored in session, use it
    $_POST['selected_warranty'] = $_SESSION['selected_warranty'];
}

// If conditions exist, add WHERE clause to the query
if(!empty($conditions)) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}

// Add sorting condition based on user selection
if(isset($_POST['sort_order']) && ($_POST['sort_order'] === 'ASC' || $_POST['sort_order'] === 'DESC')) {
    $sort_order = $_POST['sort_order'];
    // Add sorting order to the query
    $query .= " ORDER BY Item.Price $sort_order";
}

// Prepare and execute the query
$statement = $pdo->prepare($query);
$statement->execute($parameters);

// Display all products fetched from the database
foreach ($statement as $row) {
    echo "<div class='product-item'>";
    echo "<a href = 'productdescription.php/".$row['Item_ID']."/".$row['BrandName']."_".$row['ItemName']."'<strong>" . $row['BrandName'] . " " . $row['ItemName'] . "</strong></a><br>";
    echo "<strong>£" . $row['Price'] . "</strong><br>";
    echo "<img src='CSS/images/" . $row['Img'] . "'><br>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='product_id' value='" . $row['Item_ID'] . "'>";
    echo "<button type='submit' name='add_to_basket'>Add to basket</button>";
    echo "</form>";
    echo "</div>";

    if(isset($_POST['add_to_basket']) && isset($_POST['User_ID'])){
        $itemID = $_POST['Item_ID'];
        $userID = $_POST['User_ID'];

        $newbasket = "INSERT INTO basket (User_ID) VALUES('$userID')";
        $addSQL = "INSERT INTO basketitem (Basket_ID, Item_ID, Quantity) VALUES ('$newbasket', '$itemID', 1)";


    } elseif(!isset($_POST['User_ID']) && isset($_POST['email'])) {
        $email = $_POST(['email']);
        $guest = "INSERT INTO session (Item_ID, email) VALUES ('$itemID', '$email')";
        echo "<script>notLoggedIn()</script>";
    }


}
?>
    </div>
    </div>
</body>
</html>
