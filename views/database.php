<?php

$connectstr_dbname = 'AuctionManagement';

$connectstr_dbhost = 'localhost';

$connectstr_dbusername = 'root';

$connectstr_dbpassword = 'root';



foreach ($_SERVER as $key => $value) {

    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {

        continue;

    }



    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);

    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);

    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);

}



$link = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword,$connectstr_dbname);



if (!$link) {

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