//connect to db
<?php

$con=mysqli_connect('localhost','root','','cs2tp');
if(!$con){
    die(mysqli_error($con));
}

?>