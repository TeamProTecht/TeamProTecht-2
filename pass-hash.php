<?php
/* This script is responsible for generating a hash for
* a given password and checking whether the two passwords match,
* for the registration and login form
*/
$pswdRegister = "privatePass";

$options = [
    'cost' => 12
];

 $hashedPswd = password_hash($pswd, PASSWORD_BCRYPT, $options);

 $pswdLogin = "privatePass";
 
 if (password_verify($pswdLogin, $hashedPswd)) {
    echo "Passwords are the same!";
 } else {
    echo "Error! Passwords are not the same!";
 }
?>