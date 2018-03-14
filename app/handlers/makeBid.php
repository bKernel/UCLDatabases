<?php
use PHPMailer\PHPMailer\PHPMailer;

//Load composer's autoloader
require '../vendor/autoload.php';

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
    $bid['itemName'] = $_POST['itemName'];

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


function Watchlist($bid){

    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Bid.');
    $query = "SELECT * FROM watchlist WHERE auctionId = '{$bid['auctionid']}';";
    $result = mysqli_query($connection, $query) or die('Error reading from database query');
    while($row = mysqli_fetch_array($result)) {
    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Price.');
    $userQuery = "SELECT * FROM user WHERE id = '{$row['userId']}';";
    $userResult = mysqli_query($connection,$userQuery);
    $userrow = mysqli_fetch_array($userResult);


        $to = $userrow['email'];
        $name = $userrow['firstName'] . " " . $row['surname'];
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "databases.group.34@gmail.com";
        $mail->Password = "JackSparrow34";
        $mail->setFrom('databases.group.34@gmail.com', 'Group 34');
        $mail->addReplyTo('databases.group.34@gmail.com', 'Group 34');
        $mail->addAddress($to,$name);
        $mail->Subject = 'Someone has bid on an item you are watching!';
        $mail->Body = 'Hi ' . $name . '! Someone has bid on an item you are currently watching: ' . $bid['itemName'] . '. The current price is '. $bid['bidamount']  .' GBP.';

        $mail->send();


    }
}








if(isDataValid()){
    $newBid = getBid();
    updateCurrentPrice();
    saveNewBid($newBid);
    Watchlist($newBid);
    //require '../views/buyerSingleItem.php';
   // header('Location:../views/buyerSingleItem.php');
    header('Location:../views/buyerSingleItem.php');
}




?>;