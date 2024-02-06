//this allows the user to connect to the database, please use this when connecting within your php  
<?php

$con=mysqli_connect('localhost','root','','cs2tp');
if(!$con){
    die(mysqli_error($con));
}

?>