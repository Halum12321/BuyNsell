<?php
header('Access-Control-Allow-Origin: *');
include('DBConnect.php');

$your_uname = $_POST['your_uname'];

$sqliMain = "SELECT * from user_account where UNAME = '$your_uname'";
$resultMain = mysqli_query($con, $sqliMain);
$rowMain = mysqli_fetch_array($resultMain);
if ($resultMain->num_rows > 0) {
    if (is_array($rowMain)) {
        echo 1;
    }
} else {
    echo 0;
}

$con->close();
