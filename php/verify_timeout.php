<?php
header('Access-Control-Allow-Origin: *');
include('DBConnect.php');

$email_google = $_POST['email_google'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$time_valid = $_POST['time_valid'];
$time_now = $_POST['time_now'];
$currentDate = date('Y-m-d');
function generateRandomCode($length = 8)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

$randomCode = generateRandomCode();


$sqliMain = "SELECT * from verification_email where EMAIL = '$email_google' AND STATUS = 'ACTIVE' limit 1";
$resultMain = mysqli_query($con, $sqliMain);
$rowMain = mysqli_fetch_array($resultMain);
if ($resultMain->num_rows > 0) {
    if (is_array($rowMain)) {
        $timeValidity = $rowMain['TIME_VALID'];

        if ($time_now > $timeValidity) {
            $sqlSIH = "UPDATE verification_email set STATUS = 'INVALID' where EMAIL = '$email_google' AND STATUS = 'ACTIVE' limit 1";
            $rsSIH = mysqli_query($con, $sqlSIH);
            if ($rsSIH) {
                $sqlSIH = "INSERT into verification_email (FIRST_NAME, LAST_NAME, EMAIL, CODE, STATUS, DATE_SENT, TIME_SENT, DATE_VALID, TIME_VALID)
                values('$firstname', '$lastname', '$email_google', '$randomCode', 'ACTIVE', NOW(), NOW(), NOW(), '$time_valid')";
                $rsSIH = mysqli_query($con, $sqlSIH);
                if ($rsSIH) {
                    echo 0;
                } else {
                    echo ("Error description:" . mysqli_error($con));
                }
            } else {
                echo ("Error description:" . mysqli_error($con));
            }
        } else {
            echo 1;
        }
    }
} else {
    $sqlSIH = "INSERT into verification_email (FIRST_NAME, LAST_NAME, EMAIL, CODE, STATUS, DATE_SENT, TIME_SENT, DATE_VALID, TIME_VALID)
values('$firstname', '$lastname', '$email_google', '$randomCode', 'ACTIVE', NOW(), NOW(), NOW(), '$time_valid')";
    $rsSIH = mysqli_query($con, $sqlSIH);
    if ($rsSIH) {
        echo 0;
    } else {
        echo ("Error description:" . mysqli_error($con));
    }
}

$con->close();


// $sqliMain = "SELECT * from verification_email where EMAIL = '$email_google' AND TIME_VALID = '$time_now' >= $time_now";
// $resultMain = mysqli_query($con, $sqliMain);
// $rowMain = mysqli_fetch_array($resultMain);
// if ($resultMain->num_rows > 0) {
//     if (is_array($rowMain)) {
//         $sqlSIH = "UPDATE verification_email set STATUS = 'UNUSED' where ";
//             $rsSIH = mysqli_query($con, $sqlSIH);
//             if ($rsSIH) {
//                 echo 0;
//             } else {
//                 echo ("Error description:" . mysqli_error($con));
//             }
//     }
// } 