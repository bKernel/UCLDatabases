<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-reboot.css" media="screen" />

    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.js"></script>
    <script type="text/javascript">
        alert("Hello! I am an alert box!!");
    </script>


    <link rel="stylesheet" type="text/css" href="/UCLDatabases/css/enlist.css" media="screen" />
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php include("includes/navbar.html"); ?>
<div class="container">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-lock"></span> <h1>Add New Item</h1></div>
    <div class="row main">
        <div class = "col-sm-4"></div>
        <div class = "col-sm-4">
            <div class="main-login main-center">
                <form class="" method="post" action="#">

                    <div class="form-group">
                        <label for="title" class="cols-sm-2 control-label">Item Descriptive Title</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="title" id="title"  placeholder="Enter Item Title"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="cols-sm-2 control-label">Detailed Description</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                <textarea rows="6" type="text" class="form-control" name="description" id="description" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startingprice" class="cols-sm-2 control-label">Starting Price</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="startingprice" id="startingprice"  placeholder="Enter Starting Price"/>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="reserve" class="cols-sm-2 control-label">Reserve Price</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="reserve" id="reserve"  placeholder="Enter Reserve Price"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reserve" class="cols-sm-2 control-label">Auction End Date</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="date" class="form-control" name="reserve" id="reserve"  placeholder="Enter Reserve Price"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reserve" class="cols-sm-2 control-label">Auction End Time</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="time" class="form-control" name="reserve" id="reserve"  placeholder="Enter Reserve Price"/>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="image" class="cols-sm-2 control-label">Upload Image</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="file" class="form-control" name="image" id="image"  placeholder="Upload Image"/>
                            </div>
                        </div>
                    </div>




            </div>




                    <div class="form-group ">
                        <a href="http://deepak646.blogspot.in" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">Add Item</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class = "col-sm-4"></div>
</div>



</body>
</html>