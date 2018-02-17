<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-reboot.css" media="screen" />

    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/UCLDatabases/css/singleItem.css" media="screen" />
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php include("includes/navbar.php"); ?>

<div class="container">
    <div class="card">
        <div class="container-fluid">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <img src="/UCLDatabases/Resources/ipod-touch-product-initial-2015_GEO_GB.jpeg"/>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">Product Title Here</h3>

                    <p class="product-description">Product Description here</p>
                    <h4 class="price">Current Bid: <span>Price Here</span></h4>

                    <div id="bid-column" class="col-lg-12">
                        <div class="form-group">
                            <div id="box-column" class="col-sm-5">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="Bid" id="Bid"  placeholder="Enter your bid"/>
                                </div>
                            </div>
                            <div id="btn-column" class="col-sm-5">
                                <button class="add-to-cart btn btn-default" type="button">Make Bid</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid">
            <br>
            <br>
            <hr>
            <h3> More Details</h3>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare, orci in malesuada placerat, ante purus accumsan velit, vel blandit sapien eros facilisis neque. Phasellus molestie tincidunt velit. Aenean non lorem interdum, maximus arcu commodo, ornare elit. Morbi congue sit amet odio vel finibus. Quisque ex nibh, dignissim a volutpat laoreet, viverra nec mauris. Sed lacus est, porta in nulla efficitur, varius luctus sem. Proin sit amet nunc suscipit, bibendum elit at, sollicitudin magna. Nulla eget felis leo. Nam vel dictum dolor, at volutpat mauris. Vestibulum venenatis cursus lorem, ultrices aliquet mauris mollis eu. Nullam porttitor sit amet metus sit amet finibus. Mauris et ultrices purus, id aliquam sapien.
            <br>
            <br>
            Pellentesque tincidunt elit ut laoreet molestie. Pellentesque sem risus, luctus vel ipsum a, vehicula faucibus ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris non dictum quam. Nunc ullamcorper purus sed quam vestibulum cursus. Donec egestas ut nibh condimentum dictum. Sed consectetur condimentum augue ut posuere. Nulla iaculis mattis pellentesque. Proin rutrum eu nisl et sodales. Nunc tincidunt libero vel finibus suscipit. Quisque vitae sagittis orci, ac mattis lorem. Aenean pellentesque nisl nibh, eu dapibus felis blandit non. Mauris iaculis, neque nec mattis congue, diam tortor scelerisque mauris, ac laoreet justo nulla nec purus.
        </div>
    </div>
</div>



</body>
</html>