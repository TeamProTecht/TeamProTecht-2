<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Teamprotecht</title>
    <link rel="stylesheet" href="CSS Images\style.css" />
    <script defer src="JavaScript/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav>
        <ul>
            <li><img src="CSS Images\logo.png" width="90px" height="65px"></li>
            <li><a href="">Browse</a></li>
            <li><a href="">iPhone</a></li>
            <li><a href="">Android</a></li>
            <li style="float:right"><a href="#"><i class="fa fa-shopping-basket"></i></a></li>
            <li style="float:right"><a href="#"><i class="fa fa-user"></i></a></li>
            <li style="float:right"><a href="#"><i class="fa fa-search"></i></a></li>
        </ul>
    </nav>

    <main>
        <h2>Your Basket</h2>
        <section id="basket">
            <?php
            try {
                $db = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');

                // Fetching user's basket details
                $sql1 = "SELECT * FROM `basket` WHERE User_ID = '2'";
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $usersBaskets = $db->query($sql1);

                foreach ($usersBaskets as $usersBasket) {
                    $basketID = $usersBasket['Basket_ID'];

                    // Fetching items in the basket
                    $sql2 = "SELECT * FROM `basketitem` WHERE Basket_ID = $basketID";
                    $basketItems = $db->query($sql2);

                    echo "<table><tr><th>Basket number</th><th>Item name</th><th>Quantity</th><th>Price</th><th>Delete Item</th></tr>";
                    foreach ($basketItems as $basketItem) {
                        $basketItemID = $basketItem['Item_ID'];
                        $basketItemQuantity = $basketItem['Quantity'];

                        $sql3 = "SELECT * FROM `item` WHERE Item_ID = $basketItemID";
                        $items = $db->query($sql3);

                        foreach ($items as $item) {
                            $itemName = $item['ItemName'];
                            $itemTotalPrice = $item['Price'] * $basketItemQuantity;

                            echo "<tr><td>".$basketItemID."</td><td>".$itemName."</td><td>".$basketItemQuantity."</td><td>".$itemTotalPrice."</td><td><button onclick='deleteItem()'>Delete</button></td></tr>";
                        }
                    }
                    echo "</table>";

                    // Checkout Form
                    echo '<form action="checkout.php" method="post">';
                    echo '<input type="hidden" name="basketID" value="'.$basketID.'">';
                    echo '<label for="address">Delivery Address:</label>';
                    echo '<input type="text" id="address" name="address" required>';
                    echo '<label for="cardNumber">Credit Card Number:</label>';
                    echo '<input type="text" id="cardNumber" name="cardNumber" pattern="\d{16}" title="Credit card number should be 16 digits" required>';
                    echo '<label for="expiryDate">Expiry Date (MM/YY):</label>';
                    echo '<input type="text" id="expiryDate" name="expiryDate" pattern="(0[1-9]|1[0-2])\/?([0-9]{2})" title="Expiry date should be in MM/YY format" required>';
                    echo '<label for="cvv">CVV:</label>';
                    echo '<input type="text" id="cvv" name="cvv" pattern="\d{3}" title="CVV should be 3 digits" required>';
                    echo '<button type="submit" id="checkout">Checkout</button>';
                    echo '</form>';
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </section>
    </main>
</body>
</html>
