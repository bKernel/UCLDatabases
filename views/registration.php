<?php include 'database.php'; ?>
<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-reboot.css" media="screen" />

    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.js"></script>

    <link rel="stylesheet" type="text/css" href="/UCLDatabases/css/registration.css" media="screen" />

    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>
<div class="container">
    <div class="panel-heading">
        <h1>Registration</h1></div>
    <div class="row main">
        <div class = "col-sm-4"></div>
        <div class = "col-sm-4">
            <div class="main-login main-center">
                <form class="" method="post" action="addNewUser.php">

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Username</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstName" class="cols-sm-2 control-label">First Name</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="firstName" id="firstName"  placeholder="Enter your First Name" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="surname" class="cols-sm-2 control-label">Surname</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="surname" id="surname"  placeholder="Enter your Surname" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Your Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phoneNo" class="cols-sm-2 control-label">Phone Number</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="phone" id="phone"  placeholder="Enter your Phone Number" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address1" class="cols-sm-2 control-label">Address Line 1</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="address1" id="address1"  placeholder="Enter the first line of your address" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address2" class="cols-sm-2 control-label">Address Line 2</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="address2" id="address2"  placeholder="Enter the second line of your address" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="postcode" class="cols-sm-2 control-label">Post Code</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="postcode" id="postcode"  placeholder="Enter the second line of your address" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="city" class="cols-sm-2 control-label">Your City/Town</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="city" id="city"  placeholder="Enter the second line of your address" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="country" class="cols-sm-2 control-label">Your Country</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="country" id="country"  placeholder="Enter the second line of your address" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="DoB" class="cols-sm-2 control-label">Date of Birth</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="date" class="form-control" name="DoB" id="DoB"  placeholder="Enter the second line of your address" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <input id="show-btn" type="submit" name="submit" value="Register"/>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class = "col-sm-4"></div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>


</body>
</html>