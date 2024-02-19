<?php
session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $basketID = $_POST['basketID'];
        $address = trim($_POST['address']);
        $cardNumber = $_POST['cardNumber'];
        $expiryDate = $_POST['expiryDate'];
        $cvv = $_POST['cvv'];

        // Check for user session
        if (!isset($_SESSION['userID'])) {
            throw new Exception("User is not logged in.");
        }
        $userID = $_SESSION['userID'];

        // Validate address
        if (empty($address)) {
            throw new Exception("Address field is empty. Please enter a delivery address.");
        }

        // Validate credit card number
        if (!preg_match('/^\d{16}$/', $cardNumber)) {
            throw new Exception("Invalid credit card number. Please enter a 16-digit number.");
        }

        // Validate expiry date
        if (!preg_match('/^(0[1-9]|1[0-2])\/[0-9]{2}$/', $expiryDate)) {
            throw new Exception("Invalid expiry date. Please enter a date in MM/YY format.");
        }

        // Validate CVV
        if (!preg_match('/^\d{3}$/', $cvv)) {
            throw new Exception("Invalid CVV. Please enter a 3-digit number.");
        }

        // Check if the basket is not empty
        $checkBasket = "SELECT COUNT(*) FROM BasketItem WHERE Basket_ID = :basketID";
        $stmt = $db->prepare($checkBasket);
        $stmt->bindParam(':basketID', $basketID, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->fetchColumn() == 0) {
            throw new Exception("The basket is empty. Please add items to your basket before checking out.");
        }

        // Insert the order
        $insertOrder = 'INSERT INTO Orders (Basket_ID, User_ID, Address_Order, Order_Status) VALUES (:basket, :user, :address, "Pending")';
        $statement = $db->prepare($insertOrder);
        //Basket and userid need to be fetched from session
        $statement->bindParam(':basket', $basketID, PDO::PARAM_INT);
        $statement->bindParam(':user', $userID, PDO::PARAM_INT);

        $statement->bindParam(':address', $address, PDO::PARAM_STR);
        $statement->execute();

        // Redirect to home.php
        header('Location: homepage.php');
        exit();
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
