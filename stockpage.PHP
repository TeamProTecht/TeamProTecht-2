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
            <img src="teamprotech.png.png" alt="Logo 1">
          </div>
            <li><a href="http://localhost/Year%202%20Team%20Project/confirmorders.html">Confirm Orders</a></li>
            <li><a href="http://localhost/Year%202%20Team%20Project/pendingorders.html">Pending Orders</a></li>
            <li><a href="http://localhost/Year%202%20Team%20Project/fulfilledorders.html">Fulfilled Orders</a></li>
            <li><a href="file:///C:/xampp/htdocs/Year%202%20Team%20Project/stocksystem.html">Stock Put Away</a></li>
            <li class="logout-link"><a href="http://localhost/Year%202%20Team%20Project/login.html" onclick="logout()">Logout</a></li>
        </ul>
    </div>








<?php
$userAmount = $selectedOption = $itemID = "";
$Amount = $amountFilter = $shelf = $row = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userAmount = $_POST["userAmount"];
    $selectedOption = $_POST["selectedOption"];
    $itemID = $_POST["itemID"];
    $Amount = $_POST["amount"];
    $amountFilter = $_POST["amountFilter"];
    $shelf = $_POST["shelf"];
    $row = $_POST["row"];

    echo " userAmount: " . $userAmount . "<br>";
    echo "Selected Option: " . $selectedOption . "<br>";
    echo "Item ID: " . $itemID . "<br>";
    echo "Amount: " . $Amount . "<br>";
    echo "Selected Option: " . $amountFilter . "<br>";
    echo "Shelf: " . $shelf . "<br>";
    echo "Row: " . $row . "<br>";
}

if ($selectedOption == "Y") {
    $pdo = new PDO('sqlite:stock.db');
    $statement = $pdo->query("
		UPDATE Item
		SET Quantity = '$userAmount'
		WHERE Item_ID = '$itemID'");
}

if ($selectedOption == "N") {
    $pdo = new PDO('sqlite:stock.db');
    $statement = $pdo->query("
		UPDATE Item
		SET Quantity = Quantity - '$userAmount'
		WHERE Item_ID = '$itemID'");
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="userAmount">Enter amount:</label>
    <input type="text" id="userAmount" name="userAmount"><br>

    <label for="selectedOption">Select an option:</label>
    <select id="selectedOption" name="selectedOption">
        <option value="Y">set to</option>
        <option value="N">remove</option>
    </select><br>

    <label for="itemID">Enter item ID:</label>
    <input type="text" id="itemID" name="itemID"><br>

    <h4>Search</h4>
    <div class="filtering">
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount">

        <select id="amountFilter" name="amountFilter">
            <option value="=">Equal</option>
            <option value="<">Less Than</option>
            <option value=">">Greater Than</option>
        </select>
    </div>
    <br>
    <div class="filtering">
        <label for="product">Product:</label>
        <input type="text" id="product" class="filter-input">
    </div>
    <br>
    <div class="filtering">
        <label for="shelf">Shelf:</label>
        <input type="text" id="shelf" name="shelf" class="filter-input">
    </div>
    <br>
    <div class="filtering">
        <label for="row">Row:</label>
        <input type="text" id="row" name="row" class="filter-input">
    </div>

    <button type="submit">Submit</button>
</form>

<table border="1">
    <tr>
        <th>Shelf</th>
        <th>RowNum</th>
        <th>BrandName</th>
        <th>Quantity</th>
    </tr>

    <?php
    $pdo = new PDO('sqlite:stock.db');
    $statement = $pdo->query("SELECT Location.Shelf, Location.RowNum, Brand.BrandName, Item.Quantity
        FROM Item
        JOIN SerialNumber ON Item.SerialNumber = SerialNumber.Serial_ID
        JOIN Location ON SerialNumber.Location_ID = Location.Location_ID
        JOIN Brand ON SerialNumber.Brand_ID = Brand.Brand_ID;");

    foreach ($statement as $rows) {
        print "<td>" . $rows['Shelf'] . "</td>";
        print "<td>" . $rows['RowNum'] . "</td>";
        print "<td>" . $rows['BrandName'] . "</td>";
        print "<td>" . $rows['Quantity'] . "</td><tr>";
    }
    ?>
</table>
</body>
</html>
