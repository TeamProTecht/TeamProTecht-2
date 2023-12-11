<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
</head>
<body>


    <form action="process_form.php" method="post" enctype="multipart/form-data">
        <label for="brandname">Brand Name:</label>
        <input type="text" name="brandname" required><br><br>


        <label for="itemname">Item Name:</label>
        <input type="text" name="itemname" required><br><br>


        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required><br><br>


        <label for="itemdescription">Item Description:</label>
        <textarea name="itemdescription" rows="4" required></textarea><br><br>


        <label for="photoname">Photo Name:</label>
        <input type="text" name="photoname" required required><br><br>


        <label for="shelf">Shelf:</label>
        <input type="text" name="shelf" required><br><br>


        <label for="row">Row:</label>
        <input type="text" name="row" required><br><br>


        <input type="submit" value="Submit">
    </form>

</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brandname = $_POST["brandname"];
    $itemname = $_POST["itemname"];
    $quantity = $_POST["quantity"];
    $itemdescription = $_POST["itemdescription"];
    $photo = $_POST["photoname"];
    $shelf = $_POST["shelf"];
    $row = $_POST["row"];

?>



</html>
