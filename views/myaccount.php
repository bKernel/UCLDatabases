<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-reboot.css" media="screen" />

    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.js"></script>

    <link rel="stylesheet" type="text/css" href="/UCLDatabases/css/myaccount.css" media="screen" />
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php include("includes/navbar.php"); ?>

    <div class="row main">
        <div class = "col-sm-3"></div>
        <div class = "col-sm-6">

            <div class="panel-heading">
                <h1 align="left">Your Account Details</h1>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="username" class="cols-sm-2 control-label">Username:</label>
                </div>

                <div class="col-sm-6">
                    <label type="text" id="username" ><?php echo $_SESSION['username']?></label>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <label for="firstName" class="cols-sm-2 control-label">First Name:</label>
                </div>

                <div class="col-sm-6">
                    <label type="text" id="firstName" ><?php echo $_SESSION['firstName']?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="surname" class="cols-sm-2 control-label">Surname:</label>
                </div>

                <div class="col-sm-6">
                    <label type="text" id="surname" ><?php echo $_SESSION['surname']?></label>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <label for="email" class="cols-sm-2 control-label">Your Email:</label>
                </div>

                <div class="col-sm-6">
                    <label type="text" id="email" ><?php echo $_SESSION['email']?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="phoneNo" class="cols-sm-2 control-label">Phone Number:</label>
                </div>

                <div class="col-sm-6">
                    <label type="text" id="phone" ><?php echo $_SESSION['phone']?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="address1" class="cols-sm-2 control-label">Address Line 1:</label>
                </div>

                <div class="col-sm-6">
                    <label type="text" id="address1" ><?php echo $_SESSION['address1']?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="address2" class="cols-sm-2 control-label">Address Line 2:</label>
                </div>

                <div class="col-sm-6">
                    <label type="text" id="address2" ><?php echo $_SESSION['address2']?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="postcode" class="cols-sm-2 control-label">Post Code:</label>
                </div>

                <div class="col-sm-6">
                    <label type="text" id="postcode" ><?php echo $_SESSION['postcode']?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="city" class="cols-sm-2 control-label">Your City/Town:</label>
                </div>

                <div class="col-sm-6">
                    <label type="text" id="city" ><?php echo $_SESSION['city']?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="country" class="cols-sm-2 control-label">Your Country:</label>
                </div>

                <div class="col-sm-6">
                    <label type="text" id="country" ><?php echo $_SESSION['country']?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="DoB" class="cols-sm-2 control-label">Date of Birth:</label>
                </div>

                <div class="col-sm-6">
                    <label type="date" id="DoB" ><?php echo $_SESSION['DoB']?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="userType" class="cols-sm-2 control-label">User Type</label>
                </div>

                <div class="col-sm-6">
                    <label type="text" id="userType" ><?php echo $_SESSION['userType']?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="password" class="cols-sm-2 control-label">Password:</label>
                </div>

                <div class="col-sm-6">
                    <label type="text" id="password" ><?php echo $_SESSION['pw']?></label>
                </div>
            </div>

            <form action="editUser.php">
                <button>Edit</button>
            </form>

        </div>
        <div class = "col-sm-3"></div>
    </div>
</body>
</html>