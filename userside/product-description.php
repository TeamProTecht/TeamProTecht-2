<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Teamprotecht</title>
    <link rel="stylesheet" href="CSS Images\style.css" />
    <script defer src="JavaScript/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav>
        <ul>
            <li><img src="CSS Images\logo.png" width="90px" height="65px"></li>
            <li><a href="">Browse</a></li>
            <li><a href="">iPhone</a></li>
            <li><a href="">Android</a></li>
            <li style="float:right"><a href="#"><i class="fa fa-shopping-basket"></i></a></li>
            <li style="float:right"><a href="#"><i class="fa fa-user"></i></a></li>
            <li style="float:right"><a href="#"><i class="fa fa-search"></i></a></li>
        </ul>
    </nav>

    <?php 
    $db = new PDO('mysql:host=localhost;');
    ?>
</body>
</html>
