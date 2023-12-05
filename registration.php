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
                        <label for="fname">Employee's First Name</label>
                        <input type="text" name="fname" placeholder="*" required />
                        <br><br>
                        <label for="lname">Employee's Last Name</label>
                        <input type="text" name="lname" placeholder="*" required />
                        <br><br>
                        <label for="employeeEmail">Employee Email Address</label>
                        <input type="email" name="employeeEmail" placeholder="*" required />
                        <br><br>
                        <label for="first_pass">Password</label>
                        <input type="password" name="first_pass" id="userInput" placeholder="*"
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
                        <button class="regbtn" onclick="validateForm()">Register</button>

        
    </div>
