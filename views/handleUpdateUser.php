<?php

session_start();

include("database.php");

function getUser()
{
    $user = array();
    $user['username'] = $_POST['username'];
    $user['firstName'] = $_POST['firstName'];
    $user['surname'] = $_POST['surname'];
    $user['address1'] = $_POST['address1'];
    $user['address2'] = $_POST['address2'];
    $user['postcode'] = $_POST['postcode'];
    $user['city'] = $_POST['city'];
    $user['country'] = $_POST['country'];
    $user['email'] = $_POST['email'];
    $user['phone'] = $_POST['phone'];
    $user['DoB'] = $_POST['DoB'];
    $user['password'] = $_POST['password'];
    $user['confirm'] = $_POST['confirm'];

    return $user;
}

function setNewSession($user)
{
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
    $_SESSION['pw'] = $user['pw'];
}

function printUser($user)
{
    echo "<p>Username: ${user['username']}</p>";
    echo "<p>First Name: ${user['firstName']}</p>";
    echo "<p>Surname: ${user['surname']}</p>";
    echo "<p>Address Line 1: ${user['address1']}</p>";
    echo "<p>Address Line 2: ${user['address2']}</p>";
    echo "<p>Postcode: ${user['postcode']}</p>";
    echo "<p>City: ${user['city']}</p>";
    echo "<p>Country: ${user['country']}</p>";
    echo "<p>Email: ${user['email']}</p>";
    echo "<p>Phone: ${user['phone']}</p>";
    echo "<p>Password: ${user['password']}</p>";
}

function saveToDatabase($user)
{

    $username= $user['username'];
    $firstName= $user['firstName'];
    $surname= $user['surname'];
    $address1=$user['address1'];
    $address2=$user['address2'];
    $postcode=$user['postcode'];
    $city=$user['city'];
    $country=$user['country'];
    $email=$user['email'];
    $phone=$user['phone'];
    $pw=$user['pw'];

    $connection = mysqli_connect('localhost','root','root','AuctionManagement') or die('Error connecting to MySQL server.');
    $session = $_SESSION['id'];
    $sql = "UPDATE User

    SET
    username = '$username',
    firstName = '$firstName',
    surname = '$surname',
    address1 = '$address1',
    address2 = '$address2',
    postcode = '$postcode',
    city = '$city',
    country = '$country',
    email = '$email',
    phone = '$phone',
    pw = '$pw'
    
    WHERE id='$session'";

    mysqli_query($connection, $sql);
    mysqli_close($connection);
}

$update = getUser();

if($update['password'] === $update['confirm']) {
    saveToDatabase($update);
    setNewSession($update);
    printUser($update);
    require 'myaccount.php';
}