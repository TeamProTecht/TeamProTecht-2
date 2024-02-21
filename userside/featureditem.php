<?php
include 'connectdb.php'
?>
<?php
// SQL query to retrieve 4 items with the lowest quantity (greater than or equal to 1)
$query = "SELECT * FROM item WHERE Quantity >= 1 ORDER BY Quantity ASC LIMIT 4";
$result = $conn->query($query);

// Check if there are results
if ($result->num_rows > 0) {
  
  //Container 
  echo '<div style="display: flex; flex-wrap: wrap;">';
    // Output of each row 
    while ($row = $result->fetch_assoc()) {
        // Display of each item
        echo'<div style="border: 1px solid #000; padding: 10px; margin: 5px;">';
        echo "Best Seller: " . $row["ItemName"]  . ", Price: " . $row["Price"];
        echo '</div><br>';   
        echo '<button onclick="addToBasket(' . $row["Item_ID"] . ')">Add to Basket</button>';
        echo '<button onclick="viewMore(' . $row["Item_ID"] . ')">View More</button>';

    }
    // Close the container
 echo '</div>';

} else {
    echo "Featured Products to be announced";
}
?>


  
               
