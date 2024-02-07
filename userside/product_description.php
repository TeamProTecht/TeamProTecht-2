<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Teamprotecht</title>
        <!--Attaching css file-->
        <link rel="stylesheet" href="CSS Images HP\style.css" />
        <link rel="stylesheet" href="CSS Images HP\dancss.css" />
        <script defer src="JavaScript/script.js"></script>
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <nav>
            <ul>
                <li><img src="CSS Images\logo.png" width="90px" height="65px"></li>
                <li><a href="">Browse</a></li>
                <li><a href="">iPhone</a> </li>
                <li><a href="">Android</a></li>
                <li style="float:right"><a href="#"><i class="fa fa-shopping-basket"></i></a></li>
                <li style="float:right"><a href="#"><i class="fa fa-user"></i></a></li>
                <li style="float:right"><a href="#"><i class="fa fa-search"></i></a></li>
            </ul>
        </nav>

        <main>
            <h2>Product Descriptions</h2>
            <!-- Creating a page to display description of all products-->
            <?php 
            try {
                $db = new PDO('mysql:host=localhost;dbname=teamprotecht', 'root', '');
                // select everything from the item table - statement 1
                $s1 = "SELECT * FROM 'item'";

                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $featuredItems = $db->query($s1);
                foreach($featuredItems as $featuredItem) {
                    $itemID = $featuredItem['Item_ID'];
                    $itemName = $featuredItem['ItemName'];
                    $itemDesc = $featuredItem['ItemDesc'];
                    $itemPrice = $featuredItem['Price'];                    
                    $locID = $featuredItem['Location_ID'];

                    $s2 = "SELECT * FROM 'item' WHERE Item_ID = $itemID";

                    $featuredItems = $db->query($s2);

                    echo "<br><table><tr>";
                    echo "<th>Product description</th>";
                    echo "<th>Item name</th>";
                    echo "<th>Item description</th>";
                    echo "<th>Price<th></tr>";
                    foreach ($items as $item) {
                        $itemID = $item['Item_ID'];
                        $itemDesc = $item['ItemDesc'];
                        
                        $s3 = "SELECT * FROM 'location' WHERE Location_ID = $locID";
                        $products = $db->query($s3);

                        foreach ($products as $product) {
                            $itemName = $product['ItemName'];
                            $itemPrice = $product['Price'];
                            
                            echo "<tr>";
                            echo "<td>".$itemID."</td>";
                            echo "<td".$itemName."</td>";
                            echo "<td>".$itemDesc."</td>";
                            echo "<td>".$itemPrice."</td>";
                            echo "<td>".$locID."</td>";
                        }
                    }
                    echo "</table>";
                }
            } catch (PDOException $er) {
                echo "Failed to get product descriptions! " . $er->getMessage();
            }
            ?>            
        </main>
    </body>
</html>