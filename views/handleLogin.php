<?php
include("database.php");
session_start();

$mysqli = mysqli_connect('localhost','root','root','AuctionManagement') or die('Error connecting to MySQL server.');

$username = $mysqli->escape_string($_POST['username']);
$result = $mysqli->query("SELECT * FROM User WHERE username='$username'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: directory.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ($_POST['password']===$user['pw']){

        $_SESSION['username'] = $user['username'];
        $_SESSION['firstName'] = $user['firstName'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['active'] = $user['active'];

        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: directory.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        echo $_SESSION['message'];
//        header("location: error.php");
    }
}
?>