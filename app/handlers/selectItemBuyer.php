<?php
session_start();
$_SESSION['selectedItemBuyer'] = $_POST['item'];


header("location: ../views/buyerSingleItem.php");

?>;