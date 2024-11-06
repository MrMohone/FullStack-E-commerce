<?php
session_start();

if(isset($_SESSION['username'])){
    echo "Welcome to ". $_SESSION['username'] . "<br>";
echo "And your password is ". $_SESSION['password'];
echo "Welcome to ". $_SESSION['username'] . "<br>";
echo "And your email is ". $_SESSION['email'];
}
else{
    echo "please login again to continue";
}
?>