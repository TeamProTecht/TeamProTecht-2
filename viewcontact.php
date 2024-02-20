

User
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
</head>
<body>
    <h1>Contact Messages</h1>

    <?php
    // Database connection (Replace these parameters with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "stockpage";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch all contact messages
    $sql = "SELECT * FROM ContactUs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<p><strong>Name:</strong> " . $row["Name"] . "</p>";
            echo "<p><strong>Email:</strong> " . $row["Email"] . "</p>";
            echo "<p><strong>Message:</strong> " . $row["Message"] . "</p>";

            // Form for replying by email
            echo "<form method='post'>";
            echo "<input type='hidden' name='email' value='" . $row["Email"] . "'>";
            echo "<textarea name='reply_message' placeholder='Type your reply here'></textarea><br>";
            echo "<input type='submit' name='reply_submit' value='Reply'>";
            echo "</form>";

            echo "</div>";

            // Handle reply and delete
            if(isset($_POST['reply_submit'])) {
                $email = $_POST['email'];
                $reply_message = $_POST['reply_message'];
                // Send email (implement your email sending logic here)
                // Once email sent, delete the message from database
                $delete_sql = "DELETE FROM ContactUs WHERE Email='$email'";
                if ($conn->query($delete_sql) === TRUE) {
                    echo "<p>Message replied and deleted successfully.message will disapper when refreshed. but due to it being dumb website it can ot it needs to e hosted and proper serve set up</p>";
                } else {
                    echo "<p>Error replying and deleting message: " . $conn->error . "</p>";
                }
            }
        }
    } else {
        echo "No contact messages found.";
    }

    $conn->close();
    ?>

</body>
</html> 
