<?php include("../includes/navbar.php");

?>

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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myOrders</title>

</head>
<body>
<div class="container">

    <h2><b>My Orders</b></h2>
    <hr>
    <div class="panel-group">
        <div class="panel panel-default">
            <h3 class="panel-heading panel-primary">My bidding items</h3>
            <div class="panel-body">
                <?php

                $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server Price.');
                $query1 = "SELECT auction.itemName, bid.auctionid FROM auction, bid WHERE auction.itemid= bid.auctionid AND bid.bidderid = '{$_SESSION['id']}';";
                $result1 = mysqli_query($connection, $query1) or die('Error making Database query');
                $i=1;
                while($row=mysqli_fetch_array($result1)){
                    echo '<p>item'.$i.': '.$row['itemName'].'<br> ItemId: '.$row['auctionid'].'</p>';
                    $i++;
                }
                ?>
            </div>
        </div>
        <hr>
        <div class="panel panel-default">
            <h3 class="panel-heading panel-primary">My winning items</h3>
            <div class="panel-body">
                <?php
                $query2 = "SELECT results.buyerid, results.auctionid, auction.itemName FROM results,auction WHERE auction.itemid= results.auctionid AND results.buyerid = '{$_SESSION['id']}';";
                $result2 = mysqli_query($connection, $query2) or die('Error making Database query');
                $i=1;
                while($row=mysqli_fetch_array($result2)){
                    echo '<p>item'.$i.': '.$row['itemName'].'<br> ItemId: '.$row['auctionid'].'</p>';
                    $i++;
                }
                ?>
            </div>
        </div>
        <hr>
        <div class="panel panel-default">
            <h3 class="panel-heading panel-primary">My watchlist</h3>
            <div class="panel-body">
                <?php
                $query = "SELECT watchlist.auctionId, watchlist.userId, auction.itemName FROM watchlist, auction WHERE auction.itemid= watchlist.auctionid AND watchlist.userId = '{$_SESSION['id']}';";
                $result = mysqli_query($connection, $query) or die('Error making Database query');
                $i=1;
                while($row=mysqli_fetch_array($result)){
                    echo '<p>item'.$i.': '.$row['itemName'].'<br> ItemId: '.$row['auctionId'].'</p>';
                    $i++;
                }
                ?>
            </div>
        </div>
        <hr>
        <div class="panel panel-default">
            <h3 class="panel-heading panel-primary">My feedback</h3>
            <div class="panel-body">
                <!--give feedback-->
                <h4> give feedback </h4>
                <form action='../handlers/buyerfeedback.php' method='post'>
                    <label>My winning items</label>
                    <select name="winItem">
                        <?php
                        $query = "SELECT results.buyerid, results.winningbid, results.auctionid, auction.itemName FROM results,auction WHERE auction.itemid= results.auctionid AND results.buyerid = '{$_SESSION['id']}'";
                        $result = mysqli_query($connection, $query) or die('Error making Database query');
                        while($row=mysqli_fetch_array($result)){
                            echo '<option>'.$row['itemName'].'. id:'.$row['auctionid'].'</option>';
                        }
                        ?>
                    </select>
                    <label>my feedback</label>
                    <input name='feedback' type="text">
                    <label>rating (5 is the max)</label>
                    <select name="rating">
                        <option>1</option>;
                        <option>2</option>;
                        <option>3</option>;
                        <option>4</option>;
                        <option>5</option>;
                    </select>
                    <input type='submit' value='submit'>
                </form>
                <!-- all the feedback that i have made-->
                <h4> my past feedback to others </h4>
                <?php
                $query = "SELECT buyerid, auctionid,feedbackfrombuyer,ratingfrombuyer,itemName FROM results, auction WHERE auction.itemid=results.auctionid AND results.buyerid = '{$_SESSION['id']}';";
                $result = mysqli_query($connection, $query) or die('Error making Database query');
                $i=1;
                while($row=mysqli_fetch_array($result)){
                    echo '<p>item'.$i.': '.$row['itemName'].'<br> ItemId: '.$row['auctionid'].'<br> feedback: '.$row['feedbackfrombuyer'].'<br> rating: '.$row['ratingfrombuyer'].'</p>';
                    $i++;
                }

                $query = "SELECT buyerid, ratingfromseller FROM results WHERE buyerid = '{$_SESSION['id']}';";
                $result = mysqli_query($connection, $query) or die('Error making Database query');
                $num_result = mysqli_num_rows($result);
                $ratings = array();
                if($num_result !=0){
                    for ($i=0; $i< $num_result; $i++){
                        $row=mysqli_fetch_array($result);
                        $ratings[$i] = $row['ratingfromseller'];
                    }
                    $sum = 0;
                    foreach ($ratings as $currentrating)
                        $sum = $sum + $currentrating;
                    $avg= $sum/$num_result;
                    echo "<p>My feedback point:".$avg."</p>";
                }
                else{
                    echo "<p>My feedback point: NULL </p>";
                }
                ?>

            </div>
        </div>
    </div>

</div>




</body>
</html>
