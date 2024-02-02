<script>
    // Function to filter products based on price range
    function filterByPrice() {
        var minPrice = document.getElementById("minprice").value;
        var maxPrice = document.getElementById("maxprice").value;
        var products = document.getElementsByClassName("product-item");

        for (var i = 0; i < products.length; i++) {
            var productPrice = parseInt(products[i].querySelector(".product-price").innerText.slice(1));
            if ((minPrice === "" || productPrice >= minPrice) && (maxPrice === "" || productPrice <= maxPrice)) {
                products[i].style.display = "block";
            } else {
                products[i].style.display = "none";
            }
        }
    }

    // Function to filter products based on selected brands
    function filterByBrand(brand) {
        var products = document.getElementsByClassName("product-item");
        for (var i = 0; i < products.length; i++) {
            var productName = products[i].querySelector(".product-name").innerText;
            if (productName.includes(brand) || brand === "All") {
                products[i].style.display = "block";
            } else {
                products[i].style.display = "none";
            }
        }
    }
</script>


<?php
session_start();

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "stockpage";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if search form is submitted
    if(isset($_POST['searchitem']) && !empty($_POST['searchitem'])) {
        $search_term = $_POST['searchitem'];
        // Fetch products based on search term
        $sql_search_products = "SELECT Item.*, Brand.BrandName
                                FROM Item
                                LEFT JOIN Brand ON Item.Item_ID = Brand.Item_ID
                                WHERE Item.ItemName LIKE :search_term";
        $stmt_search_products = $pdo->prepare($sql_search_products);
        $stmt_search_products->execute(array(':search_term' => '%' . $search_term . '%'));
        $all_products = $stmt_search_products->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Fetch all products when the page first loads
        $sql_all_products = "SELECT Item.*, Brand.BrandName
                            FROM Item
                            LEFT JOIN Brand ON Item.Item_ID = Brand.Item_ID";
        $stmt_all_products = $pdo->query($sql_all_products);
        $all_products = $stmt_all_products->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$pdo = null;
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
        <input type="number" placeholder="Minimum" id="minprice" min="0" max="9999" oninput="filterByPrice()">
        <input type="number" placeholder="Maximum" id="maxprice" min="1" max="10000" oninput="filterByPrice()">
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
        <div id="productlist">
            <?php
            // Display all products fetched from the database
            foreach ($all_products as $row) {
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
<button type="button" onclick="submitFilters()">Apply Filters</button>
    </div>
</body>
</html>
