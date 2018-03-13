
<?php

require 'database.php';
require 'handleLogin.php';

session_start();

function isDataValid()
{
    $errorMessage = null;
    if (!isset($_POST['itemName']) or trim($_POST['itemName']) == '')
        $errorMessage = 'You must enter your Item Name';
    else if (!isset($_POST['endDate']) or trim($_POST['endDate']) == '')
        $errorMessage = 'You must enter your End Date';
    else if (!isset($_POST['endTime']) or trim($_POST['endTime']) == '')
        $errorMessage = 'You must enter your End Time';
    else if (!isset($_POST['reservePrice']) or trim($_POST['reservePrice']) == '')
        $errorMessage = 'You must enter your Reserve Price';
    else if (!isset($_POST['startingPrice']) or trim($_POST['startingPrice']) == '')
        $errorMessage = 'You must enter your Starting Price';
    else if (!isset($_POST['itemDescription']) or trim($_POST['itemDescription']) == '')
        $errorMessage = 'You must enter your Item Description';
    else if (!isset($_POST['itemCondition']) or trim($_POST['itemCondition']) == '')
        $errorMessage = 'You must enter your Item Condition';
    else if (!isset($_POST['itemCategory']) or trim($_POST['itemCategory']) == '')
        $errorMessage = 'You must enter your Item Category';
    if ($errorMessage !== null)
    {
        echo <<<EOM
          <p>Error: $errorMessage</p>
EOM;
        return False;
    }
    return True;
}

function getItem()
{
    $item = array();
    $item['id'] = $_SESSION['id'];
    $item['itemName'] = $_POST['itemName'];
    $item['endDate'] = $_POST['endDate'];
    $item['endTime'] = $_POST['endTime'];
    $item['reservePrice'] = $_POST['reservePrice'];
    $item['startingPrice'] = $_POST['startingPrice'];
    $item['currentPrice'] = $_POST['startingPrice'];
    $item['itemDescription'] = $_POST['itemDescription'];
    $item['itemCondition'] = $_POST['itemCondition'];
    $item['itemCategory'] = $_POST['itemCategory'];
    $item['itemPicture1'] = $_POST['itemPicture1'];
    $item['itemPicture2'] = $_POST['itemPicture2'];
    $item['status'] = "open";
    return $item;
}

function printItem($item)
{

    echo "<p>ID: ${item['id']}</p>";
    echo "<p>Item Name: ${item['itemName']}</p>";
    echo "<p>End Date: ${item['endDate']}</p>";
    echo "<p>End Time: ${item['endTime']}</p>";
    echo "<p>Reserve Price: ${item['reservePrice']}</p>";
    echo "<p>Starting Price: ${item['startingPrice']}</p>";
    echo "<p>Current Price: ${item['currentPrice']}</p>";
    echo "<p>Description: ${item['itemDescription']}</p>";
    echo "<p>Condition: ${item['itemCondition']}</p>";
    echo "<p>Category: ${item['itemCategory']}</p>";
}

function saveToDatabase($item)
{
    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
    $query = "INSERT INTO auctiondb.auction (id, itemName, endDate, endTime, reservePrice, startingPrice, currentPrice, itemDescription, itemCondition, itemCategory, status)".
        "VALUES ('${item['id']}','${item['itemName']}','${item['endDate']}','${item['endTime']}','${item['reservePrice']}','${item['startingPrice']}','${item['currentPrice']}','${item['itemDescription']}','${item['itemCondition']}','${item['itemCategory']}','${item['status']}')";
    $result = mysqli_query($connection, $query) or die('Error making saveToDatabase query');
    mysqli_close($connection);
}

function saveImage1()
{
    mkdir("../resources/{$_SESSION['id']}/");
    mkdir("../resources/{$_SESSION['id']}/{$_POST['itemName']}");
    $target_dir = "../resources/{$_SESSION['id']}/{$_POST['itemName']}";
    $target_file = $target_dir . basename($_FILES["itemPicture1"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["itemPicture1"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

    // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

    // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

    // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["itemPicture1"]["tmp_name"], $target_file)) {
                rename("$target_file", "../resources/{$_SESSION['id']}/{$_POST['itemName']}/image1.png");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
}

function saveImage2()
{
    $target_dir = "../resources/{$_SESSION['id']}/{$_POST['itemName']}";
    $target_file = $target_dir . basename($_FILES["itemPicture2"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["itemPicture2"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["itemPicture2"]["tmp_name"], $target_file)) {
            rename("$target_file", "../resources/{$_SESSION['id']}/{$_POST['itemName']}/image2.png");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if(isDataValid()){
    $newItem = getItem();
    saveImage1();
    saveImage2();
    saveToDatabase($newItem);
    require '../views/myProductsForSale.php';
   // header('Location:myProductsForSale.php');
}
?>