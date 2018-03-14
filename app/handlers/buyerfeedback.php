<?php
session_start();
$userid = $_SESSION['id'];
$selectedItem = $_POST['winItem'];
$info_array =explode('. id:', $selectedItem);
$auctionid=$info_array[1];
$feedback = $_POST['feedback'];
$rating = $_POST['rating'];
$connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Bid.');
$query = "UPDATE results SET feedbackfrombuyer='$feedback' WHERE auctionid ='$auctionid'";
$query2 = "UPDATE results SET ratingfrombuyer='$rating' WHERE auctionid ='$auctionid'";
mysqli_query($connection, $query) or die('Error making saveToDatabase query');
mysqli_query($connection, $query2)or die('Error making saveToDatabase query2');
mysqli_close($connection);

header('Location:../views/myOrders.php');

?>
