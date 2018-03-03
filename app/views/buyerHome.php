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
                <button class="list-group-item">Fashion</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Home & Garden">
                    <button class="list-group-item">Home & Garden</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Electronics">
                    <button class="list-group-item">Electronics</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Sports & Hobbies">
                    <button class="list-group-item">Sports & Hobbies</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Art">
                    <button class="list-group-item">Art</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Health & Beauty">
                    <button class="list-group-item">Health & Beauty</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Motors">
                    <button class="list-group-item">Motors</button>
                </form>
                <form action='../handlers/selectCategory.php' method='post'>
                    <input type="hidden" name="category" value="Other">
                    <button class="list-group-item">Other</button>
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
                    echo "  <div class=\"col-lg-4 col-md-6 mb-4\">
                    <div class=\"card h-100\">
                        <a href=\"#\"><img class=\"card-img-top\" src=\"/UCLDatabases/app/resources/{$row['id']}/{$row['itemName']}/image1.png\" alt=\"\"></a>
                        <div class=\"card-body\">
                            <h4 class=\"card-title\">
                                <a href=\"#\">{$row['itemName']}</a>
                            </h4>
                            <h5>Current Price: {$row['currentPrice']}</h5>
                            <h6>End Time: {$row['endTime']}</h6>
                            <h6>End Date: {$row['endDate']}</h6>
                            <p class=\"card-text\">{$row['itemDescription']}</p>
                        </div>
                        
                    </div>
                </div> ";

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