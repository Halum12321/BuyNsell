<?php
header('Access-Control-Allow-Origin: *');
include('DBConnect.php');
session_start();

$pcodes = $_POST['pcodes'];
$pqtys = $_POST['pqtys'];
$fname = $_SESSION["FIRST_NAME"];
$lname = $_SESSION["LAST_NAME"];

$street = $_SESSION["ADDRESS_OTHERS"];
$brgy = $_SESSION["ADDRESS_BRGY"];
$city = $_SESSION["ADDRESS_CITY"];
$email = $_SESSION["EMAIL_ADD"];
$tel = $_SESSION["PHONE_NUMBER"];


$sqliMain = "SELECT * from registered_product where PRODUCT_CODE = '$pcodes'";
$resultMain = mysqli_query($con, $sqliMain);
$rowMain = mysqli_fetch_array($resultMain);
if ($resultMain->num_rows > 0) {
    if (is_array($rowMain)) {
        $stock = $rowMain['STOCK'];
        $new_stock = $stock + $pqtys;
        $productImage = $rowMain['MAIN_PRODUCT_IMAGE'];
        $prodshop_sent = $rowMain['SHOP_NAME'];
        $prodNames = $rowMain['PRODUCT_NAME'];
        $priceItem = $rowMain['SPRICE'];
        $totalPurchase = $priceItem * $pqtys;

        $sqlSIH = "INSERT into purchase_basket_history (ITEM_IMAGE, SHOP, PRODUCT_CODE, PRODUCT_NAME, ITEM_PRICE, QTY, TOTAL_PURCHASE, PURCHASED_BY, DATE_PURCHASED, TIME_PURCHASED, DELIVERY_ADDRESS,
        EMAIL, PHONE_NUMBER, STATUS, REASON)
        values('$productImage', '$prodshop_sent', '$pcodes', '$prodNames', $priceItem, $pqtys, $totalPurchase, '$fname $lname', NOW(), NOW(), '$street $brgy $city', 
                '$email', '$tel', 'Completed', '')";
        $rsSIH = mysqli_query($con, $sqlSIH);
        if ($rsSIH) {
            $sqlSIH = "UPDATE purchase_basket set STATUS = 'Completed' where PRODUCT_CODE = '$pcodes'";
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
}



$con->close();

?>