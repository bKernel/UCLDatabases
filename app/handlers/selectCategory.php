<?php
session_start();
$_SESSION['selectedCategory'] = $_POST['category'];


header("location: ../views/selectedCategory.php");

?>;