


<br>

<form method="post" >

<label for="statusSelect">Select Status:</label>
<select id="statusSelect" name="status">
    <option value="select">select</option>
    <option value="pending">Pending</option>
    <option value="paid">Paid</option>
    <option value="shipped">Shipped</option>
    <option value="received">Received</option>
</select>
<label for="oderSelect">Select oeder:</label>
<select id="oderSelect" name="status">
    <option value="select">select</option>
    <option value="accending">accending</option>
    <option value="decending">decending</option>
</select>
<br>
    <input type="submit" value="Submit">
</form>






<table border="1">
    <tr>
        <th>oder id</th>
        <th>adress</th>
	<th>iteam id</th>
        <th>item name</th>
        <th>oder status</th>
	<th>updated at</th>
	<th>row</th>
	<th>shelf</th>
	<th>quanity</th>
    </tr>
<?php



$status="";
$oder= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $status = $_POST["statusSelect"];
    $oder = $_POST["oderSelect"];

    echo " staus: " . $statusSelect . "<br>";

}

if ($status == "pending" || $status == "paid" || $status == "pending" || $status == "shipped" || $status == "received") {

	if($oder == "decending"){

	}elseif($oder == "accending"){
	}else{

    		$pdo = new PDO('sqlite:new.db');
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
		JOIN Location ON Item.Location_ID = Location.Location_ID;
		");
	}
}
?>
    <?php
    $pdo = new PDO('sqlite:new.db');
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

    
    foreach ($statement as $rows) {
        print "<td>" . $rows['Order_ID'] . "</td>";
        print "<td>" . $rows['Address_Order'] . "</td>";
	print "<td>" . $rows['Item_ID'] . "</td>";
	print "<td>" . $rows['ItemName'] . "</td>";
        print "<td>" . $rows['Order_Status'] . "</td>";
        print "<td>" . $rows['Updated_at'] . "</td>";
	print "<td>" . $rows['Basket_Quantity'] . "</td>";
print "<td>" . $rows['Row'] . "</td>";
print "<td>" . $rows['Shelf'] . "</td>";
print "<td>" . $rows['Quantity'] . "</td><tr>";
	
    }
    ?>
</table>
</body>
</html>
