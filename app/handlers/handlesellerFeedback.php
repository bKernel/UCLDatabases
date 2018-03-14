<?php

session_start();

    $_SESSION['checked'] = $_POST['ratingradio'];
    $_SESSION['feedback'] = $_POST['feedbacktext'];



    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
    $update = "UPDATE auctiondb.results 
    SET 
    ratingfromseller = '{$_SESSION['checked']}', 
    feedbackfromseller = '{$_SESSION['feedback']}'   
    
    WHERE sellerid ='{$_SESSION['id']}' 
    AND auctionid = '{$_SESSION['itemid']}'";
    mysqli_query($connection, $update) or die('Error making Database update');
    mysqli_close($connection);

    header('Location:../views/sellerSingleItem.php');

;?>

