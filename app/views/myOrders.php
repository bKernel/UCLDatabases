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
    <title>myOrders</title>

</head>
<body>
  <div class="container">

      <h2>My Orders</h2>
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

         <div class="panel panel-default">
               <h3 class="panel-heading panel-primary">My winning items</h3>
               <div class="panel-body">
                 <?php
                 $query2 = "SELECT results.buyerid, results.auctionid, auction.itemName FROM results,auction WHERE auction.itemid= results.auctionid AND results.buyerid = '{$_SESSION['id']}';";
                 $result2 = mysqli_query($connection, $query2) or die('Error making Database query');
                 while($row=mysqli_fetch_array($result2)){
                           $i=1;
                           echo '<p>item'.$i.': '.$row['itemName'].'<br> ItemId: '.$row['auctionid'].'</p>';
                           $i++;
                 }
                  ?>
               </div>
         </div>

         <div class="panel panel-default">
               <h3 class="panel-heading panel-primary">My watchlist</h3>
               <div class="panel-body">
                 <?php
                 $query = "SELECT watchlist.auctionId, watchlist.userId, auction.itemName FROM watchlist, auction WHERE auction.itemid= watchlist.auctionid AND watchlist.userId = '{$_SESSION['id']}';";
                 $result = mysqli_query($connection, $query) or die('Error making Database query');
                 while($row=mysqli_fetch_array($result)){
                           $i=1;
                           echo '<p>item'.$i.': '.$row['itemName'].'<br> ItemId: '.$row['auctionId'].'</p>';
                           $i++;
                 }
                  ?>
                </div>
         </div>

         <div class="panel panel-default">
               <h3 class="panel-heading panel-primary">My feedback</h3>
               <div class="panel-body">
                 <h4> give feedback </h4>
                 <form action='../handlers/buyerfeedback.php' method='post'>
                  <label>itemid</label>
                  <input name='itemID' type="text">
                  <label>my feedback</label>
                  <input name='feedback' type="text">
                  <label>rating(0-5)</label>
                  <input name='rating' type="text">
                  <input type='submit' value='submit'>
                 </form>

                 <h4> my past feedback </h4>
                 <?php
                 $query = "SELECT buyerid, auctionid,feedbackfrombuyer,ratingfrombuyer,itemName FROM results, auction WHERE auction.itemid=results.auctionid AND results.buyerid = '{$_SESSION['id']}';";
                 $result = mysqli_query($connection, $query) or die('Error making Database query');
                 while($row=mysqli_fetch_array($result)){
                           $i=1;
                           echo '<p>item'.$i.': '.$row['itemName'].'<br> ItemId: '.$row['auctionid'].'<br> feedback: '.$row['feedbackfrombuyer'].'<br> rating: '.$row['ratingfrombuyer'].'</p>';
                           $i++;
                 }
                 $query = "SELECT feedbackPoint FROM User WHERE User.id = '{$_SESSION['id']}';";
                 $result = mysqli_query($connection, $query) or die('Error making Database query');
                 $row=mysqli_fetch_array($result);
                 echo "<p>My feedback point:".$row['feedbackPoint']."</p>";
                  ?>

               </div>
         </div>
         </div>

  </div>




</body>
</html>
