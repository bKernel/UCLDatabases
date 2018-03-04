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


<div class="row main">
    <div class = "col-sm-3"></div>
    <div class = "col-sm-6">

        <div class="panel-heading">
            <h1 align="left">Edit Your Auction Details</h1>
        </div>

        <form action="../handlers/handleUpdateItem.php" method="post">
            <div class="row">
                <div class="col-sm-6">
                    <label for="itemName" class="cols-sm-2 control-label">Item Name:</label>
                </div>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="itemName" id="itemName" value="<?php echo $_SESSION['itemName']?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="itemDescription" class="cols-sm-2 control-label">Item Description:</label>
                </div>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="itemDescription" id="itemDescription" value="<?php echo $_SESSION['itemDescription']?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="itemCondition" class="cols-sm-2 control-label">Item Condition:</label>
                </div>
                <div class="cols-sm-6">
                    <div class="input-group">
                        <select name="itemCondition" id="itemCondition">
                            <option selected="selected"><?php echo $_SESSION['itemCondition']?></option>
                            <option value="New">New</option>
                            <option value="Used">Used</option>
                            <option value="Refurbished">Refurbished</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="itemCategory" class="cols-sm-2 control-label">Item Category:</label>
                </div>
                <div class="col-sm-6">
                    <div class="input-group">
                        <select name="itemCategory" id="itemCategory">
                            <option selected="selected"><?php echo $_SESSION['itemCategory']?></option>
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

            <div class="row">
                <div class="col-sm-6">
                    <label for="endTime" class="cols-sm-2 control-label">End Time:</label>
                </div>

                <div class="col-sm-6">
                    <input type="time" class="form-control" name="endTime" id="endTime" value="<?php echo date('H:i', strtotime($_SESSION['endTime']))?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="endDate" class="cols-sm-2 control-label">End Date:</label>
                </div>

                <div class="col-sm-6">
                    <input type="date" class="form-control" name="endDate" id="endDate" value="<?php echo date('Y-m-d', strtotime($_SESSION['endDate'])) ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="reservePrice" class="cols-sm-2 control-label">Reserve Price:</label>
                </div>

                <div class="col-sm-6">
                    <input type="number" class="form-control" name="reservePrice" id="reservePrice" value="<?php echo $_SESSION['reservePrice']?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="itemPicture1" class="cols-sm-2 control-label">Item Picture 1: <br>Choose to overwrite below:</label>
                </div>

                <div class="col-sm-6">
                    <div class='imageBox col-sm-12'>
                        <?php echo "
                        <img class=\"card-img-top\" style=\"max-height:100%\" src=\"/UCLDatabases/app/resources/{$_SESSION['id']}/{$_SESSION['itemName']}/image1.png\" alt=\"\"></a>
                        "?>
                    </div>
                    <br>
                        <input type="file" accept=".png, .jpeg, .jpg" class="form-control" name="itemPicture1" id="itemPicture1" value="<?php $_SESSION['imagesrc'] ?>"/>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="itemPicture2" class="cols-sm-2 control-label">Item Picture 2: <br>Choose to overwrite below:</label>
                </div>

                <div class="col-sm-6">
                    <div class='imageBox col-sm-12'>
                        <?php echo "
                        <img class=\"card-img-top\" style=\"max-height:100%\" src=\"/UCLDatabases/app/resources/{$_SESSION['id']}/{$_SESSION['itemName']}/image2.png\" alt=\"\"></a>
                        "?>
                    </div>
                    <br>
                    <input type="file" accept=".png, .jpeg, .jpg" class="form-control" name="itemPicture1" id="itemPicture1" value="<?php $_SESSION['imagesrc'] ?>"/>
                </div>
            </div>

            <button>Submit</button>
        </form>
    </div>
    <div class = "col-sm-3"></div>
</div>
</body>
</html>