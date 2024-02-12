<html>
    <head>
            <!---box icons css-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="employee.css">
</head>
    

<body>
<section id="sidebar">
          <a href="" class="brand">
            <span class="icon">
                <img src="logo.png" alt="teamprotect logo">
            </span>
          </a>
          <ul class="side-menu top">
            <li>
                <a href="#">
                    <i class='bx bxl-dropbox' ></i>
                    <span class="text">Stock View</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-mail-send' ></i>
                    <span class="text">Confirm Orders</span>
                </a>
            </li>            <li>
                <a href="#">
                    <i class='bx bxs-hourglass' ></i>
                    <span class="text">Pending Orders</span>
                </a>
            </li>            <li>
                <a href="#">
                    <i class='bx bxs-package' ></i>
                    <span class="text">Fulfilled Orders</span>
                </a>
            </li>
        </li>            <li>
            <a href="#">
                <i class='bx bx-log-out'></i>
                <span class="text">Logout</span>
            </a>
        </li>
          </ul>
    </section>

<br>

<section id="table">
<form method="post" >

<label for="statusSelect">Select Status:</label>
<select id="statusSelect" name="statusSelect">
    <option value="">select</option>
    <option value="Pending">Pending</option>
    <option value="Paid">Paid</option>
    <option value="Shipped">Shipped</option>
    <option value="Received">Received</option>
</select>
<label for="orderSelect">Select order:</label>
<select id="orderSelect" name="orderSelect">
    <option value="">select</option>
    <option value="ASC">accending</option>
    <option value="DESC">decending</option>
</select>

    <input type="submit" value="Submit">
</form>






<table>
        <tr>
            <th>Order ID</th>
            <th>Address</th>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Order Status</th>
            <th>Updated At</th>
            <th>Row</th>
            <th>Shelf</th>
            <th>Quantity Ordered?</th>
        </tr>


    <?php
   $pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
    $statement = $pdo->query("SELECT
    Orders.Order_ID,
    Orders.Address_Order AS Order_Address,
    Item.Item_ID,
    Item.ItemName,
    Orders.Order_Status,
    Orders.Updated_at AS Order_Updated_at,
    Location.Row,
    Location.Shelf,
    BasketItem.Quantity AS Basket_Quantity
FROM Orders
JOIN Basket ON Orders.Basket_ID = Basket.Basket_ID
JOIN BasketItem ON Orders.Basket_ID = BasketItem.Basket_ID
JOIN Item ON BasketItem.Item_ID = Item.Item_ID
JOIN Location ON Item.Location_ID = Location.Location_ID;");

$status="";
$oder= "";




if($oder!= "" && $status  !=""){
    $pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
    $statement = $pdo->query("SELECT
    Orders.Order_ID,
    Orders.Address_Order AS Order_Address,
    Item.Item_ID,
    Item.ItemName,
    Orders.Order_Status,
    Orders.Updated_at AS Order_Updated_at,
    Location.Row,
    Location.Shelf,
    BasketItem.Quantity AS Basket_Quantity
FROM Orders
JOIN Basket ON Orders.Basket_ID = Basket.Basket_ID
JOIN BasketItem ON Orders.Basket_ID = BasketItem.Basket_ID
JOIN Item ON BasketItem.Item_ID = Item.Item_ID
JOIN Location ON Item.Location_ID = Location.Location_ID
WHERE Orders.Order_Status = '$status'
ORDER BY Order_Updated_at $oder;");



}elseif ($status !="") {
    $pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
    $statement = $pdo->query("SELECT
    Orders.Order_ID,
    Orders.Address_Order AS Order_Address,
    Item.Item_ID,
    Item.ItemName,
    Orders.Order_Status,
    Orders.Updated_at AS Order_Updated_at,
    Location.Row,
    Location.Shelf,
    BasketItem.Quantity AS Basket_Quantity
FROM Orders
JOIN Basket ON Orders.Basket_ID = Basket.Basket_ID
JOIN BasketItem ON Orders.Basket_ID = BasketItem.Basket_ID
JOIN Item ON BasketItem.Item_ID = Item.Item_ID
JOIN Location ON Item.Location_ID = Location.Location_ID
WHERE Orders.Order_Status = '$status';");

}elseif($oder != ""){
    $pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
    $statement = $pdo->query("SELECT
    Orders.Order_ID,
    Orders.Address_Order AS Order_Address,
    Item.Item_ID,
    Item.ItemName,
    Orders.Order_Status,
    Orders.Updated_at AS Order_Updated_at,
    Location.Row,
    Location.Shelf,
    BasketItem.Quantity AS Basket_Quantity
FROM Orders
JOIN Basket ON Orders.Basket_ID = Basket.Basket_ID
JOIN BasketItem ON Orders.Basket_ID = BasketItem.Basket_ID
JOIN Item ON BasketItem.Item_ID = Item.Item_ID
JOIN Location ON Item.Location_ID = Location.Location_ID
ORDER BY Order_Updated_at $oder;");

}else{
    
    $pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
    $statement = $pdo->query("SELECT
    Orders.Order_ID,
    Orders.Address_Order AS Order_Address,
    Item.Item_ID,
    Item.ItemName,
    Orders.Order_Status,
    Orders.Updated_at AS Order_Updated_at,
    Location.Row,
    Location.Shelf,
    BasketItem.Quantity AS Basket_Quantity
FROM Orders
JOIN Basket ON Orders.Basket_ID = Basket.Basket_ID
JOIN BasketItem ON Orders.Basket_ID = BasketItem.Basket_ID
JOIN Item ON BasketItem.Item_ID = Item.Item_ID
JOIN Location ON Item.Location_ID = Location.Location_ID;");
}
    
    foreach ($statement as $rows) {
        print "<td>" . $rows['Order_ID'] . "</td>";
        print "<td>" . $rows['Order_Address'] . "</td>";
	print "<td>" . $rows['Item_ID'] . "</td>";
	print "<td>" . $rows['ItemName'] . "</td>";
        print "<td>" . $rows['Order_Status'] . "</td>";
        print "<td>" . $rows['Order_Updated_at'] . "</td>";
	print "<td>" . $rows['Basket_Quantity'] . "</td>";
print "<td>" . $rows['Row'] . "</td>";
print "<td>" . $rows['Shelf'] . "</td><tr>";

	
    }
    ?>
</table>
</section>
</body>
</html>