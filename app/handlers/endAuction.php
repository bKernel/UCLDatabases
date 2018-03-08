<?php
session_start();
$_SESSION['closedauction'] = $_POST['auctionid'];
$_SESSION['wonitem'] = $_POST['itemName'];
$_SESSION['reservePrice'] = $_POST['reserve'];


function updateAuctionStatus()
{
    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Price.');
    $auctionid= $_POST['auctionid'];
    $sql = "UPDATE auctiondb.auction
    SET
    status = 'closed'
    WHERE itemid='$auctionid'";
    mysqli_query($connection, $sql);
    mysqli_close($connection);
}

function getAuctionDetails()
{

    $details = array();
    $details['auctionid'] = $_POST['auctionid'];
    $details['sellerid'] = $_POST['sellerid'];
    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Price.');
    $query = "SELECT * FROM Bid WHERE auctionid = '{$_SESSION['closedauction']}' ORDER BY bidamount LIMIT 1;";
    $result = mysqli_query($connection, $query) or die('Error making Database query');
    $row = mysqli_fetch_array($result);
    $details['buyerid'] = $row['bidderid'];
    $details['winningbid'] = $row['bidamount'];
    $_SESSION['winner'] = $row['bidderid'];
    $_SESSION['seller'] = $_POST['sellerid'];
    if($row['bidamount']>= $_SESSION['reservePrice']){
        $_SESSION['reserveMet'] = 'Yes';
    }
    else{
        $_SESSION['reserveMet'] = 'No';
    }

    return $details;
}


function notifyWinner($details)
{


    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Price.');
    $query = "SELECT * FROM User WHERE id = '{$_SESSION['winner']}';";
    $result = mysqli_query($connection, $query) or die('Error making Database query');
    $row = mysqli_fetch_array($result);
    $to      =  'sibi.chandar.17@ucl.ac.uk';
    $subject = 'You won an Auction!';
    $message = "Congrats, you have just won '{$_SESSION['wonitem']}'. You paid ${details['winningbid']} ";
    $headers = 'From: webmaster@example.com';

    mail($to, $subject, $message, $headers);

}

function notifySellerSuccessful($details)
{


    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Price.');
    $query = "SELECT * FROM User WHERE id = '{$_SESSION['seller']}';";
    $result = mysqli_query($connection, $query) or die('Error making Database query');
    $row = mysqli_fetch_array($result);
    $to      =  'sibi.chandar@gmail.com';
    $subject = 'Your Auction is Over!';
    $message = "Congrats, you have just sold '{$_SESSION['wonitem']}'. The top bid was ${details['winningbid']} ";
    $headers = 'From: webmaster@example.com';

    mail($to, $subject, $message, $headers);

}

function notifySellerUnsuccessful($details)
{


    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Price.');
    $query = "SELECT * FROM User WHERE id = '{$_SESSION['seller']}';";
    $result = mysqli_query($connection, $query) or die('Error making Database query');
    $row = mysqli_fetch_array($result);
    $to      =  'sibi.chandar@gmail.com';
    $subject = 'Your Auction is Over!';
    $message = "Sorry, you have not sold '{$_SESSION['wonitem']}'. The reserve price was not met. ";
    $headers = 'From: webmaster@example.com';

    mail($to, $subject, $message, $headers);

}

function saveNewResult($details)
{
    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Bid.');
    $query = "INSERT INTO auctiondb.results (auctionid, winningbid, buyerid, sellerid)".
        "VALUES ('${details['auctionid']}','${details['winningbid']}','${details['buyerid']}','${details['sellerid']}')";
    $result = mysqli_query($connection, $query) or die('Error making saveToDatabase query');
    mysqli_close($connection);
}

updateAuctionStatus();
$newResults=getAuctionDetails();
if($_SESSION['reserveMet'] == 'Yes'){
notifywinner($newResults);
notifySellerSuccessful($newResults);
}
else{
    notifySellerUnsuccessful($newResults);}
saveNewResult($newResults);
require '../views/buyerHome.php';

?>;