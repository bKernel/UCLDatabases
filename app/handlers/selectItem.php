<?php
session_start();
$_SESSION['imagesrc'] = $_POST['imagesrc'];
$_SESSION['imagesrc2'] = $_POST['imagesrc2'];
$_SESSION['itemid'] = $_POST['itemid'];
$_SESSION['itemName'] = $_POST['itemName'];
$_SESSION['itemDescription'] = $_POST['itemDescription'];
$_SESSION['itemCondition'] = $_POST['itemCondition'];
$_SESSION['itemCategory'] = $_POST['itemCategory'];
$_SESSION['currentPrice'] = $_POST['currentPrice'];
$_SESSION['reservePrice'] = $_POST['reservePrice'];
$_SESSION['endTime'] = $_POST['endTime'];
$_SESSION['endDate'] = $_POST['endDate'];


header("location: ../views/sellerSingleItem.php");