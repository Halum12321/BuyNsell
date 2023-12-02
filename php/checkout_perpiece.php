<?php
header('Access-Control-Allow-Origin: *');
include('DBConnect.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$street = $_POST['street'];
$brgy = $_POST['brgy'];
$city = $_POST['city'];
$tel = $_POST['tel'];
$prodQty = $_POST['prodQty'];
$prodNames = $_POST['prodNames'];
$priceItem = $_POST['priceItem'];
$totalPurchase = $_POST['totalPurchase'];
$prodcode_sent = $_POST['prodcode_sent'];
$prodshop_sent = $_POST['prodshop_sent'];
$productImage = $_POST['productImage'];
// $sqliMain = "SELECT * from sellers_information where USER_NAME = '$userN'";
// $resultMain = mysqli_query($con, $sqliMain);
// $rowMain = mysqli_fetch_array($resultMain);
// if ($resultMain->num_rows > 0) {
//     if (is_array($rowMain)) {
//         echo 1;
//     }
// } else {
// }
$sqliMain = "SELECT * from registered_product where PRODUCT_CODE = '$prodcode_sent'";
$resultMain = mysqli_query($con, $sqliMain);
$rowMain = mysqli_fetch_array($resultMain);
if ($resultMain->num_rows > 0) {
    if (is_array($rowMain)) {
        $stock = $rowMain['STOCK'];
        $new_stock = $stock - $prodQty;

        $sqliMain = "SELECT * from registered_product where PRODUCT_CODE = '$prodcode_sent' order by PURCHASE_NUMBER desc limit 1";
        $resultMain = mysqli_query($con, $sqliMain);
        $rowMain = mysqli_fetch_array($resultMain);
        if ($resultMain->num_rows > 0) {
            if (is_array($rowMain)) {
                $pnumber = $rowMain['PURCHASE_NUMBER'];
                $new_pnumber = $pnumber + 1;


                $sqlSIH = "INSERT into purchase_basket (ITEM_IMAGE, SHOP, PRODUCT_CODE, PRODUCT_NAME, ITEM_PRICE, QTY, TOTAL_PURCHASE, PURCHASED_BY, DATE_PURCHASED, TIME_PURCHASED, DELIVERY_ADDRESS,
EMAIL, PHONE_NUMBER, STATUS)
values('$productImage', '$prodshop_sent', '$prodcode_sent', '$prodNames', $priceItem, $prodQty, $totalPurchase, '$fname $lname', NOW(), NOW(), '$street $brgy $city', 
'$email', '$tel', 'Checkout')";
                $rsSIH = mysqli_query($con, $sqlSIH);
                if ($rsSIH) {
                    $sqlSIH = "UPDATE registered_product set PURCHASE_NUMBER = $new_pnumber, LAST_DATE_PURCHASED = NOW(), STOCK = $new_stock, PRODUCT_STATUS = 'ACTIVE' where PRODUCT_CODE = '$prodcode_sent'";
                    $rsSIH = mysqli_query($con, $sqlSIH);
                    if ($rsSIH) {
                        
                $sqlSIH = "INSERT into purchase_basket_history (ITEM_IMAGE, SHOP, PRODUCT_CODE, PRODUCT_NAME, ITEM_PRICE, QTY, TOTAL_PURCHASE, PURCHASED_BY, DATE_PURCHASED, TIME_PURCHASED, DELIVERY_ADDRESS,
                EMAIL, PHONE_NUMBER, STATUS, REASON)
                values('$productImage', '$prodshop_sent', '$prodcode_sent', '$prodNames', $priceItem, $prodQty, $totalPurchase, '$fname $lname', NOW(), NOW(), '$street $brgy $city', 
                '$email', '$tel', 'Checkout', '')";
                                $rsSIH = mysqli_query($con, $sqlSIH);
                                if ($rsSIH) {
                                    echo 0;
                                }else{
                                    echo ("Error description:" . mysqli_error($con));   
                                }
                    } else {
                        echo ("Error description:" . mysqli_error($con));
                    }
                } else {
                    echo ("Error description:" . mysqli_error($con));
                }
            }
        }
    }
}




$con->close();
