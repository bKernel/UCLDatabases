
<?php
$host = 'auctionmanagement34.mysql.database.azure.com';
$username = 'auction34@auctionmanagement34';
$password = 'JackSparrow34';
$db_name = 'dbauction34';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

printf("Table created\n");


//Close the connection
mysqli_close($conn);
?>