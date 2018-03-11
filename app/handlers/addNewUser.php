
<?php

require 'database.php';

function isDataValid()
{
    $errorMessage = null;
    if (!isset($_POST['username']) or trim($_POST['username']) == '')
        $errorMessage = 'You must enter your username';
    else if (!isset($_POST['firstName']) or trim($_POST['firstName']) == '')
        $errorMessage = 'You must enter your first name';
    else if (!isset($_POST['surname']) or trim($_POST['surname']) == '')
        $errorMessage = 'You must enter your surname';
    else if (!isset($_POST['address1']) or trim($_POST['address1']) == '')
        $errorMessage = 'You must enter your full address';
    else if (!isset($_POST['address2']) or trim($_POST['address2']) == '')
        $errorMessage = 'You must enter your full address';
    else if (!isset($_POST['postcode']) or trim($_POST['postcode']) == '')
        $errorMessage = 'You must enter your full address';
    else if (!isset($_POST['city']) or trim($_POST['city']) == '')
        $errorMessage = 'You must enter your full address';
    else if (!isset($_POST['country']) or trim($_POST['country']) == '')
        $errorMessage = 'You must enter your full address';
    else if (!isset($_POST['email']) or trim($_POST['email']) == '')
        $errorMessage = 'You must enter your email';
    else if (!isset($_POST['phone']) or trim($_POST['phone']) == '')
        $errorMessage = 'You must enter your phone number';
    else if (!isset($_POST['DoB']) or trim($_POST['DoB']) == '')
        $errorMessage = 'You must enter your Date of Birth';
    else if (!isset($_POST['password']) or trim($_POST['password']) == '')
        $errorMessage = 'You must enter your password';
    if ($errorMessage !== null)
    {
        echo <<<EOM
          <p>Error: $errorMessage</p>
EOM;
        return False;
    }
    return True;
}

function getUser()
{
    $user = array();
    $user['username'] = $_POST['username'];
    $user['firstName'] = $_POST['firstName'];
    $user['surname'] = $_POST['surname'];
    $user['address1'] = $_POST['address1'];
    $user['address2'] = $_POST['address2'];
    $user['postcode'] = $_POST['postcode'];
    $user['city'] = $_POST['city'];
    $user['country'] = $_POST['country'];
    $user['email'] = $_POST['email'];
    $user['phone'] = $_POST['phone'];
    $user['DoB'] = $_POST['DoB'];
    $user['userType'] = $_POST['userType'];
    $user['password'] = $_POST['password'];

    return $user;
}

function printUser($user)
{
    echo "<p>Username: ${user['username']}</p>";
    echo "<p>First Name: ${user['firstName']}</p>";
    echo "<p>Surname: ${user['surname']}</p>";
    echo "<p>Address Line 1: ${user['address1']}</p>";
    echo "<p>Address Line 2: ${user['address2']}</p>";
    echo "<p>Postcode: ${user['postcode']}</p>";
    echo "<p>City: ${user['city']}</p>";
    echo "<p>Country: ${user['country']}</p>";
    echo "<p>Email: ${user['email']}</p>";
    echo "<p>Phone: ${user['phone']}</p>";
    echo "<p>Date of Birth: ${user['DoB']}</p>";
    echo "<p>User Type: ${user['userType']}</p>";
    echo "<p>Password: ${user['password']}</p>";
}

function saveToDatabase($user)
{
    //$mysqli = mysqli_connect('localhost','root','root','AuctionManagement') or die('Error connecting to MySQL server.');
    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
    $query = "INSERT INTO auctiondb.User (username, firstName, surname, address1, address2, postcode, city, country, email, phone, DoB, userType, pw)".
        "VALUES ('${user['username']}','${user['firstName']}','${user['surname']}','${user['address1']}','${user['address2']}','${user['postcode']}','${user['city']}','${user['country']}','${user['email']}','${user['phone']}','${user['DoB']}','${user['userType']}','${user['password']}')";
    $result = mysqli_query($connection, $query) or die('Error making saveToDatabase query');
    mysqli_close($connection);
}

//create table User (username TEXT, firstName TEXT, surname TEXT, address1 TEXT, address2 TEXT, postcode TEXT, city TEXT, country TEXT, email TEXT, phone TEXT, DoB TEXT, userType TEXT, pw TEXT);


if(isDataValid()){
    $newUser = getUser();
    saveToDatabase($newUser);
    if($newUser['userType']=== 'admin'){
        header("location: ../views/manageAdmins.php");
    } else {
        header("location: ../views/login.php");
    }
   // header('Location:login.php');
}
?>