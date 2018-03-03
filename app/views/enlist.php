<?php include("../includes/navbar.php"); ?>
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
        <h1>Create Auction</h1></div>
    <div class="row main">
        <div class = "col-sm-4"></div>
        <div class = "col-sm-4">
            <div class="main-login main-center">
                <form class="" method="post" action="../handlers/addNewAuction.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="itemName" class="cols-sm-2 control-label">Item Name</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="itemName" id="itemName"  placeholder="Item Name" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endDate" class="cols-sm-2 control-label">Auction End Date</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="date" class="form-control" name="endDate" id="endDate"  placeholder="Auction End Date" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endTime" class="cols-sm-2 control-label">Auction End Time</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="time" class="form-control" name="endTime" id="endTime"  placeholder="Auction End Time" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reservePrice" class="cols-sm-2 control-label">Reserve Price</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="number" class="form-control" name="reservePrice" id="reservePrice"  placeholder="Reserve Price" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startingPrice" class="cols-sm-2 control-label">Starting Price</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="number" class="form-control" name="startingPrice" id="startingPrice"  placeholder="Starting Price" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="itemDescription" class="cols-sm-2 control-label">Item Description</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="itemDescription" id="itemDescription"  placeholder="Item Description" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="itemCondition" class="cols-sm-2 control-label">Item Condition</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <select name="itemCondition">
                                    <option value="New">New</option>
                                    <option value="Used">Used</option>
                                    <option value="Refurbished">Refurbished</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="itemCategory" class="cols-sm-2 control-label">Item Category</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <select name="itemCategory">
                                    <option value="Fashion">Fashion</option>
                                    <option value="Home & Garden">Home & Garden</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Sports & Hobbies">Sports & Hobbies</option>
                                    <option value="Art">Art</option>
                                    <option value="Health & Beauty">Health & Beauty</option>
                                    <option value="Motors">Motors</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="itemPicture1" class="cols-sm-2 control-label">Item Picture</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="file" accept=".png, .jpeg, .jpg" class="form-control" name="itemPicture1" id="itemPicture1" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="itemPicture2" class="cols-sm-2 control-label">Item Picture</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="file" accept=".png, .jpeg, .jpg" class="form-control" name="itemPicture2" id="itemPicture2" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <input id="show-btn" type="submit" name="submit" value="Submit"/>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class = "col-sm-4"></div>
</div>

</body>
</html>