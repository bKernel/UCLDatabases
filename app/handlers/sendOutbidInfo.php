<?php
use PHPMailer\PHPMailer\PHPMailer;

//Load composer's autoloader
require '../vendor/autoload.php';

function sendWatchlist($userid)
{
    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Price.');
    $query = "SELECT * FROM User WHERE id = '$userid';";
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
    $mail->Subject = 'Sorry to inform you that you are outbid. Why not come back and make another bid again?';
    $mail->Body = 'Hi ' . $name . '! We are sorry to inform you that you were outbid on the auctionmanagement website. Would you like to bid it again?';

    $mail->send();

}

function checkuser($userid){
  $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Price.');
  $query = "SELECT auctionId FROM watchlist WHERE userId = '$userid';";
  $result = mysqli_query($connection, $query) or die('Error making Database query');
  while($row=mysql_fetch_row($result)){
    $bidder_query = "SELECT bid.bidderid FROM bid, auction,watchlist WHERE bid.bidamount = auction.currentPrice AND auction.itemid = $row['auctionId']; ";
    $bidder_results = mysqli_query($connection,$bidder_query)or die('Error making Database query');
    $bidder_row = mysqli_fetch_array($bidder_results);
    $currentwinner = $bidder_row[0];
    if ($currentwinner != $userid){
      sendWatchlist($userid);
    }
  }

}

date_default_timezone_set('UK');
ignore_user_abort();//run backend
set_time_limit(0);//cancel the limit of the script runtime
$interval = 60*5;//run every period of time
do{
  $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Price.');
  $query = "SELECT DISTINCT id FROM User;";
  $result = mysqli_query($connection, $query) or die('Error making Database query');
  while($row=mysqli_fetch_array($result)){
  checkuser($row['id']);
  }
sleep($interval);
}while(true);
?>