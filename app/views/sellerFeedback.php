<?php include("../includes/navbar.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-reboot.css" media="screen" />

    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.js"></script>

    <link rel="stylesheet" type="text/css" href="/UCLDatabases/css/myProductsForSale.css" media="screen" />
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>




<div class="container">

    <div class="row">

        <div class="col-lg-12">

            <br>
            <div class="col-xs-12">
                <h3 style="float: left"> Buyer Rating</h3>
                <br><br><br>

                <h5 style="float: left"> <u></u>Here you can rate the buyer of your product and leave your feedback.</h5>

                <br><br>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="username" class="cols-sm-2 control-label">The person you are about to rate is: </label>
                    </div>

                    <div class="col-sm-6">
                        <label type="text" id="username" ><?php echo $_SESSION['firstName'] . " " . $_SESSION['surname']?></label>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="username" class="cols-sm-2 control-label">Your rating</label>
                    </div>

                    <input type="radio" id="ratingradio" name="ratingradio" value="1">   1
                    <br>
                    <input type="radio" id="ratingradio" name="ratingradio" value="2" >  2
                    <br>
                    <input type="radio" id="ratingradio" name="ratingradio" value="3">   3
                    <br>
                    <input type="radio" id="ratingradio" name="ratingradio" value="4">   4
                    <br>
                    <input type="radio" id="ratingradio" name="ratingradio" value="5">   5



                    <div class="col-sm-6">
                    </div>
                </div>


                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="username" class="cols-sm-2 control-label">Any comments you wish to make: </label>
                    </div>

                    <input type="text" id="feedbacktext" name="feedbacktext">

                    <br>
                    <div>
                        <form action= "../handlers/handlesellerFeedback.php">
                            <button>Send rating</button>
                        </form>                    </div>

                    <div>
                        <br>
                        <p>*** Please note that your feedback will only count if the buyer has won your product. Thank you. ***</p>
                    </div>



            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>

</body>
