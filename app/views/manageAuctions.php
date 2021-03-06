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
                <h3 style="float: left">Manage Auctions</h3>
            </div>
            <form class=\"form-inline\" action='../handlers/sendOutbidInfo.php' method='post'>
                <button style="float:right" class='btn btn-default add-to-cart', type="submit">Email Watchlist</button>
            </form>
            <div class="container col-xs-12" style="padding: 0">

                <?php
                $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
                $query = "SELECT * FROM auction";
                $result = mysqli_query($connection, $query) or die('Error making Database query');

                echo "<div id=\"listings\" class=\"row\">";
                while($row = mysqli_fetch_array($result)){
                    $description = substr($row['itemDescription'], 0, 60);
                    echo "
                    <div class=\"col-lg-6 col-md-6 mb-6\">
                        <div class=\"card\">
                            <div class='row'>
                                <div class='imageBox col-md-6'>                 
                                   <img class=\"card-img-top\" style=\"max-height:100%\" src=\"../resources/{$row['id']}/{$row['itemName']}/image1.png\" alt=\"\"></a>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class=\"card-body\">
                                        <h4 class=\"card-title\">
                                            <a href=\"#\">{$row['itemName']}</a>
                                        </h4>
                                        <h5>£{$row['currentPrice']}</h5>
                                        <h6>{$row['itemCategory']}</h6>
                                        <p class=\"card-text\">$description</p>
                                        <form action='../handlers/selectItem.php' method='post'>
                                            <input type='hidden' name='imagesrc' value='../resources/{$row['id']}/{$row['itemName']}/image1.png'>                                        
                                            <input type='hidden' name='imagesrc2' value='../resources/{$row['id']}/{$row['itemName']}/image2.png'>
                                            <input type='hidden' name='itemid' value='{$row['itemid']}'>
                                            <input type='hidden' name='itemName' value='{$row['itemName']}'>
                                            <input type='hidden' name='itemDescription' value='{$row['itemDescription']}'>
                                            <input type='hidden' name='itemCondition' value='{$row['itemCondition']}'>
                                            <input type='hidden' name='itemCategory' value='{$row['itemCategory']}'>    
                                            <input type='hidden' name='currentPrice' value='{$row['currentPrice']}'> 
                                            <input type='hidden' name='reservePrice' value='{$row['reservePrice']}'>                                      
                                            <input type='hidden' name='endTime' value='{$row['endTime']}'>
                                            <input type='hidden' name='endDate' value='{$row['endDate']}'>
                                            <input type='submit' value='View'></button>
                                        </form>
                                        <form method='post' action='../handlers/deleteAuction.php'>
                                            <input type='hidden' name='id' value='{$row['itemid']}'>
                                            <input type='hidden' name='userType' value='admin'>
                                            <input type='submit' value='Delete'></button>
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