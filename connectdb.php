<?php
<<<<<<< HEAD
    try{
        $dbname = 'teamprotecht';
        $dbhost = '127.0.0.1';
        $username = 'root';
        $password = '';
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);
    }   catch(PDOException $ex){
        ?>
        <p>There was an error. Try again</p>
        <p>Error details: <?= $ex->getMessage() ?></p>
    <?php
    }
    ?>
=======
$servername = "localhost";
$username = "username";
$password = "password";

try {
  $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
>>>>>>> 6a13b77d32043341a682d3f2a352c109b6fecb60
