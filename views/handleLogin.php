<?php
include("database.php");
session_start();

$mysqli = mysqli_connect('localhost','root','root','AuctionManagement') or die('Error connecting to MySQL server.');

$username = $mysqli->escape_string($_POST['username']);
$result = $mysqli->query("SELECT * FROM User WHERE username='$username'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: login.php");
} else { // User exists
    $user = $result->fetch_assoc();

    if ($_POST['password']===$user['pw']){

        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['firstName'] = $user['firstName'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['address1'] = $user['address1'];
        $_SESSION['address2'] = $user['address2'];
        $_SESSION['postcode'] = $user['postcode'];
        $_SESSION['city'] = $user['city'];
        $_SESSION['country'] = $user['country'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['DoB'] = $user['DoB'];
        $_SESSION['userType'] = $user['userType'];
        $_SESSION['pw'] = $user['pw'];
        $_SESSION['active'] = $user['active'];

        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        if($_SESSION['userType'] === 'buyer'){
            require 'buyerHome.php';
        } elseif ($_SESSION['userType'] === 'seller'){
            require 'myProductsForSale.php';
        } elseif ($_SESSION['userType'] === 'admin'){
            require 'adminHome.php';
        }
    } else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
    }
}
?>