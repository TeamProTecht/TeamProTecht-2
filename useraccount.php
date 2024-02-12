<?php
// Start the session to access session variables
session_start();

// Set the login credentials
$login_username = "john_doe";
$login_password = "password123";

// Simulate login
$_SESSION['user_id'] = 1; // Assuming user ID 1 corresponds to "john_doe"

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stockpage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details based on user ID from the session
$user_id = $_SESSION['user_id'] ?? null;
if ($user_id !== null) {
    $sql = "SELECT * FROM Users WHERE User_ID = '$user_id'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Fetch user details
        $row = $result->fetch_assoc();
    } else {
        echo "No user found with this ID.";
    }
} else {
    echo "User ID not found in session.";
}

// Fetch previous orders by the user
$order_sql = "SELECT Orders.Order_ID, Item.ItemName, BasketItem.Quantity, (Item.Price * BasketItem.Quantity) AS Total_Price
              FROM Orders
              INNER JOIN BasketItem ON Orders.Basket_ID = BasketItem.Basket_ID
              INNER JOIN Item ON BasketItem.Item_ID = Item.Item_ID
              WHERE Orders.User_ID = '$user_id'";
$order_result = $conn->query($order_sql);

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Details</title>
    <link rel="stylesheet" type="text/css" href="CSS\styleforeditacctount.css">
    <style>
        /* CSS for the button inside buttonoders */
        .buttonoders button {
      width: 100%;
    padding: 10px;
    background: rgb(152, 82, 150);
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
        }

        .buttonoders button:hover {
            background-color: #005f6b;
        }
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: rgb(255, 255, 255);
  position: fixed;
  top: 0%;
  width: 100%;
}

li {
  float: left;
}

li a {
  display: block;
  color: rgb(152, 82, 150);
  text-align: center;
  padding: 22px 18px;
  text-decoration: none;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: bold;
}

li a:hover {
  background-color: rgb(227, 224, 227);
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
    <h2>Edit User Details</h2>
    <!-- Button to open the full popup menu -->
    <div class="buttonoders">
    <button onclick="openPopupMenu()">Previous Oders</button>
    </div>

    <!-- Full popup menu -->
    <div class="popup-menu-overlay" onclick="closePopupMenu()"></div>
    <div class="popup-menu">
        <h3>Previous Orders</h3>
         <?php
        $combined_orders = array();
        $current_order_id = null;
        $total_price = 0;

        if ($order_result && $order_result->num_rows > 0) {
            while ($order_row = $order_result->fetch_assoc()) {
                $order_id = $order_row['Order_ID'];
                if ($current_order_id !== $order_id) {
                    // New order ID, display the previous order if available
                    if ($current_order_id !== null) {
                        echo "<p>Order ID: $current_order_id</p>";
                        echo "<ul>";
                        foreach ($combined_orders[$current_order_id] as $item_name => $item_details) {
                            echo "<li>$item_name - Quantity: $item_details[Quantity], Total Price: $item_details[Total_Price]</li>";
                        }
                        echo "</ul>";
                        echo "<p>Total Price: $total_price</p>";
                        $total_price = 0;
                    }
                    $current_order_id = $order_id;
                    $combined_orders[$order_id] = array();
                }

                $item_name = $order_row['ItemName'];
                if (!isset($combined_orders[$order_id][$item_name])) {
                    // Initialize item details if not present
                    $combined_orders[$order_id][$item_name] = array(
                        'Quantity' => $order_row['Quantity'],
                        'Total_Price' => $order_row['Total_Price']
                    );
                } else {
                    // Update quantities and total prices for items with the same name
                    $combined_orders[$order_id][$item_name]['Quantity'] += $order_row['Quantity'];
                    $combined_orders[$order_id][$item_name]['Total_Price'] += $order_row['Total_Price'];
                }

                // Calculate total price for the order
                $total_price += $order_row['Total_Price'];
            }

            // Display the last order
            if ($current_order_id !== null) {
                echo "<p>Order ID: $current_order_id</p>";
                echo "<ul>";
                foreach ($combined_orders[$current_order_id] as $item_name => $item_details) {
                    echo "<li>$item_name - Quantity: $item_details[Quantity], Total Price: $item_details[Total_Price]</li>";
                }
                echo "</ul>";
                echo "<p>Total Price: $total_price</p>";
            }
        } else {
            echo "<p>No previous orders found.</p>";
        }
        ?>
    </div>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Username: <input type="text" name="username" value="<?php echo $row['Username'] ?? ''; ?>"><br><br>
        Password: <input type="password" name="password" value="<?php echo $row['Password'] ?? ''; ?>"><br><br>
        Forename: <input type="text" name="forename" value="<?php echo $row['Fore_name'] ?? ''; ?>"><br><br>
        Second Name: <input type="text" name="second_name" value="<?php echo $row['Second_Name'] ?? ''; ?>"><br><br>
        Last Name: <input type="text" name="last_name" value="<?php echo $row['Last_Name'] ?? ''; ?>"><br><br>
        Address: <textarea name="address"><?php echo $row['Address_User'] ?? ''; ?></textarea><br><br>
        <input type="submit" value="Update">
    </form>

    <script>
        // Function to open the full popup menu
        function openPopupMenu() {
            document.querySelector('.popup-menu-overlay').style.display = 'block';
            document.querySelector('.popup-menu').style.display = 'block';
        }

        // Function to close the full popup menu
        function closePopupMenu() {
            document.querySelector('.popup-menu-overlay').style.display = 'none';
            document.querySelector('.popup-menu').style.display = 'none';
        }
    </script>
</body>
</html>

