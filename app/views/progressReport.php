<?php
/**
 * Created by PhpStorm.
 * User: BerkeK
 * Date: 11/03/2018
 * Time: 10:04
 */


use PHPMailer\PHPMailer\PHPMailer;

session_start();

require_once '../../app/vendor/autoload.php';

$errors = [];

//if(isset($_POST['email'])) {

$connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
$query = "SELECT COUNT(auctionid) FROM bid WHERE auctionid = {$_SESSION['itemid']}";
$result = mysqli_query($connection, $query) or die('Error making Database query');
$row = mysqli_fetch_array($result);

$trafficquery = "SELECT traffic FROM auction WHERE itemid = {$_SESSION['itemid']}";
$trafficresult = mysqli_query($connection, $trafficquery) or die('Error making Database query');
$trafficrow = mysqli_fetch_array($trafficresult);

if ($row['totalbids'] == 0 AND $trafficrow['traffic'] == 0) {
    $fields = [
        'email'=> $_SESSION['email'], 'username' =>  $_SESSION['username'], 'userType' => $_SESSION['userType'], 'auctionid' => 'no bids yet', 'traffic' => 'No traffic yet'
    ];
}
else if ($row['totalbids'] == 0 AND $trafficrow['traffic'] != 0) {
    $fields = [
        'email'=> $_SESSION['email'], 'username' =>  $_SESSION['username'], 'userType' => $_SESSION['userType'], 'auctionid' => 'no bids yet', 'traffic' => $trafficrow['traffic']
    ];

}

else if ($row['totalbids'] != 0 AND $trafficrow['traffic'] == 0) {
    $fields = [
        'email'=> $_SESSION['email'], 'username' =>  $_SESSION['username'], 'userType' => $_SESSION['userType'], 'auctionid' => $row['totalbids'], 'traffic' => 'No traffic yet'
    ];

}

else {
    $fields = [
        'email'=> $_SESSION['email'], 'username' =>  $_SESSION['username'], 'userType' => $_SESSION['userType'], 'auctionid' => $row['totalbids'], 'traffic' => $trafficrow['traffic']
    ];
}

    foreach($fields as $field => $data) {
        if(empty($data)) {
            $errors[] = 'The ' . $field . ' field is required';
        }
    }

    if(empty($errors)) {


        require_once '../../app/vendor/autoload.php';


        $m = new PHPMailer;

        $m->isSMTP();
        $m->SMTPAuth= true;
        $m->SMTPDebug = 2;

        $m->Host = 'smtp.gmail.com';
        $m->Username = 'NoreplyDBProject@gmail.com';
        $m->Password = 'TestAcc147';
        $m->SMTPSecure = 'ssl';
        $m->Port = 465;

        $m->From = 'NoreplyDBproject@gmail.com';
        $m->FromName = 'UCL DB Project';
        $m->addReplyTo('NoreplyDBproject@gmail.com', 'UCLdbProject');
        $m->addAddress($fields['email'], $fields['username']);
        //$m->addAttachment('/Users/BerkeK/phpmailer/test.pdf', 'test.pdf');
        $m->isHTML(true);

        $m->Subject = 'Your Auction Progress Report';
        $m->Body = '<p>Dear ' . $fields['username'] . ',</p> <p>Thanks for using our auction website! Our mission is to be a platform where you can buy and sell any item for fair prices. You are registered as a ' . $fields['userType'] . ' and here is your auction progress report: </p> <p>Item: ' . $_SESSION['itemName'] .'</p> <p>Category: ' . $_SESSION['itemCategory'] . '</p> <p>Condition: ' . $_SESSION['itemCondition'] . '</p> <p>Current bid: ' . $_SESSION['currentPrice'] .' </p> <p>Reserve Price: ' . $_SESSION['reservePrice'] . '</p> <p>End date: ' . date('d/m/Y', strtotime($_SESSION['endDate'])) . '</p> <p>End time: ' . $_SESSION['endTime'] . '</p> <p>Number of bids: ' . $fields['auctionid'] .' </p> <p>Number of views/traffic: ' . $fields['traffic'] .' </p> <p>Thank you very much!</p> <p>Regards,</p> <p>UCL DB Project Team</p>';
        $m->AltBody = 'Something went wrong. Try again.';

        if($m->send()) {
            echo '<script> window.location.replace("sellerSingleItem.php"); </script>';
            //header('Location: ../thank-you.html');
        } else {
            echo 'An error occurred';
        }
    }

    else {

        echo '<pre>', print_r($errors), '</pre>';
        die();

    }
//}
//else {
//    $errors[] = 'Something went wrong';
//}

$_SESSION['errors'] = $errors;
$_SESSION['fields'] = $fields;

header('Location: sellerSingleItem.php');