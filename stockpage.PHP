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
    <h4> edit quaintity</h4>
    <div class="select-buttons">
        <button onclick="setTo()">Set To</button>
        <span>OR</span>
        <button onclick="removeAmount()">Remove Amount</button>
         <input type="number" class="integer-input" placeholder="Enter positive integer" min="0" step="1">
    </div>

<h4>seacrh</h4>
<div class="filtering">
    <label for="amount">Amount:</label>
    <input type="number" id="amount" class="filter-input" placeholder="Enter positive integer" min="0" step="1">
    <select id="amountFilter">
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
    <label for="binLocation">Bin Location:</label>
    <input type="text" id="binLocation" class="filter-input">
</div>
<div class="select-buttons">
<button id="searchButton">Search</button>
</div>
    <script>
            function searchDatabase() {
            // Get values from inputs
            var amount = document.getElementById('amount').value;
            var amountFilter = document.getElementById('amountFilter').value;
            var product = document.getElementById('product').value;
            var binLocation = document.getElementById('binLocation').value;

            // Perform SQL query
        }




        function setTo() {
            // Implement SQL query for setting a value
 
        }

        function removeAmount() {
            // Implement SQL query for removing an amount
            
        }
    </script>
</body>

</html>
