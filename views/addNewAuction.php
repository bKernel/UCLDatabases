
<?php

require 'database.php';

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
    else if (!isset($_POST['itemPicture1']) or trim($_POST['itemPicture1']) == '')
        $errorMessage = 'You must enter an Image';
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

    return $item['itemName'];
}

function printItem($item)
{

    echo $item['id'];
    echo "<p>";
    echo $item['itemName'];
    echo "<p>";
    echo $item['endDate'];
    echo "<p>";
    echo $item['endTime'];
    echo "<p>";
    echo $item['reservePrice'];
    echo "<p>";
    echo $item['startingPrice'];
    echo "<p>";
    echo "<p>";
    echo $item['currentPrice'];
    echo "<p>";
    echo $item['itemDescription'];
    echo "<p>";
    echo $item['itemCondition'];
    echo "<p>";
    echo $item['itemCategory'];
    echo "<p>";
    echo $item['itemPicture1'];
}

function saveToDatabase($item)
{
    $connection = mysqli_connect('localhost','root','root','AuctionManagement') or die('Error connecting to MySQL server.');
    $query = "INSERT INTO AuctionManagement.Auction (id, itemName, endDate, endTime, reservePrice, startingPrice, currentPrice, itemDescription, itemCondition, itemCategory, itemPicture1)".
        "VALUES ('${$item['id']}','${$item['itemName']}','${$item['endDate']}','${$item['endTime']}','${$item['reservePrice']}','${$item['startingPrice']}','${$item['currentPrice']}','${$item['itemDescription']}','${$item['itemCondition']}','${$item['itemCategory']}','${$item['itemPicture1']}')";
    $result = mysqli_query($connection, $query) or die('Error making saveToDatabase query');
    mysqli_close($connection);
}

if(isDataValid()){
    $newItem = getItem();
    printItem($newItem);
    saveToDatabase($newItem);
//    require 'sellerHome.php';
}
?>