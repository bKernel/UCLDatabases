<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-reboot.css" media="screen" />

    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.js"></script>
    <title>Title</title>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"> <b> Welcome <?php echo $_SESSION['firstName']?></b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php if($_SESSION['userType'] === 'seller'){?>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/UCLDatabases/views/sellerHome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/UCLDatabases/views/myaccount.php">My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/UCLDatabases/views/myProductsForSale.php">My Products For Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/UCLDatabases/views/enlist.php">Create new Auction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/UCLDatabases/views/logout.php">Logout</a>
                    </li>
                </ul>
            </div>

        <?php }elseif ($_SESSION['userType'] === 'buyer'){ ?>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/UCLDatabases/views/buyerHome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/UCLDatabases/views/myaccount.php">My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/UCLDatabases/views/myOrders.php">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/UCLDatabases/views/logout.php">Logout</a>
                    </li>
                </ul>
            </div>

        <?php } ?>

    </div>
</nav>
</body>
</html>