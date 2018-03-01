<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) { //user logging in
        require 'handleLogin.php';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/UCLDatabases/bootstrap-4-2/css/bootstrap-reboot.css" media="screen" />

    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="/UCLDatabases/bootstrap-4-2/js/bootstrap.js"></script>

    <link rel="stylesheet" type="text/css" href="/UCLDatabases/css/login.css" media="screen" />

    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Login</h1></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="login.php">
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-12">
                                    <input type="submit" name="login" class="form submit" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <?php echo $_SESSION['message'] ?>
                </div>
                <div class="panel-footer">
                    Not Registered? <a href="registration.php">Register here</a>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
</body>
</html>