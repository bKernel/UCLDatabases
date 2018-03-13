<?php


session_start();


    $userid = $_POST['userid'];
    $auctionid = $_POST['itemid'];
    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Bid.');
    $query = "INSERT INTO auctiondb.watchlist VALUES ('$userid','$auctionid')";
    mysqli_query($connection, $query) or die('Error making saveToDatabase query');
    mysqli_close($connection);

header('Location:../views/buyerSingleItem.php');


?>
