<?php
session_start();

function isDataValid()
{
    $errorMessage = null;
    if (!isset($_POST['amount']) or trim($_POST['amount']) == '')
        $errorMessage = 'You must enter a bid!';
    else if ($_POST['amount'] <= $_POST['currentPrice'])
        $errorMessage = 'Your bid must be higher than the current price';
    if ($errorMessage !== null)
    {
        echo <<<EOM
          <p>Error: $errorMessage</p>
EOM;
        return False;
    }
    return True;
}


function getBid()
{

    date_default_timezone_set('Europe/London');
    $bid = array();
    $bid['auctionid'] = $_POST['auctionid'];
    $bid['bidamount'] = $_POST['amount'];
    $bid['bidderid'] = $_POST['bidderid'];
    $bid['time'] =  date("H:i:s");
    $bid['date'] = date("Y-m-d");

    return $bid;
}

function updateCurrentPrice()
{

    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Price.');
    $newPrice = $_POST['amount'];
    $auctionid = $_POST['auctionid'];
    $sql = "UPDATE auctiondb.auction

    SET
    currentPrice = '$newPrice'
    
    WHERE itemid='$auctionid'";

    mysqli_query($connection, $sql);
    mysqli_close($connection);
}



function saveNewBid($bid)
{
    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Bid.');
    $query = "INSERT INTO auctiondb.Bid (auctionid, bidamount, time, date, bidderid)".
        "VALUES ('${bid['auctionid']}','${bid['bidamount']}','${bid['time']}','${bid['date']}','${bid['bidderid']}')";
    $result = mysqli_query($connection, $query) or die('Error making saveToDatabase query');
    mysqli_close($connection);
}

if(isDataValid()){
    $newBid = getBid();
    updateCurrentPrice();
    saveNewBid($newBid);
    //require '../views/buyerSingleItem.php';
   // header('Location:../views/buyerSingleItem.php');
    header('Location:../views/buyerSingleItem.php');
}




?>;