<?php
header('Access-Control-Allow-Origin: *');
include('DBConnect.php');

$email_google = $_POST['email_google'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$p1 = $_POST['p1'];
$your_uname = $_POST['your_uname'];


$sqliMain = "SELECT * from user_account where EMAIL_ADD = '$email_google' AND FIRST_NAME = '$firstname' AND LAST_NAME = '$lastname'";
$resultMain = mysqli_query($con, $sqliMain);
$rowMain = mysqli_fetch_array($resultMain);
if ($resultMain->num_rows > 0) {
    if (is_array($rowMain)) {
        echo 1;
    }
} else {
    $sqlSIH = "INSERT into user_account (FIRST_NAME, LAST_NAME, UNAME, PASSWORD, PHONE_NUMBER,EMAIL_ADD,EMAIL_PASS,BIRTHDAY, AGE, ID_TYPE,
    ACCOUNT_STATUS, USER_TYPE, VALID_ID, ID_PICTURE, ADDRESS_REGION_PROVINCE, ADDRESS_CITY, ADDRESS_BRGY, ADDRESS_OTHERS,COMPLETE_ADDRESS, profile, SELLER, BUYER, STORE)
    values('$firstname', '$lastname', '$your_uname', '$p1', '', '$email_google', '', '1999-06-15', 0, '', 'NOT VERIFIED', 'Buyer', '', '', '', '', '', '', '', '',0,0,'')";
    $rsSIH = mysqli_query($con, $sqlSIH);
    if ($rsSIH) {
        $sqlSIH = "UPDATE verification_email set STATUS = 'USED' where EMAIL = '$email_google' AND STATUS = 'ACTIVE' limit 1";
        $rsSIH = mysqli_query($con, $sqlSIH);
        if ($rsSIH) {
          echo 0;
        } else {
            echo ("Error description:" . mysqli_error($con));
        }
    } else {
        echo ("Error description:" . mysqli_error($con));
    }
}

$con->close();
