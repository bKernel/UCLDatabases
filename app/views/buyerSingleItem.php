<?php include("../includes/navbar.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-reboot.css" media="screen" />

    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.js"></script>
    <script type="text/javascript" src="http://yourjavascript.com/88131111995/jquery.countdown.js"></script>

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
                    $bidquery = "SELECT * FROM Bid WHERE auctionid = '{$_SESSION['selectedItemBuyer']}' ORDER BY bidamount DESC LIMIT 5;";
                    $bidresult = $result = mysqli_query($connection, $bidquery) or die('Error making Database query');
                    $result = mysqli_query($connection, $query) or die('Error making Database query');
                    date_default_timezone_set('Europe/London');


                    $row = mysqli_fetch_array($result);
                    $_SESSION['selectedItemNameBuyer'] = $row['itemName'];
                    $endDate = $row['endDate'];
                    $endTime = $row['endTime'];
                    $dateTime = $endDate . " " . $endTime;

                    $minPrice = $row['currentPrice'] + 1;

                    $update = "UPDATE auction SET traffic = ".$traffic." + 1 WHERE itemid = '{$_SESSION['selectedItemBuyer']}'";
                    $updateresult= mysqli_query($connection, $update) or die('Error making Database update');


                    echo "
                    
                    <div class=\"details col-md-12\">
                    <h3 class='product-title'>{$row['itemName']}</h3>
                    <img src=\"/UCLDatabases/app/resources/{$row['id']}/{$row['itemName']}/image1.png\"/>
                    <h4>Item Category: {$row['itemCategory']}</h4>
                    <h4>Item Condition: {$row['itemCondition']}</h4>
                   
                    <p>Time Remaining: </p>
                    <p id=\"demo\"></p>
        
                        <script>
                        // Set the date we're counting down to
                        var countDownDate = new Date('$dateTime').getTime();
                        
                        // Update the count down every 1 second
                        var x = setInterval(function() {
                        
                            // Get todays date and time
                            var now = new Date().getTime();
                            
                            // Find the distance between now an the count down date
                            var distance = countDownDate - now;
                            
                            // Time calculations for days, hours, minutes and seconds
                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                            
                            // Output the result in an element with id=\"demo\"
                            document.getElementById(\"demo\").innerHTML = days + \"d \" + hours + \"h \"
                            + minutes + \"m \" + seconds + \"s \";
                            
                            // If the count down is over, write some text 
                            if (distance < 0) {
                                clearInterval(x);
                                document.getElementById(\"demo\").innerHTML = \"EXPIRED\";
                                document.getElementById('end').submit();
                            }
                        }, 1000);
                        </script>
                        
                            <h4 class='price'>Current Bid: <span>£{$row['currentPrice']}</span></h4>
                            
                            <h6> Bid History: </h6>
                    
                    ";
                    while($bidrow = mysqli_fetch_array($bidresult)){

                        echo " 
                        
                        <ul> Amount: £{$bidrow['bidamount']}
                        Time: {$bidrow['time']}
                        Date:   {$bidrow['date']}
                        </ul>
                        ";

                    }
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
                                    <input type='hidden' name='itemName' value='{$_SESSION['selectedItemNameBuyer']}'>
                                    <input type='hidden' name='bidderid' value='{$_SESSION['id']}'>
                                    <input type='hidden' name='auctionid' value='{$row['itemid']}'>
                                    <button class='btn btn-default add-to-cart'>Make Bid</button>
                                </form>
                                <form class=\"form-inline\" action='../handlers/watchlist.php' method='post'>
                                <input type='hidden' name='userid' value='{$_SESSION['id']}'>
                                <input type='hidden' name='itemid' value='{$row['itemid']}'>
                                <button class='btn btn-default add-to-cart'>Watch this item</button>
                               </form>
                            "; ?>
                            </div>





                        </div>
                        <div class="container-fluid">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <hr>
                            <?php

                            echo "<h3>Item Description</h3>";
                            echo "{$row['itemDescription']}";

                            ?>
                            <br>
                            <br>

                            <div class="row">
                            <div class="col-sm-6">
                                <label for="username" class="cols-sm-2 control-label"><b>Average Seller Rating:</b></label>
                            </div>

                            <?php $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
                            $sellerquery = "SELECT AVG(ratingfrombuyer), COUNT(ratingfrombuyer) FROM results WHERE sellerid = '{$row['id']}'";
                            $result = mysqli_query($connection, $sellerquery) or die('Error making Database query');
                            $row = mysqli_fetch_array($result);

                            ?>

                            <div class="col-sm-6">
                                <label type="text" id="username" ><b><?php echo round($row[0],3) . ' / 5 (out of ' . $row[1] . ' ratings)'?></b></label>
                            </div>
                            </div>

                            <?php




                            echo"
                            
                             <form name='end' id= 'end' method='post' action='../handlers/endAuction.php'>
                                <input type='hidden' name='auctionid' value='{$row['itemid']}'>
                                <input type='hidden' name='itemName' value='{$row['itemName']}'>
                                <input type='hidden' name='sellerid' value='{$row['id']}'>
                                <input type='hidden' name='reserve' value='{$row['reservePrice']}'>
                                

                            </form>
                            
                            
                            "
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