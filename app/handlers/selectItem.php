<?php
session_start();
$_SESSION['imagesrc'] = $_POST['imagesrc'];
$_SESSION['itemid'] = $_POST['itemid'];
$_SESSION['itemName'] = $_POST['itemName'];
$_SESSION['itemDescription'] = $_POST['itemDescription'];
$_SESSION['itemCondition'] = $_POST['itemCondition'];
$_SESSION['itemCategory'] = $_POST['itemCategory'];
$_SESSION['currentPrice'] = $_POST['currentPrice'];

header("location: ../views/sellerSingleItem.php");