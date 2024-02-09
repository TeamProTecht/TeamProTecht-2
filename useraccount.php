<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Details</title>
</head>
<body>
    <h2>Edit User Details</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Username: <input type="text" name="username" value="<?php echo $row['Username'] ?? ''; ?>"><br><br>
        Password: <input type="password" name="password" value="<?php echo $row['Password'] ?? ''; ?>"><br><br>
        Forename: <input type="text" name="forename" value="<?php echo $row['Fore_name'] ?? ''; ?>"><br><br>
        Second Name: <input type="text" name="second_name" value="<?php echo $row['Second_Name'] ?? ''; ?>"><br><br>
        Last Name: <input type="text" name="last_name" value="<?php echo $row['Last_Name'] ?? ''; ?>"><br><br>
        Address: <textarea name="address"><?php echo $row['Address_User'] ?? ''; ?></textarea><br><br>
        <input type="submit" value="Update">
    </form>

    <!-- Button to view previous orders -->
    <button onclick="openPreviousOrders()">View Previous Orders</button>

    <!-- Modal for previous orders -->
    <div id="previousOrdersModal" style="display: none;">
        <div id="modalContent"></div>
    </div>

    <script>
        function openPreviousOrders() {
            var modal = document.getElementById("previousOrdersModal");
            var modalContent = document.getElementById("modalContent");

            // You can adjust the URL according to your server setup
            var url = 'get_previous_orders.php';

            // Fetch previous orders via AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    modal.style.display = "block";
                    modalContent.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>
