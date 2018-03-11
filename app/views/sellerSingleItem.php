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
                    echo "<h4>Reserve Price: <span>£{$_SESSION['reservePrice']}</span></h4>";
                    echo "<h4>End Time: <span>{$_SESSION['endTime']}</span></h4>";
                    echo "<h4>End Date: <span>{$endDate}</span></h4>";
                    ?>

                    <form action="editSellerItem.php">
                        <button>Edit</button>
                    </form>

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