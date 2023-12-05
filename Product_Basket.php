<!--Specifying that we using HTML-->
<!DOCTYPE html>

<!--Specifying that language is English-->
<html lang="en">

    <head>
        <!--Specifying character set-->
        <meta charset="UTF-8"/>
        <!--Title of web page-->
        <title>Teamprotecht</title>
        <!--Attaching css file-->
        <!-- <link rel="stylesheet" href="CSS Images\style.css" /> -->
        <script defer src="JavaScript/script.js"></script>
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        

    </head>

    <body>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <!--Creating the navigation bar-->
        <nav>
            <ul>         
                <!--3 different tabs with links to each page-->
                <li><img src="CSS Images\logo.png" width="90px" height="65px"></li>
                <li><a href="Teamprotecht - HomePage.html">Home</a></li>
                <li><a href="browse.html">Browse</a></li>
                <li style="float:right"><a href="Product_Basket.php"><i class="fa fa-shopping-basket"></i></a></li>
                <li style="float:right"><a href="customerLogin.html"><i class="fa fa-user"></i></a></li>
                        
            </ul>
        </nav>

        <main>
            <section id="basket">
                <!-- Create a product gallery for shopping cart -->
                <?php
                try{
                    include "connectdb.php";
                    $title = "SELECT * FROM users";
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $rows = $db->query($title);
                    foreach($rows as $row){
                        $titl = $row['UserName'];
                        $pid = $row['User_ID'];
                        echo "<div id='button$pid'><button>".$row['User_ID']."</button><br>";

                        $sql1 = "SELECT * FROM users";
                        $rows1 = $db->query($sql1);

                        foreach($rows1 as $row1){
                                echo "<table>";
                                echo "<tr>";
                                echo "<th>Title</th>";
                                echo "<th>Start Date</th>";
                                echo "<th>End Date</th>";
                                echo "<th>Description</th></tr>";
                                echo "<tr><td>".$row1['User_ID']."</td>";
                                echo "<td>".$row1['UserName']."</td>";
                                echo "<td>".$row1['Updated_at']."</td>";
                                echo "<td>".$row1['Created_at']."</td>";
                                echo "</tr></table></div><br><br>";
                            }
                        }
                    } catch(PDOException $er){
                        echo "Display failed: " . $er->getMessage();
                }



                    $product_array = $db->query("SELECT * FROM item ORDER BY Item_ID ASC");
                    if (!empty($product_array)){
                        foreach($product_array as $key=>$value){
                ?>
                <div class="product-item">
                    <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
		                <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
		                <div class="product-tile-footer">
		                <div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
		                <div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
		                <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
		                </div>
		            </form>
	            </div>
                <?php
                        }
                    }
                    ?>
                    <!-- List cart items from the PHP session -->

            <div id="shopping-cart"> 
                <div class="txt-heading">Shopping Cart</div>

                <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
                <?php
                    if(isset($_SESSION["cart_item"])){
                    $total_quantity = 0;
                    $total_price = 0;
                ?>	
                <table class="tbl-cart" cellpadding="10" cellspacing="1">
                    <tbody>
                        <tr>
                            <th style="text-align:left;">Name</th>
                            <th style="text-align:left;">Code</th>
                            <th style="text-align:right;" width="5%">Quantity</th>
                            <th style="text-align:right;" width="10%">Unit Price</th>
                            <th style="text-align:right;" width="10%">Price</th>
                            <th style="text-align:center;" width="5%">Remove</th>
                        </tr>	
                    <?php		
                        foreach ($_SESSION["cart_item"] as $item){
                        $item_price = $item["quantity"]*$item["price"];
		            ?>
				        <tr>
				            <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				            <td><?php echo $item["code"]; ?></td>
				            <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				            <td style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				            <td style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				            <td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				        </tr>
				    <?php
				        $total_quantity += $item["quantity"];
				        $total_price += ($item["price"]*$item["quantity"]);
		                }
		            ?>

                        <tr>
                            <td colspan="2" align="right">Total:</td>
                            <td align="right"><?php echo $total_quantity; ?></td>
                            <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>		
                <?php
                    } else {
                ?>
                <div class="no-records">Your Cart is Empty</div>
                <?php 
                    }
                ?>
                </div>
                </section>

                <section id="remove_empty">
                    <?php
                    switch ($variable) {
                        case "remove":
                            if(!empty($_SESSION["cart_item"])) {
                                foreach($_SESSION["cart_item"] as $k => $v) {
                                    if($_GET["code"] == $k)
                                    unset($_SESSION["cart_item"][$k]);				
                                    if(empty($_SESSION["cart_item"]))
                                        unset($_SESSION["cart_item"]);
                                }
                            }
                            break;
                        case "empty":
                            unset($_SESSION["cart_item"]);
                                break;
                        }
                    ?>
                </section>
                <!-- Database product table for shopping cart -->
                <section id="databaseproducttable">
                    
                </section>
            <section id="checkout">

            </section>
        </main>
    </body>
</html>