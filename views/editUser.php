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
            <h1 align="left">Edit Your Account Details</h1>
        </div>

        <form action="handleUpdateUser.php" method="post">
            <div class="row">
                <div class="col-sm-6">
                    <label for="username" class="cols-sm-2 control-label">Username:</label>
                </div>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $_SESSION['username']?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="firstName" class="cols-sm-2 control-label">First Name:</label>
                </div>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $_SESSION['firstName']?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="surname" class="cols-sm-2 control-label">Surname:</label>
                </div>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="surname" id="surname" value="<?php echo $_SESSION['surname']?>" required>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <label for="email" class="cols-sm-2 control-label">Your Email:</label>
                </div>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email']?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="phoneNo" class="cols-sm-2 control-label">Phone Number:</label>
                </div>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $_SESSION['phone']?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="address1" class="cols-sm-2 control-label">Address Line 1:</label>
                </div>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address1" id="address1" value="<?php echo $_SESSION['address1']?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="address2" class="cols-sm-2 control-label">Address Line 2:</label>
                </div>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address2" id="address2" value="<?php echo $_SESSION['address2']?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="postcode" class="cols-sm-2 control-label">Post Code:</label>
                </div>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="postcode" id="postcode" value="<?php echo $_SESSION['postcode']?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="city" class="cols-sm-2 control-label">Your City/Town:</label>
                </div>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="city" id="city" value="<?php echo $_SESSION['city']?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="country" class="cols-sm-2 control-label">Your Country:</label>
                </div>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="country" id="country" value="<?php echo $_SESSION['country']?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="DoB" class="cols-sm-2 control-label">Date of Birth:</label>
                </div>

                <div class="col-sm-6">
                    <label for="DoB" class="cols-sm-2 control-label">For security reasons you cannot change your DoB</label>
                </div>
            </div>

            <div class="row">
                This will overwrite your old password
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <label for="password" class="cols-sm-2 control-label">Password:</label>
                </div>

                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="confirm" class="cols-sm-2 control-label">Confirm Password:</label>
                </div>

                <div class="col-sm-6">
                    <input type="password" class="form-control" name="confirm" id="confirm" required>
                </div>
            </div>

            <button>Submit</button>
        </form>
    </div>
    <div class = "col-sm-3"></div>
</div>
</body>
</html>