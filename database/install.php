<?php
/**
 * Created by PhpStorm.
 * User: BerkeK
 * Date: 13/02/2018
 * Time: 21:05
 */


/**
 * Open a connection via PDO to create a
 * new database and table with structure.
 *
 */


require_once "config.php";

// Create connection
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = file_get_contents("data/init.sql");
if ($conn->multi_query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
?>




