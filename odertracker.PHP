


<br>

<form method="post" >

<label for="statusSelect">Select Status:</label>
<select id="statusSelect" name="statusSelect">
    <option value="">select</option>
    <option value="Pending">Pending</option>
    <option value="Paid">Paid</option>
    <option value="Shipped">Shipped</option>
    <option value="Received">Received</option>
</select>
<label for="oderSelect">Select oeder:</label>
<select id="oderSelect" name="oderSelect">
    <option value="">select</option>
    <option value="ASC">accending</option>
    <option value="DESC">decending</option>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $status = $_POST["statusSelect"];
    $oder = $_POST["oderSelect"];

    echo " staus: " . $status . "<br>";
echo " oder: " . $oder . "<br>";

}
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
</body>
</html>
