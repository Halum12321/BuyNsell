<?php
header('Access-Control-Allow-Origin: *');
include('DBConnect.php');

$email_google = $_POST['email_google'];
$code_number = $_POST['code_number'];

$sqliMain = "SELECT * from verification_email where EMAIL = '$email_google' AND STATUS = 'ACTIVE' AND CODE = '$code_number'";
$resultMain = mysqli_query($con, $sqliMain);
$rowMain = mysqli_fetch_array($resultMain);
if ($resultMain->num_rows > 0) {
    if (is_array($rowMain)) {
        echo 0;
    }
} else {
    echo 1;
}

$con->close();
