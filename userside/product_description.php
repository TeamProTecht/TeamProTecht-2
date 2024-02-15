<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Teamprotecht</title>
        <!--Attaching css file-->
        <link rel="stylesheet" href="product_description.css">
        <script defer src="JavaScript/script.js"></script>
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <!-- navbar -->
        <nav>
            <ul>
                <li><img src="CSS Images HP\logo.png" width="90px" height="65px"></li>
                <li><a href="browse.php">Browse</a></li>
                <li><a href="">iPhone</a></li>
                <li><a href="">Android</a></li>
                <li style="float:right"><a href="#"><i class="fa fa-shopping-basket"></i></a></li>
                <li style="float:right"><a href="#"><i class="fa fa-user"></i></a></li>
                <li style="float:right"><a href="#"><i class="fa fa-search"></i></a></li>
            </ul>
        </nav>
        <main>
            <section id="description">
            <!-- Display product descriptions for all products-->
            <?php
            try {
                $db = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
                // Select brands
                $brand_query = "SELECT * FROM brand";
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $brands = $db->query($brand_query);

                foreach ($brands as $brand) {
                    $brand_name = $brand['BrandName'];

                    $item_query = "SELECT * FROM item WHERE Item_ID = '1'";
                    $items = $db->query($item_query);
                    echo "<br><table><tr>";
                    echo "<th>Item Name</th>";
                    echo "<th>Brand Name</th>";
                    echo "<th>Description</th>";
                    echo "<th>Price</th>";

                    foreach ($items as $item) {
                        $item_name = $item['ItemName'];
                        $item_description = $item['ItemDesc'];
                        $item_price = $item['Price'];

                        echo "<tr>";
                        echo "<td>".$item_name."</td>";
                        echo "<td>".$brand_name."</td>";
                        echo "<td>".$item_description."</td>";
                        echo "<td>".$item_price."</td>";
                        echo "</table>";
                    }  
                }
            } catch(PDOException $error) {
                echo "Display failed: " . $error->getMessage();
            }
            ?>
            </section>
        </main>
    </body>
</html>