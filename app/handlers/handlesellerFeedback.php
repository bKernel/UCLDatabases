

<?php

                    $checked = $_POST['ratingradio'];
                    $feedback = $_POST['feedbacktext'];

                    $connection = mysqli_connect('auctionmanagement34.mysql.database.azure.com','auction34@auctionmanagement34','JackSparrow34','auctiondb') or die('Error connecting to MySQL server.');
                    $update = "UPDATE auctiondb.results SET ratingfromseller = '$checked' WHERE sellerid ='{$_SESSION['id']}' AND auctionid = '{$_SESSION['itemid']}' ";
                    $updateresult= mysqli_query($connection, $update) or die('Error making Database update');

                    $updatefeedback = "UPDATE results SET feedbackfromseller = '$feedback' WHERE sellerid = '{$_SESSION['id']}' AND auctionid = '{$_SESSION['itemid']}'";
                    $updatefeedbackresult= mysqli_query($connection, $updatefeedback) or die('Error making Database update');

                    ;?>

<script> window.location.replace("../views/sellerSingleItem.php") </script>