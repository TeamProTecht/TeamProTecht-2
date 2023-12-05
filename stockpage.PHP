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















<form method="post" action=""><br>
        <select name="action" id="action-select">
            <option value="null">null</option>
            <option value="update">update</option>
            <option value="filter">filter</option>
        </select><br><br>

        <label for="user_Amount" id="user-Amount-label" style="display:none;">Ammount: </label>
        <input type="number" id="user_Amount" name="user_Amount" style="display:none;"  min="0" step="1">

	  
        <label for="item_id" id="item_id_label" style="display:none;">item ID:</label>
	  <input type="number" id="item_id" name="item_id" style="display:none;"  min="0" step="1">


	  <label for="selected_option" id="selected_option_label" style="display:none;">selected_option:</label>
	  <select name="selected_option" id="selected_option" style="display:none;">
		<option value="null">select</option>
      	<option value="set to">set to</option>
      	<option value="remove">remove</option>

	   </select>



	  <label for="find_product" id="find_product_label" style="display:none;">product name:</label>
	  <input type="text" id="find_product" name="find_product" style="display:none;">


	  <label for="amount_Filter" id="amount_Filter_label" style="display:none;">amount_Filter:</label>
	  <select name="amount_Filter" id="amount_Filter" style="display:none;">
		<option value="=">equal</option>
      	<option value="<">less then</option>
      	<option value=">">greater then</option>

	   </select>


	   <label for="iteam_shelf" id="iteam_shelf_label" style="display:none;">shelf:</label>
	   <input type="number" id="iteam_shelf" name="iteam_shelf" style="display:none;"  min="0" step="1"></textarea>

	   <label for="iteam_row" id="iteam_row_label" style="display:none;">row:</label>
	   <input type="number" id="iteam_row" name="row_shelf" style="display:none;"  min="0" step="1"></textarea>

	  <br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <script>
    const actionSelect = document.getElementById('action-select');

    const user_AmountLabel = document.getElementById('user-Amount-label');
    const user_AmountInput = document.getElementById('user_Amount');

    const amount_Filterlabel = document.getElementById('amount_Filter_label');
    const amount_Filterinput = document.getElementById('amount_Filter');

    const selected_optionlabel = document.getElementById('selected_option_label');
    const selected_optioninput = document.getElementById('selected_option');

    const itemidlabel = document.getElementById('item_id_label'); 
    const itemidinput = document.getElementById('item_id'); 

    const rowlabel = document.getElementById('iteam_row_label');
    const rowinput = document.getElementById('iteam_row');


    const shelflabel = document.getElementById('iteam_shelf_label');
    const shelfinput = document.getElementById('iteam_shelf');


    const findproductlabel = document.getElementById('find_product_label');
    const findproductinput = document.getElementById('find_product');



    actionSelect.addEventListener('change', function() {
        if (actionSelect.value === 'null') {
            user_AmountLabel.style.display = 'none';
            user_AmountInput.style.display = 'none';

            amount_Filterlabel.style.display = 'none';
            amount_Filterinput.style.display = 'none';

           selected_optionlabel.style.display = 'none';
            selected_optioninput.style.display = 'none';

            amount_Filterlabel.style.display = 'none';
            amount_Filterinput.style.display = 'none';

            findproductlabel.style.display = 'none';
            findproductinput.style.display = 'none';

            rowlabel.style.display = 'none';
            rowinput.style.display = 'none';

            shelflabel.style.display = 'none';
            shelfinput.style.display = 'none';


            findproductlabel.style.display = 'none';
            findproductinput.style.display = 'none';

            itemidlabel.style.display = 'none';
            itemidinput.style.display = 'none';

        } else if (actionSelect.value === 'update') {
            user_AmountLabel.style.display = 'block';
            user_AmountInput.style.display = 'block';

            itemidlabel.style.display = 'block'; 
            itemidinput.style.display = 'block';

            amount_Filterlabel.style.display = 'none';
            amount_Filterinput.style.display = 'none';

           selected_optionlabel.style.display = 'block';
            selected_optioninput.style.display = 'block';


            findproductlabel.style.display = 'none';
            findproductinput.style.display = 'none';


            rowlabel.style.display = 'none';
            rowinput.style.display = 'none';

            shelflabel.style.display = 'none';
            shelfinput.style.display = 'none';


            findproductlabel.style.display = 'none';
            findproductinput.style.display = 'none';


        } else if (actionSelect.value === 'filter') {
            user_AmountLabel.style.display = 'block';
            user_AmountInput.style.display = 'block';

            amount_Filterlabel.style.display = 'block';
            amount_Filterinput.style.display = 'block';

           selected_optionlabel.style.display = 'none';
            selected_optioninput.style.display = 'none';

            amount_Filterlabel.style.display = 'block';
            amount_Filterinput.style.display = 'block';

            rowlabel.style.display = 'block';
            rowinput.style.display = 'block';

            shelflabel.style.display = 'block';
            shelfinput.style.display = 'block';


            findproductlabel.style.display = 'block';
            findproductinput.style.display = 'block';

            itemidlabel.style.display = 'none';
            itemidinput.style.display = 'none';

        }
    });
</script>



<table border="1">
    <tr>
        <th>Shelf</th>
        <th>RowNum</th>
	<th>product name</th>
        <th>BrandName</th>
        <th>Quantity</th>
    </tr>
<?php



$userAmount = $selectedOption = $itemID = "";
$Amount = $amountFilter = $shelf = $row = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];
    $userAmount = $_POST["userAmount"];
    $selectedOption = $_POST["selectedOption"];
    $itemID = $_POST["itemID"];
    $Amount = $_POST["amount"];
    $amountFilter = $_POST["amountFilter"];
    $shelf = $_POST["shelf"];
    $row = $_POST["row"];

    echo " userAmount: " . $action . "<br>";
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
	print "<td>" . $rows['ItemName'] . "</td>";
        print "<td>" . $rows['BrandName'] . "</td>";
        print "<td>" . $rows['Quantity'] . "</td><tr>";
    }
    ?>
</table>
</body>
</html>
