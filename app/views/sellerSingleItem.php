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

<?php $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
$query = "SELECT username FROM user WHERE (user.id = (SELECT bidderid FROM bid WHERE bidamount = ({$_SESSION['currentPrice']} AND auctionid = {$_SESSION['itemid']})) OR id = (SELECT buyerid FROM results WHERE winningbid = {$_SESSION['currentPrice']}))";
$result = mysqli_query($connection, $query) or die('Error making Database query');
$row = mysqli_fetch_array($result);

$ratingquery = "SELECT AVG(ratingfromseller) FROM results WHERE buyerid = (SELECT bidderid FROM bid WHERE bidamount = ({$_SESSION['currentPrice']} AND auctionid = {$_SESSION['itemid']})) OR id = (SELECT buyerid FROM results WHERE winningbid = {$_SESSION['currentPrice']})";
$ratingresult = mysqli_query($connection, $ratingquery) or die('Error making Database query');
$ratingrow = mysqli_fetch_array($ratingresult);


?>


<div class="container">
    <div class="card">
        <div class="container-fluid">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <img src="<?php session_start(); echo $_SESSION['imagesrc']; ?>"/>
                </div>
                <div class="details col-md-6">
                    <?php
                    session_start();
                    $endDate = date('d/m/Y', strtotime($_SESSION['endDate']));
                    echo "<h3 class='product-title'>{$_SESSION['itemName']}</h3>";
                    echo "<h4>Category: {$_SESSION['itemCategory']}</h4>";
                    echo "<h4>Condition: {$_SESSION['itemCondition']}</h4>";
                    echo "<h4>Current Bid: <span>£{$_SESSION['currentPrice']}</span></h4>";
                    if ($row[0] !== "" AND $ratingrow[0] !== "") {
                    echo "<h4>(bid made by <span>{$row[0]}</span>, average rating:  <span>{$ratingrow[0]}</span></h4>";}
                    echo "<h4>Reserve Price: <span>£{$_SESSION['reservePrice']}</span></h4>";
                    echo "<h4>End Time: <span>{$_SESSION['endTime']}</span></h4>";
                    echo "<h4>End Date: <span>{$endDate}</span></h4>";
                    $_SESSION['rateThisBuyer'] = $row[0];
                    ?>

                    <form action="editSellerItem.php">
                        <button>Edit</button>
                    </form>

                    <?php if ($row[0] !== "" AND $ratingrow[0] !== "") {
                        echo "<form action='sellerFeedback.php'>
                        <button>Rate buyer</button>
                    </form>";
                    } ?>

                </div>
            </div>
        </div>
        <div class="container-fluid">
            <br>
            <br>
            <hr>
            <?php
            session_start();
            echo "<h3>Item Description</h3>";
            echo "{$_SESSION['itemDescription']}";
            ?>
        </div>
        <a href="progressReport.php">
            <button class="btn" id="auctionReport">Send Report</button>
        </a>
    </div>
</div>



</body>
</html>