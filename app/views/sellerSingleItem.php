<?php include("includes/navbar.php"); ?>
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
<?php
include("includes/navbar.php");
?>


<div class="container">
    <div class="card">
        <div class="container-fluid">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <img src="<?php
                    session_start();
                    echo $_SESSION['imagesrc'];
                    ?>"/>
                </div>
                <div class="details col-md-6">
                    <?php
                    session_start();
                    echo "<h3 class='product-title'>{$_SESSION['itemName']}</h3>";
                    echo "<h4>Item Category: {$_SESSION['itemCategory']}</h4>";
                    echo "<h4>Item Condition: {$_SESSION['itemCondition']}</h4>";
                    echo "<h4 class='price'>Current Bid: <span>£{$_SESSION['currentPrice']}</span></h4>";
                    ?>
<!--                    <h3 class="product-title">--><?php //session_start(); echo $_SESSION['itemName']?><!--</h3>-->

                    <div id="bid-column" class="col-lg-12">
                        <div class="form-group">
                            <div id="box-column" class="col-sm-5">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="Bid" id="Bid"  placeholder="Enter your bid"/>
                                </div>
                            </div>
                            <div id="btn-column" class="col-sm-5">
                                <button class="add-to-cart btn btn-default" type="button">Make Bid</button>
                            </div>
                        </div>
                    </div>

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
    </div>
</div>



</body>
</html>