<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-reboot.css" media="screen" />

    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.js"></script>

    <link rel="stylesheet" type="text/css" href="/UCLDatabases/css/myProductsForSale.css" media="screen" />
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php include("includes/navbar.php"); ?>
<?php require 'loadProducts.php'; ?>



<div class="container">

    <div class="row">

        <div class="col-lg-12">

            <br>
                <div class="col-xs-12">
                    <h3 style="float: left"> Your Products for Sale</h3>
                    <a href="enlist.php">
                        <button class="btn" id="newProduct">Enlist new Product</button>
                    </a>
                </div>

            <div class="container col-xs-12" style="padding: 0">

                <?php
                $connection = mysqli_connect('localhost','root','root','AuctionManagement') or die('Error connecting to MySQL server.');
                $query = "SELECT itemName, itemDescription, itemCondition, itemCategory, currentPrice FROM Auction WHERE id = {$_SESSION['id']}";
                $result = mysqli_query($connection, $query) or die('Error making Database query');
                echo "<div id=\"listings\" class=\"row\">";
                while($row = mysqli_fetch_array($result)){
                    echo "
                    <div class=\"col-lg-4 col-md-6 mb-4\">
                        <div class=\"card h-100\">
                            <a href=\"#\"><img class=\"card-img-top\" src=\"/UCLDatabases/views/resources/{$_SESSION['id']}/{$row['itemName']}/image1.png\" alt=\"\"></a>
                            <div class=\"card-body\">
                                <h4 class=\"card-title\">
                                    <a href=\"#\">{$row['itemName']}</a>
                                </h4>
                                <h5>£{$row['currentPrice']}</h5>
                                <h6>{$row['itemCategory']}</h6>
                                <p class=\"card-text\">{$row['itemDescription']}</p>
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

</body>
</html>