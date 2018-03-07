<?php include("../includes/navbar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../bootstrap-4-2/css/bootstrap.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../../bootstrap-4-2/css/bootstrap-grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../../bootstrap-4-2/css/bootstrap-reboot.css" media="screen" />

    <script type="text/javascript" src="../../bootstrap-4-2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="../../bootstrap-4-2/js/bootstrap.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../css/directory.css" media="screen" />
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
                    <input type="hidden" name="category" value="ANY">
                    <button class="btn btn-link" >All</button>
                </form>
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

            <div class="dropdown">

                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sort By
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <form action='../handlers/chooseSort.php' method='post'>
                        <input type="hidden" name="sort" value="itemid">
                        <button class="btn btn-link">Oldest</button>
                    </form>
                    <form action='../handlers/chooseSort.php' method='post'>
                        <input type="hidden" name="sort" value="itemid DESC">
                        <button class="btn btn-link">Newest</button>
                    </form>
                    <form action='../handlers/chooseSort.php' method='post'>
                        <input type="hidden" name="sort" value="endDate">
                        <button class="btn btn-link">Ending Soonest</button>
                    </form>
                    <form action='../handlers/chooseSort.php' method='post'>
                        <input type="hidden" name="sort" value="endDate DESC">
                        <button class="btn btn-link">Ending Latest</button>
                    </form>
                    <form action='../handlers/chooseSort.php' method='post'>
                        <input type="hidden" name="sort" value="itemName">
                        <button class="btn btn-link">Alphabetical</button>
                    </form>
                    <form action='../handlers/chooseSort.php' method='post'>
                        <input type="hidden" name="sort" value="currentPrice">
                        <button class="btn btn-link">Lowest Price</button>
                    </form>
                    <form action='../handlers/chooseSort.php' method='post'>
                        <input type="hidden" name="sort" value="currentPrice DESC">
                        <button class="btn btn-link">Highest Price</button>
                    </form>
                </div>
            </div>

            <?php

            $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');

            if ($_SESSION['selectedCategory'] === 'ANY'){
                $query = "SELECT * FROM Auction ORDER BY {$_SESSION['sort']};";
            }
            else {
                $query = "SELECT * FROM Auction WHERE itemCategory = '{$_SESSION['selectedCategory']}' ORDER BY {$_SESSION['sort']};";
            }
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
                                                <button class='btn btn-link' style='font-size: 24px;'>{$row['itemName']}</button>
                                            </form> 
                                          
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