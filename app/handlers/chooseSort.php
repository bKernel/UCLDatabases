<?php
session_start();
$_SESSION['sort'] = $_POST['sort'];


header("location: ../views/buyerHome.php");

?>;