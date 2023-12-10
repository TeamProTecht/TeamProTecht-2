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
        <link rel="stylesheet" href="CSS Images\style.css" />
        <script defer src="JavaScript/script.js"></script>
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <!--Creating the navigation bar-->
        <nav>
            <ul>         
                <!--3 different tabs with links to each page-->
                <li><img src="CSS Images\logo.png" width="90px" height="65px"></li>
                <li><a href="HomePage.html">Home</a></li>
                <li><a href="browse.html">Browse</a></li>
                <li><a href="Product_Basket.php"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a href="customerLogin.html"><i class="fa fa-user"></i></a></li>
            </ul>
        </nav>

        <main>
            <h2>Your Basket</h2>
            <section id="basket">
                <!-- Create a Basket with a button to checkout -->
                <?php
                try{
                    include "connectdb.php";
                    //if(isset($_POST["submitted"])){
                        //$user = $_SESSION["username"];

                        $basket = "SELECT * FROM `basket` WHERE User_ID = '2'";

                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $basketItems = $db->query($basket);
                        foreach($basketItems as $basketItem){
                            $basketID = $basketItem['Basket_ID'];
                            $primarykey = $basketID;
                            $basketUserID = $basketItem['User_ID'];
                            $itemID = $basketItem['Item_ID'];
                            $itemQuan = $basketItem['Quantity'];

                            $itemList = "SELECT * FROM `item` WHERE Item_ID= $itemID";
                            $item = $db->query($itemList);

                            echo "<br><table><tr>";
                            echo "<th>Basket number</th>";
                            echo "<th>Item name</th>";
                            echo "<th>Quantity</th>";
                            echo "<th>Price</th>";
                            echo "<th>Delete Item</th></tr>";
                            foreach($item as $itemInfo){
                                $itemName = $itemInfo['ItemName'];
                                $itemPrice = $itemInfo['Price']*$itemQuan;
                            
                                echo "<tr>";
                                echo "<td>".$itemID."</td>";
                                echo "<td>".$itemName."</td>";
                                echo "<td>".$itemQuan."</td>";
                                echo "<td>".$itemPrice."</td>";
                                echo "<td><button onclick='deleteItem()'>Delete</button><p id='delete".$itemID."'></td></tr>";

                                echo "<script>function deleteItem(){";
                                echo   "var txt;";
                                echo    "if(confirm('Are you sure you want to delete item?')){";
                                echo        "txt = 'Successful deletion';";
                                echo    "} else{";
                                echo        "txt = 'Cancelled deletion';";
                                echo    "}";
                                echo    "document.getElementById('delete".$itemID."').innerHTML=txt;";
                                echo "}</script>";
                            }
                            echo "</table>";

                            //When button "checkout" is clicked, send basket and single user to order table
                            echo "<button id='checkout' action='checkout.php' onclick='checkout()'>Checkout</button>";
                            echo "<script>function checkout(){";
                                    ?><?php $sendOrder = 'INSERT INTO orders (`Basket_ID`, `User_ID`);
                                    VALUES (:basket, :basketuserID)';
                                    $statement = $db->prepare($sendOrder);
                                    $statement->bindParam(':basket', $basketID, PDO::PARAM_INT);
                                    $statement->bindParam(':basketuserID', $basketUserID, PDO::PARAM_INT); 
                                    $statement->execute(); ?><?php
                            echo "}</script>";
                        }
                    //} //else{
                        //echo "Not logged in";
                        //header("Location: HomePage.html");
                    //}
                } catch(PDOException $er){
                    echo "Display failed: " . $er->getMessage();
                }
                ?>
        </main>
    </body>
</html>