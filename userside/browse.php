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
        <link rel="stylesheet" href="CSS/browse.css" />
        <!-- Add java script -->
        <script defer src="JavaScript/script.js"></script>
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <!--Creating the navigation bar-->
                <nav>
                    <ul> 
                        <!--3 different tabs with links to each page-->
                        <li><img src="CSS Images/logo.png" width="90px" height="65px"></li>
                        <li><a href="Teamprotecht - HomePage.html">Home</a></li>
                        <li><a href="browse.php">Browse</a></li>
                        <li style="float:right"><a href="Product_Basket.php"><i class="fa fa-shopping-basket"></i></a></li>
                        <li style="float:right"><a href="#"><i class="fa fa-user"></i></a></li>
                        
                    </ul>
                </nav>
            <br>
            <br>
               <h1>Search Products</h1>
                <!-- Search bar -->
                <form class="searchbox" method="post" action="browse.php">
                    <input type="text" placeholder="Search" name="searchitem" onload='getSearch()'>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <br>
            <div id="searchresult">
            <?php
                if(isset($_POST["searchitem"])){
                session_start();

                $db = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '' );
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                $searchitem = $_POST['searchitem'];
                $searchsql = "SELECT `brand`.BrandName, `item`.Item_ID, `item`.ItemName, `item`.Price, `item`.Img
                                FROM `item`
                                INNER JOIN `brand` ON `brand`.Item_ID = `item`.Item_ID
                                WHERE BrandName LIKE '%$searchitem%' OR ItemName LIKE '%$searchitem%'";
                //store search bar info in local storage
                ?><script>
                    localStorage.setItem('search', <?php $searchitem ?>);
                    </script>

                <div id="filter">
                    <form id="filterform" method="post" action="browse.php">
                <!--Filter box-->
                        <br>
                        <h2>Filters</h2>
                        <h3>Prices</h3>
                        <div id="myPrices">
                            <input type="number" placeholder="Minimum" name="minprice" min="0" max="9999"> <!-- onchange="priceChange() -->
                            <input type="number" placeholder="Maximum" name="maxprice" min="1" max="10000"> <!-- onchange="priceChange() -->
                            <button type="submit">Update</button>
                        </div><br>

                        <?php
                        if(isset($_POST['minprice']) && $_POST['maxprice']){
                            $min = $_POST['minprice'];
                            $max = $_POST['maxprice'];
                            $searchsql .= ' OR price >'.$min.' OR price <= '.$max.'';
                        }
                        ?>
                    <!-- No Colour options as of right now, might remove -->
                    <!-- <h3>Colours</h3>
                    <div id="myColourDropdown">
                        <input type="checkbox" id="colour1" name="colour1">
                        <label for="colour1">Black</label><br>
                        <input type="checkbox" id="colour2" name="colour2">
                        <label for="colour2">White</label><br>
                        <input type="checkbox" id="colour3" name="colour3">
                        <label for="colour3">Grey</label><br>
                        <input type="checkbox" id="colour4" name="colour4">
                        <label for="colour4">Blue</label><br>
                        <input type="checkbox" id="colour5" name="colour5">
                        <label for="colour5">Red</label><br>
                        <input type="checkbox" id="colour6" name="colour6">
                        <label for="colour6">Other</label><br>
                    </div><br> -->
                        <h3>Brands</h3>
                        <div id="myBrandDropdown">
                        <input type="checkbox" id="brand1" name="brand1">
                        <label for="brand1">Apple</label><br>
                        <input type="checkbox" id="brand2" name="brand2">
                        <label for="brand2">Samsung</label><br>
                        <input type="checkbox" id="brand3" name="brand3">
                        <label for="brand3">Haewei</label><br>
                        <input type="checkbox" id="brand4" name="brand4">
                        <label for="brand4">Google</label><br>
                        <input type="checkbox" id="brand5" name="brand5">
                        <label for="brand5">Blackberry</label><br>
                        <input type="checkbox" id="brand6" name="brand6">
                        <label for="brand6">Other</label><br>
                        </div><br>
                        </div>
                    <?php $results = $db->query($searchsql); ?>
                <br>
                <div id="productlist">
                <?php
                foreach($results as $result){
                    $brandName = $result['BrandName'];
                    $itemID = $result['Item_ID'];
                    $itemName = $result['ItemName'];
                    $itemPrice = $result['Price'];
                    $itemImage = $result['Img'];

                    echo "<div id = 'product".$itemID."'>";
                    echo "<strong>".$brandName.' '.$itemName."</strong><br>";
                    echo "<strong>£".$itemPrice."</strong><br>";
                    echo "<img src='CSS/images/".$itemImage."' id='imgID".$itemID."'><br>";
                    echo "<button onclick='addItem".$itemID."()'>Add to basket</button>";
                    echo "</div>";

                    //javascript for each product item
                    echo "<script>";
                    echo "function addItem".$itemID."(){";
                            if(isset($_POST['user'])){
                        //from browse page, only allowed to add 1 product. product description adds multiple
                        $additemsql = "INSERT INTO `basket`(User_ID, Item_ID, Quantity) VALUES (:userID, :itemID, 1)";
                        $protectadd = $db->prepare($additemsql);
                        $protectadd->bindParam(':userID', $userID, PDO::PARAM_INT);
                        $protectadd->bindParam(':itemID', $itemID, PDO::PARAM_INT);
                        $protectadd->execute();
                    echo "alert('Successfully added to basket');"; //will need to look back after updating basket page
                            } else{;
                        //sends to login page, account page should send user back to previous page with $_POST['user'] or $_POST['user_ID'] set
                        echo "let txt = 'Need to be logged into to add item to basket. \nPlease do so and come back, thank you!';";
                        echo "if(confirm(txt) == true){";
                    //will need to look back after looking at account login page
                    echo "window.location = '/useraccountpage.php';";
                            }
                    echo "}";
                    echo "</script>";

                    //css for each product container
                    echo "<style> div#product".$itemID."{width: 250px; height:200px; margin: 5px;}</style>";
                }
                }
                ?>
                </div>
            </div>
    </body>
</html>
