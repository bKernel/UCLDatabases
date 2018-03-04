<?php include("../includes/navbar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-reboot.css" media="screen" />

    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.js"></script>

    <link rel="stylesheet" type="text/css" href="/UCLDatabases/css/directory.css" media="screen" />
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Team34</h1>
            <div class="list-group">
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Fashion">
                <button class="btn btn-link" >Fashion</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Home & Garden">
                    <button class="btn btn-link">Home & Garden</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Electronics">
                    <button class="btn btn-link">Electronics</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Sports & Hobbies">
                    <button class="btn btn-link">Sports & Hobbies</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Art">
                    <button class="btn btn-link">Art</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Health & Beauty">
                    <button class="btn btn-link">Health & Beauty</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Motors">
                    <button class="btn btn-link">Motors</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Other">
                    <button class="btn btn-link">Other</button>
                </form>

            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


                <?php
                $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
                $query = "SELECT * FROM Auction";
                $result = mysqli_query($connection, $query) or die('Error making Database query');
                echo "<div id=\"listings\" class=\"row\">";
                while($row = mysqli_fetch_array($result)){
                    echo "
                    <div class=\"col-lg-6 col-md-6 mb-6\">
                        <div class=\"card\">
                            <div class='row'>
                                <div class='imageBox col-md-6'>                 
                                   <img class=\"card-img-top\" style=\"max-height:100%\" src=\"/UCLDatabases/app/resources/{$row['id']}/{$row['itemName']}/image1.png\" alt=\"\"></a>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class=\"card-body\">
                                        <h4 class=\"card-title\">
                                            <form action='../handlers/selectItemBuyer.php' method='post'>
                                                <input type='hidden' name='item' value='{$row['itemid']}'>
                                                <button class='btn btn-link'>{$row['itemName']}</button>
                                            </form> 
                                            <a href=\"#\">{$row['itemName']}</a>
                                        </h4>
                                        <h5>£{$row['currentPrice']}</h5>
                                        <h6>End Time: {$row['endTime']}</h6>
                                        <h6>End Date: {$row['endDate']}</h6>
                                        <h6>{$row['itemCategory']}</h6>
                                        <p class=\"card-text\">{$row['itemDescription']}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                }

                ?>





            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
</body>
</html>