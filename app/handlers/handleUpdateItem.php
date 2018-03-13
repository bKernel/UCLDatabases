<?php

session_start();

include("database.php");

function getItem()
{
    $item = array();
    $item['itemName'] = $_POST['itemName'];
    $item['endDate'] = $_POST['endDate'];
    $item['endTime'] = $_POST['endTime'];
    $item['reservePrice'] = $_POST['reservePrice'];
    $item['itemDescription'] = $_POST['itemDescription'];
    $item['itemCondition'] = $_POST['itemCondition'];
    $item['itemCategory'] = $_POST['itemCategory'];
    $item['itemPicture1'] = $_POST['itemPicture1'];

    return $item;
}

function printItem($item)
{
    echo "<p>Item Name: ${item['itemName']}</p>";
    echo "<p>End Date: ${item['endDate']}</p>";
    echo "<p>End Time: ${item['endTime']}</p>";
    echo "<p>Reserve Price: ${item['reservePrice']}</p>";
    echo "<p>Description: ${item['itemDescription']}</p>";
    echo "<p>Condition: ${item['itemCondition']}</p>";
    echo "<p>Category: ${item['itemCategory']}</p>";
}

function setNewSession($item)
{
    if (isset($_POST['itemName'])) {
        $_SESSION['itemName'] = $item['itemName'];
    }
    if (isset($_POST['itemDescription'])) {
    $_SESSION['itemDescription'] = $item['itemDescription'];
    }
    if(isset($_POST['itemCondition'])) {
        $_SESSION['itemCondition'] = $item['itemCondition'];
    }
    if(isset($_POST['itemCategory'])) {
        $_SESSION['itemCategory'] = $item['itemCategory'];
    }
    if(isset($_POST['reservePrice'])) {
        $_SESSION['reservePrice'] = $item['reservePrice'];
        }
    if(isset($_POST['endTime'])) {
        $_SESSION['endTime'] = $item['endTime'];
    }
    if(isset($_POST['endDate'])) {
        $_SESSION['endDate'] = $item['endDate'];
    }
}

function updateImage1()
{
    if(isset($_POST["itemPicture1"])) {
//        unlink('../resources/5/Rolex/image1.png');
        $target_dir = "../resources/{$_SESSION['id']}/{$_POST['itemName']}";
        $target_file = $target_dir . basename($_FILES["itemPicture1"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["itemPicture1"]["tmp_name"]);
            if ($check !== false) {
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
}

function updateImage2()
{
    if(isset($_POST["itemPicture2"])) {
//        unlink('../resources/5/Rolex/image2.png');
        $target_dir = "../resources/{$_SESSION['id']}/{$_POST['itemName']}";
        $target_file = $target_dir . basename($_FILES["itemPicture2"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["itemPicture2"]["tmp_name"]);
            if ($check !== false) {
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
            if (move_uploaded_file($_FILES["itemPicture2"]["tmp_name"], $target_file)) {
                rename("$target_file", "../resources/{$_SESSION['id']}/{$_POST['itemName']}/image2.png");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

function saveToDatabase($item)
{

    $itemName = $item['itemName'];
    $itemDescription = $item['itemDescription'];
    $itemCondition = $item['itemCondition'];
    $itemCategory = $item['itemCategory'];
    $endTime = $item['endTime'];
    $endDate = $item['endDate'];
    $reservePrice = $item['reservePrice'];


    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
    $session = $_SESSION['itemid'];
    $sql = "UPDATE auctiondb.auction

    SET
    itemName = '$itemName',
    itemDescription = '$itemDescription',
    itemCondition = '$itemCondition',
    itemCategory = '$itemCategory',
    endTime = '$endTime',
    endDate = '$endDate',
    reservePrice = '$reservePrice'
    
    WHERE itemid='$session'";

    mysqli_query($connection, $sql);
    mysqli_close($connection);
}



$update = getItem();
updateImage1();
updateImage2();
saveToDatabase($update);
setNewSession($update);
header('Location:../views/sellerSingleItem.php');