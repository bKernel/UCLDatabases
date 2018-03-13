<?php

$connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
$query = "DELETE FROM auctiondb.user WHERE id={$_POST['id']}";
$result = mysqli_query($connection, $query) or die('Error making saveToDatabase query');
$query2 = "DELETE FROM auctiondb.auction WHERE id={$_POST['id']}";
$result2 = mysqli_query($connection, $query2) or die('Error making saveToDatabase query');
mysqli_close($connection);

if($_SESSION['userType']==='admin') {
    header("location: ../views/manageUsers.php");
} else {
    header("location: ../views/login.php");
}