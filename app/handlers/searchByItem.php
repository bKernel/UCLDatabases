<?php
session_start();
$_SESSION['search'] = $_POST['search'];


header("location: ../views/buyerHome.php");

?>;