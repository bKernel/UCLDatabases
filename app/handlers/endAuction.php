<?php
use PHPMailer\PHPMailer\PHPMailer;


//Load composer's autoloader
require '../vendor/autoload.php';


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
    $to = $row['email'];
    $name = $row['firstName'] . " " . $row['surname'];
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "databases.group.34@gmail.com";
    $mail->Password = "JackSparrow34";
    $mail->setFrom('databases.group.34@gmail.com', 'Group 34');
    $mail->addReplyTo('databases.group.34@gmail.com', 'Group 34');
    $mail->addAddress($to,$name);
    $mail->Subject = 'You have won an auction!';
    $mail->Body = 'Hi ' . $name . '! You won the auction for: '. $_SESSION['wonitem'] . '. Your winning bid was '. $details['winningbid'] .'.';

    $mail->send();

}

function notifySellerSuccessful($details)
{
    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Price.');
    $query = "SELECT * FROM User WHERE id = '{$_SESSION['seller']}';";
    $result = mysqli_query($connection, $query) or die('Error making Database query');
    $row = mysqli_fetch_array($result);
    $to = $row['email'];
    $name = $row['firstName'] . " " . $row['surname'];
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "databases.group.34@gmail.com";
    $mail->Password = "JackSparrow34";
    $mail->setFrom('databases.group.34@gmail.com', 'Group 34');
    $mail->addReplyTo('databases.group.34@gmail.com', 'Group 34');
    $mail->addAddress($to,$name);
    $mail->Subject = 'Your auction is over!';
    $mail->Body = 'Hi ' . $name . '! Congrats! You sold your '. $_SESSION['wonitem'] . '. Your winning bid was '. $details['winningbid'] .'.';

    $mail->send();

}

function notifySellerUnsuccessful()
{
    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Price.');
    $query = "SELECT * FROM User WHERE id = '{$_SESSION['seller']}';";
    $result = mysqli_query($connection, $query) or die('Error making Database query');
    $row = mysqli_fetch_array($result);
    $to = $row['email'];
    $name = $row['firstName'] . " " . $row['surname'];
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "databases.group.34@gmail.com";
    $mail->Password = "JackSparrow34";
    $mail->setFrom('databases.group.34@gmail.com', 'Group 34');
    $mail->addReplyTo('databases.group.34@gmail.com', 'Group 34');
    $mail->addAddress($to,$name);
    $mail->Subject = 'Your auction is over!';
    $mail->Body = 'Hi ' . $name . '! You did not sell your '. $_SESSION['wonitem'] . '. Your reserve price of '. $_SESSION['reservePrice'] .' was not met.';

    $mail->send();

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
notifyWinner($newResults);
notifySellerSuccessful($newResults);
}
else{
    notifySellerUnsuccessful();}
saveNewResult($newResults);
//require '../views/buyerHome.php';
header('Location:../views/buyerHome.php');
?>;