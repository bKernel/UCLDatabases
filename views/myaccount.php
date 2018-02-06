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
<?php include("includes/navbar.html"); ?>


<div class="col-md-12 profile-dashboard">
    <div class="row">
        <div class="col-md-7 dashboard-form calender">
            <form class="form-horizontal">
                <div class="bg-white pinside40 mb30">
                    <!-- Form Name -->
                    <div class="add_listing_info">
                        <br>
                        <br>
                        <br>


                    </div>
                    <!-- Text input-->
                    <div class="add_listing_info">
                        <h3>Personal Information</h3>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="firstname">First Name<span class="required"></span></label>
                            <div class="col-md-8">
                                <input id="firstname" name="firstname" type="text" placeholder="First Name" class="form-control input-md" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="lastname">Last Name </label>
                        <div class="col-md-8">
                            <input id="lastname" name="lastname" type="text" placeholder="Last Name" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="username">Username<span class="required"></span></label>
                        <div class="col-md-8">
                            <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email">Email Address<span class="required"></span></label>
                        <div class="col-md-8">
                            <input id="email" name="email" type="text" placeholder="Email Address" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="phone">Phone Number<span class="required"></span></label>
                        <div class="col-md-8">
                            <input id="phone" name="phone" type="text" placeholder="Phone Number" class="form-control input-md" required="">
                        </div>
                    </div>

                    <h3 class="form-title">Address</h3>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="housenumber">Flat/House Number</label>
                        <div class="col-md-8">
                            <input id="housenumber" name="housenumber" type="text" placeholder="Flat/House Number" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="line1">Address Line 1</label>
                        <div class="col-md-8">
                            <input id="line1" name="line1" type="text" placeholder="Address Line 1" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="line2">Address Line 2</label>
                        <div class="col-md-8">
                            <input id="line2" name="line2" type="text" placeholder="Address Line 2" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="city">City</label>
                        <div class="col-md-8">
                            <input id="city" name="city" type="text" placeholder="City" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="postcode">Post Code</label>
                        <div class="col-md-8">
                            <input id="postcode" name="postcode" type="text" placeholder="Post Code" class="form-control input-md" required="">
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submit"></label>
                        <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-5 dashboard-form">
            <form class="form-horizontal">
                <div class="bg-white pinside30">
                    <!-- Form Name -->
                    <br>
                    <br>
                    <br>
                    <h3 class="form-title">Change Password</h3>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="oldpassword">Old Password</label>
                        <div class="col-md-8">
                            <input id="oldpassword" name="oldpassword" type="text" placeholder="Old Password" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="newpassword">New Password</label>
                        <div class="col-md-8">
                            <input id="newpassword" name="newpassword" type="text" placeholder="New Password" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ConfirmPassword">Confirm Password</label>
                        <div class="col-md-8">
                            <input id="ConfirmPassword" name="ConfirmPassword" type="text" placeholder="Confirm Password" class="form-control input-md" required="">
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submit"></label>
                        <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-primary btn-lg">Save Password</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



</body>
</html>