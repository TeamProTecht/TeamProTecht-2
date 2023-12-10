<!DOCTYPE html>
<html>

<head>
    <title>Phone Selling Stock System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('backgroundimage.jpg.png');
            /* Replace 'your-background-image.jpg' with the actual path to your image file */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .navbar {
            background-color: rgb(73, 7, 73);
            overflow: hidden;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .navbar ul li {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar li.logout-link {
            float: right;
            /* Move the logout link to the right */
        }

        .logout-link {
            text-decoration: none;
            color: #f44336;
            padding: 14px 16px;
            display: block;
        }

        .logout-link:hover {
            background-color: #f44336;
            color: white;
        }

        .header {
            display: flex;
            align-items: center;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .navbar img:first-of-type {
            float: left;
            width: 100px;
            height: auto;
            margin-right: 20px;
        }

        h1 {
            text-align: center;
            color: purple;
        }

        .header img:first-of-type {
            width: 50px;
            height: auto;
            margin-right: auto;
        }

        .login-signup {
            float: left;
        }

        .login-signup a {
            margin-left: 10px;
            text-decoration: none;
            color: purple;
        }

        .main-content {
            margin: 20px;
        }

        form {
            max-width: 300px;
            margin: auto;
        }

        form label {
            font-weight: bold;
        }

        form input[type="text"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: purple;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        form input[type="submit"]:hover {
            background-color: #a19c9c;
        }
        .select-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .select-buttons button {
               margin: 0;
    color: white;
	    background-color: rgb(73, 7, 73);

        }

        .filtering {
    display: flex;
    justify-content: center;
    align-items: center;
}
h4 {
    text-align: center;
    text-transform: uppercase;
}

.filtering label, .filtering input, .filtering select {
    margin: 0 10px;
}
    </style>
</head>

    <body>
    <div class="navbar">
        <!-- Menu Bar -->
        <ul>
          <div class="logo-container1">
            <img src="" alt="Logo 1">
          </div>
            <li><a href="http://localhost/Year%202%20Team%20Project/confirmorders.html">Confirm Orders</a></li>
            <li><a href="http://localhost/Year%202%20Team%20Project/pendingorders.html">Pending Orders</a></li>
            <li><a href="http://localhost/Year%202%20Team%20Project/fulfilledorders.html">Fulfilled Orders</a></li>
            <li><a href="file:///C:/xampp/htdocs/Year%202%20Team%20Project/stocksystem.html">Stock Put Away</a></li>
            <li class="logout-link"><a href="http://localhost/Year%202%20Team%20Project/login.html" onclick="logout()">Logout</a></li>
        </ul>
    </div>





<br>

<table border="1">
    <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Order Address</th>
        <th>Items (ID, Name, Price, Quantity, Row, Shelf)</th>
        <th>Updated At</th>
        <th>Created At</th>
        <th>Order Status</th>
    </tr>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
    $ordersQuery = "SELECT * FROM Orders WHERE Order_Status = 'Pending'";
    $ordersStatement = $pdo->query($ordersQuery);

    foreach ($ordersStatement as $order) {
        echo "<tr>";
        echo "<td>" . $order['Order_ID'] . "</td>";
        echo "<td>" . $order['User_ID'] . "</td>";
        echo "<td>" . $order['Address_Order'] . "</td>";

        // Inner loop to fetch items associated with each Basket_ID
        $itemsQuery = "SELECT Item.Item_ID, Item.ItemName, Item.Price, BasketItem.Quantity, Location.Row, Location.Shelf
                       FROM BasketItem 
                       JOIN Item ON BasketItem.Item_ID = Item.Item_ID
                       JOIN Location ON Item.Location_ID = Location.Location_ID
                       WHERE BasketItem.Basket_ID = " . $order['Basket_ID'];
        $itemsStatement = $pdo->query($itemsQuery);

        echo "<td>";
        foreach ($itemsStatement as $item) {
            echo "ID: " . $item['Item_ID'] . ", ";
            echo "Name: " . $item['ItemName'] . ", ";
            echo "Price: " . $item['Price'] . ", ";
            echo "Quantity: " . $item['Quantity'] . ", ";
            echo "Row: " . $item['Row'] . ", ";
            echo "Shelf: " . $item['Shelf'] . "<br>";
        }
        echo "</td>";

        echo "<td>" . $order['Updated_at'] . "</td>";
        echo "<td>" . $order['Created_at'] . "</td>";
        echo "<td>" . $order['Order_Status'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>