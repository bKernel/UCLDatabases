<?php include("../includes/navbar.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-reboot.css" media="screen" />

    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/UCLDatabases/css/singleItem.css" media="screen" />
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>



<div class="container">
    <div class="card">
        <div class="container-fluid">
            <div class="wrapper row">




                    <?php
                    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
                    $query = "SELECT * FROM Auction WHERE itemid = '{$_SESSION['selectedItemBuyer']}'";


                    $result = mysqli_query($connection, $query) or die('Error making Database query');


                    $row = mysqli_fetch_array($result);

                    $minPrice = $row['currentPrice'] + 1;

                    echo "
                    
                    <div class=\"details col-md-6\">
                    <h3 class='product-title'>{$row['itemName']}</h3>
                    <img src=\"/UCLDatabases/app/resources/{$row['id']}/{$row['itemName']}/image1.png\"/>
                    <h4>Item Category: {$row['itemCategory']}</h4>
                    <h4>Item Condition: {$row['itemCondition']}</h4>
                    <h4 class='price'>Current Bid: <span>£{$row['currentPrice']}</span></h4>
                    
                    ";
                    ?>
                    <?php echo"
                    <div id='bid-column' class='col-lg-12'>
                        <div class='form-group'>
                        
                            <div id='box-column' class='col-sm-5'>
                                 <form action='../handlers/makeBid.php' method='post'>
                                <div class='input-group'>
                                    <input type='number' class='form-control' name='amount' id='amount' min='$minPrice' placeholder='$minPrice'/>
                                </div>
                            </div>
                            <div id='btn-column' class='col-sm-5'>
                                    <input type='hidden' name='currentPrice' value='$minPrice'>
                                    <input type='hidden' name='bidderid' value='{$_SESSION['id']}'>
                                    <input type='hidden' name='auctionid' value='{$row['itemid']}'>
                                    <button class='btn btn-default add-to-cart'>Make Bid</button>
                                </form>
                            "; ?>
                            </div>


                        </div>
                        <div class="container-fluid">
                            <br>
                            <br>
                            <hr>
                            <?php

                            echo "<h3>Item Description</h3>";
                            echo "{$row['itemDescription']}";
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>



</body>
</html>