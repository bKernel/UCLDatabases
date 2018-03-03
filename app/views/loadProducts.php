<?php
$connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
$query = "SELECT itemid, itemName, itemDescription, itemCondition, itemCategory, currentPrice FROM Auction WHERE id = {$_SESSION['id']}";
$result = mysqli_query($connection, $query) or die('Error making saveToDatabase query');
mysqli_close($connection);