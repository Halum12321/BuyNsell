<?php
header('Access-Control-Allow-Origin: *');
include('DBConnect.php');
session_start();

$productCode = $_POST['productCode'];
$itemNumber = $_POST['itemNumber'];
$fname = $_SESSION['FIRST_NAME'];
$lname = $_SESSION['LAST_NAME'];


$sqliMain2 = "SELECT * from purchase_basket where PRODUCT_CODE = '$productCode' && STATUS = 'Add to Cart' || PRODUCT_CODE = '$productCode' && STATUS = 'Add to Wishlist'";
$resultMain2 = mysqli_query($con, $sqliMain2);
$rowMain2 = mysqli_fetch_array($resultMain2);
if ($resultMain2->num_rows > 0) {
    if (is_array($rowMain2)) {

        $qtys = $rowMain2['QTY'];
        $itemPrice = $rowMain2['ITEM_PRICE'];
        $new_qty = $qtys + $itemNumber;
        $totals = $new_qty * $itemPrice;

        $sqlSIH = "UPDATE purchase_basket SET QTY = $new_qty, TOTAL_PURCHASE = $totals where PRODUCT_CODE = '$productCode' AND STATUS = 'Add to Cart' 
                || PRODUCT_CODE = '$productCode' AND STATUS = 'Add to Wishlist'";
        $rsSIH = mysqli_query($con, $sqlSIH);
        if ($rsSIH) {
        } else {
            echo ("Error description:" . mysqli_error($con));
        }
    }
} else {
    $sqliMain = "SELECT * from registered_product where PRODUCT_CODE = '$productCode'";
    $resultMain = mysqli_query($con, $sqliMain);
    $rowMain = mysqli_fetch_array($resultMain);
    if ($resultMain->num_rows > 0) {
        if (is_array($rowMain)) {
            $stock = $rowMain['STOCK'];

            $productImage  = $rowMain['MAIN_PRODUCT_IMAGE'];
            $prodshop_sent  = $rowMain['SHOP_NAME'];
            $prodNames  = $rowMain['PRODUCT_NAME'];
            $priceItem  = $rowMain['SPRICE'];
            $totalPurchase  = $priceItem * 1;
            $street  = $rowMain['STOCK'];
            $brgy  = $rowMain['STOCK'];
            $city  = $rowMain['STOCK'];

            if ($stock == 0) {
                $sqlSIH = "INSERT into purchase_basket (ITEM_IMAGE, SHOP, PRODUCT_CODE, PRODUCT_NAME, ITEM_PRICE, QTY, TOTAL_PURCHASE, PURCHASED_BY, DATE_PURCHASED, TIME_PURCHASED, DELIVERY_ADDRESS,
            EMAIL, PHONE_NUMBER, STATUS)
            values('$productImage', '$prodshop_sent', '$productCode', '$prodNames', $priceItem, 1, $totalPurchase, '$fname $lname', NOW(), NOW(), '', 
            '', '', 'Add to Wishlist')";
                $rsSIH = mysqli_query($con, $sqlSIH);
                if ($rsSIH) {
                    $sqlSIH = "INSERT into purchase_basket_history (ITEM_IMAGE, SHOP, PRODUCT_CODE, PRODUCT_NAME, ITEM_PRICE, QTY, TOTAL_PURCHASE, PURCHASED_BY, DATE_PURCHASED, TIME_PURCHASED, DELIVERY_ADDRESS,
                    EMAIL, PHONE_NUMBER, STATUS, REASON)
                    values('$productImage', '$prodshop_sent', '$productCode', '$prodNames', $priceItem, 1, $totalPurchase, '$fname $lname', NOW(), NOW(), '', 
                    '', '', 'Add to Wishlist', '')";
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
                $sqlSIH = "INSERT into purchase_basket (ITEM_IMAGE, SHOP, PRODUCT_CODE, PRODUCT_NAME, ITEM_PRICE, QTY, TOTAL_PURCHASE, PURCHASED_BY, DATE_PURCHASED, TIME_PURCHASED, DELIVERY_ADDRESS,
            EMAIL, PHONE_NUMBER, STATUS)
            values('$productImage', '$prodshop_sent', '$productCode', '$prodNames', $priceItem, 1, $totalPurchase, '$fname $lname', NOW(), NOW(), '', 
            '', '', 'Add to Cart')";
                $rsSIH = mysqli_query($con, $sqlSIH);
                if ($rsSIH) {
                    $sqlSIH = "INSERT into purchase_basket_history (ITEM_IMAGE, SHOP, PRODUCT_CODE, PRODUCT_NAME, ITEM_PRICE, QTY, TOTAL_PURCHASE, PURCHASED_BY, DATE_PURCHASED, TIME_PURCHASED, DELIVERY_ADDRESS,
                    EMAIL, PHONE_NUMBER, STATUS, REASON)
                    values('$productImage', '$prodshop_sent', '$productCode', '$prodNames', $priceItem, 1, $totalPurchase, '$fname $lname', NOW(), NOW(), '', 
                    '', '', 'Add to Cart', '')";
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
    }
}

$con->close();
