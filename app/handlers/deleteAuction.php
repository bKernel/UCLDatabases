<?php

$connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
$query = "DELETE FROM auctiondb.auction WHERE itemid={$_POST['id']}";
$result = mysqli_query($connection, $query) or die('Error making saveToDatabase query');
mysqli_close($connection);

if($_POST['userType']==='admin') {
    header("location: ../views/manageAuctions.php");
} else {
    header("location: ../views/myProductsForSale.php");
}