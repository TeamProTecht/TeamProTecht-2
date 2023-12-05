<?php include('connectdb.php');?>

<!DOCTYPE html>
<html>

<head>
    <title>Employee Registration</title>
    <!-- Add your CSS link here -->
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>

<body>
    <div class="navbar">
        <!-- Menu Bar -->
        <ul>
          <div class="logo-container1">
            <img src="cs2tp_logo-removebg-preview (1).png" alt="Logo 1">
            
          </div>

        </ul>
    </div>



    <div class="main-content">
        <h1>Employee Registration</h1>
        <!-- Form for registration -->
         <p style="color:red">Required fields are marked with an asterisk(*)</p>
         <form action="" method="post"  enctype="multipart/form-data">
                        <label for="FirstName">Employee's First Name</label>
                        <input type="text" name="FirstName" placeholder="*" required />
                        <br><br>
                        <label for="LastName">Employee's Last Name</label>
                        <input type="text" name="LastName" placeholder="*" required />
                        <br><br>
                        <label for="employee_email">Employee Email Address</label>
                        <input type="email" name="employee_email" placeholder="*" required />
                        <br><br>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="userInput" placeholder="*"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 characters"
                            required />
                        <br><br>
                        <label for="confirm_pass">Confirm Password</label>
                        <input type="password" name="confirm_pass" id="confirmInput" placeholder="*"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                        <input type="checkbox" onclick="showPassword()"> Show Password
                        <br><br>
                        <button type="reset" class="cancelbtn">Cancel</button>
                        <button class="regbtn" onclick="validateForm()" name="user_register">Register</button>
</form>


        
    </div>

</html>

<!--php to post the user data to the db-->

<?php
if (isset($_POST['user_register'])){
    //assign them to local variables
    $user_firstname = $_POST['FirstName'];
    $user_lastname = $_POST['LastName'];
    $user_email = $_POST['employee_email'];
    $user_pasword = $_POST['password'];

    //put into the db
    $insert_query = "INSERT INTO `employees` (LastName, FirstName, password, employee_email) VALUES
    ('$user_lastname', '$user_firstname', '$user_email', '$user_pasword')";
    
    $sql_execute = mysqli_query($con, $insert_query);
    
    if ($sql_execute) {
        echo "<script>alert('Account created')</script>";
    } else {
        die(mysqli_error($con));
    }
}
?>

