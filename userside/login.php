<?php include('connectdb.php');
session_start();
//if user already logged in and made username and User_ID variables, head to account.php
if(isset($_SESSION['username']) && isset($_SESSION['User_ID'])){
    header("Location: account.php");
}else{
    session_abort();
    //if user not logged in, continue to login.php
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <!-- Add your CSS link here -->
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>

<body>
        <!-- Menu Bar -->
<?php
include "navbar.php";
?>
    <div class="main-content">
        <h1>User Login</h1>
        <form action = "login.php" method="post">
            <p>Login to get account specific benefits</p>
            <label for="username">Username</label>
            <input id="username" type="text" name="username" placeholder="Enter here" required />
            <br><br>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="Enter here" required />
            <br><br>
            <button class="loginbtn" name="loginbtn">Login</button>
            <p>If you haven't created an account, click on the underlined link below.<br>
                <a href="registration.php">Create a customer account</a></p>
        </form>
    </div>

    <?php
    session_start();
    if (isset($_POST['loginbtn'])) {
        $usernameSubmit = $_POST['username'];
        $passwordSubmit = $_POST['password'];
        echo $usernameSubmit;
        echo $passwordSubmit;

        //check if username and password exist in user database table
        $login_query = "SELECT * FROM `users` WHERE Username = :username AND Password = :password";

        //sql injection prevention
        $stmt = $pdo->prepare($login_query);
        $stmt->bindParam(':username', $usernameSubmit, PDO::PARAM_STR);
        $stmt->bindParam(':password', $passwordSubmit, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll();

        //if a match exists
        if(count($results)>0){
            foreach($results as $result){
                $usernameattempt = $result['Username'];
                $passwordattempt = $result['Password'];
                echo "$usernameattempt";
                //if username = login username
                if($usernameSubmit == $usernameattempt){
                    //if password = password unhashed
                    //task: registration.php adds hashed password
                    if ($passwordSubmit == $passwordattempt /* password_verify($passwordattempt, $passwordSubmit) */) {
                        //starts user session and goes to previous page or homepage
                        $_SESSION['username'] = $usernameSubmit;
                        $_SESSION['User_ID'] = $result['User_ID'];
                        
                        //task: set all other pages to have a $_SESSION['prev_page'] variable
                        if(isset($_SESSION['prev_page'])){
                            $prev_page = $_SESSION['prev_page'];
                            unset($_SESSION['prev_page']);
                            header("Location: $prev_page");
                        } else{
                            header("Location: homepage.php");
                        }
                    } else {
                        echo "<script>alert('Invalid password')</script>";
                        session_abort();
                    }
                } else{
                    echo "<script>alert('Invalid username')</script>";
                    session_abort();
                }
            }
        } else{
            echo "No account found";
            session_abort();
        }
    }
}
    ?>
</body>
<!-- Add footer -->
<?php include "footer.php";?>
</html>
