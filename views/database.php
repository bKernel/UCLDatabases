<?php
$connectstr_dbname = 'auctiondb';
$connectstr_dbhost = 'auctionmanagement34.mysql.database.azure.com';
$connectstr_dbusername = 'auction34@auctionmanagement34';
$connectstr_dbpassword = 'JackSparrow34';
$link = new mysqli($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword,$connectstr_dbname);
if ($link->connect_error) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
   echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
   echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
   exit;
}
//
//
//echo "<p>Success: A proper connection to MySQL was made!</p>";
//
//echo "<p>The database is $connectstr_dbname</p>";
//
//echo "<p>connectstr_dbhost = $connectstr_dbhost</p>";
//
//echo "<p>Host information: " . mysqli_get_host_info($link) . "</p>";
//
//echo "<p>connectstr_dbusername: $connectstr_dbusername</p>";
?>
