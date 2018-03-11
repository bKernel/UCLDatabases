<?php

include '../includes/navbar.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-reboot.css" media="screen" />

    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.js"></script>

    <link rel="stylesheet" type="text/css" href="/UCLDatabases/css/manageUsers.css" media="screen" />
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<div class="container">

    <div class="row">

        <div class="col-lg-12">

            <br>
            <div class="col-xs-12">
                <h3 style="float: left">Manage Users</h3>
            </div>

<div class="container col-xs-12" style="padding: 0">

    <?php
    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
    $query = "SELECT * FROM user WHERE userType = 'buyer' || userType = 'seller'";
    $result = mysqli_query($connection, $query) or die('Error making Database query');
    echo "<div id=\"listings\" class=\"row\">";
    while($row = mysqli_fetch_array($result)){
        echo "
                    <div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-6\">
                        <div class=\"card\">
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class=\"card-body\">
                                        <p class='card-text'>Username: {$row['username']}</p>
                                        <p class='card-text'>First Name: {$row['firstName']}</p>
                                        <p class='card-text'>Surname: {$row['surname']}</p>
                                        <p class='card-text'>Address Line 1: {$row['address1']}</p>
                                        <p class='card-text'>Address Line 2: {$row['address2']}</p>
                                        <p class='card-text'>Postcode: {$row['postcode']}</p>
                                        <p class='card-text'>City: {$row['city']}</p>
                                        <p class='card-text'>Country: {$row['country']}</p>
                                        <p class='card-text'>Email: {$row['email']}</p>
                                        <p class='card-text'>Phone: {$row['phone']}</p>
                                        <p class='card-text'>Date of Birth: {$row['DoB']}</p>
                                        <p class='card-text'>User Rating: {$row['userRating']}</p>
                                        <p class='card-text'>User Type: {$row['userType']}</p>
                                        <br>
                                        <form action='../handlers/deleteUser.php' method='post'>
                                            <input type='hidden' name='id' value='{$row['id']}'>                                                                            
                                            <input id='submit' type='submit' value='Delete User'>                                      
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
    }
    echo "</div>";
    ?>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>