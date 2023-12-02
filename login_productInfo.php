<?php
include('DBConnect.php');
session_start();

if (!isset($_SESSION["UNAME"])) {
    $_SESSION = array();
    session_destroy();
    header('location: index.php');
    die();
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="assets/images/buyAndSell.png" rel="icon">
    <title>BUY & SELL</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
<style>
    .image_tops {
        width: 100%;
        /* Set the width of the image to 100% of the container */
        height: 100%;
        /* Set the height of the image to 100% of the container */
        object-fit: contain;
        /* Fit the image proportionally within the container */
        position: absolute;
        /* Set the image to absolute positioning */
        top: 0;
        /* Position the image at the top of the container */
        left: 0;
        /* Position the image at the left of the container */
    }

    #va_discover:hover {
        background-color: #01D1FF;
    }

    .text_gray {
        color: gray;
    }

    .button_color:focus {
        border: 1px solid red;
        background-color: #EEFF01;
        color: black;
    }

    .button_color {
        background-color: #01D1FF;
        color: white;
        width: 100px;
        border: none;
    }

    .num-block {
        float: left;
        width: 100%;
    }

    /* skin 7 */

    .skin-7 .num-in {
        float: left;
        width: 138px;
        border: 1px solid #a4a4a3;
    }

    .skin-7 input.in-num {
        font-family: 'HelveticaNeueCyr-Roman';
        font-size: 14px;
        float: left;
        height: 32px;
        width: 83px;
        border-left: 1px solid #a4a4a3;
        border-right: 1px solid #a4a4a3;
        background-color: #fff;
        text-align: center;
    }

    .skin-7 .num-in span {
        font-size: 24px;
        text-align: center;
        display: block;
        width: 46px;
        float: left;
        height: 32px;
        background-color: #f4f4f6;
        cursor: pointer;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    .skin-7 .num-in span:hover {
        background-color: #d7d7d8;
    }

    .skin-7 .num-in input {
        border: none;
        float: left;
        width: 44px;
        line-height: 34px;
        text-align: center;
        font-family: 'helveticaneuecyrbold';
    }

    /* / skin 7 */

    #btn_addCart {
        border: 1px solid #EEFF01;
        background-color: #FEF9E7;
        padding: 14px;
        margin-right: 20px;
        width: 250px;
        font-weight: 600;
    }

    #btn_buy {
        background-color: #EEFF01;
        padding: 14px;
        width: 250px;
        font-weight: 600;
    }
</style>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><a href="SignIn-Seller.php">Start Selling</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> buyandsell@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Santa Cruz, Laguna</a></li>
                </ul>
                <ul class="header-links pull-right">
                                
<?php 
                                if($_SESSION['USER_TYPE'] == 'Admin'){
                                    ?>
                                    <li><a href="ECS_ADMIN/admin_dashboard.php"><i class="fa fa-user"></i>Hi <?php echo $_SESSION['FIRST_NAME'] ?> !</a></li>
                    <?php   }else{
                            ?>
                            <li><a href="ECS_ADMIN/verify_account.php"><i class="fa fa-user"></i>Hi <?php echo $_SESSION['FIRST_NAME'] ?> !</a></li>
                        <?php 
                    }
                                ?>
                            
                    <li><a href="index.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <br>
                        <div class="header-logo">
                            <a href="Buyer_index.php" class="logo mt-3 text-white">
                                <H2 style="color: white;"><span style="color: #01D1FF;">BUY</span> AND <span style="color: #EEFF01;">SELL</span></H2>
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="login_filtered_item.php">
                                <input class="input-select" name="searchItem" style="width: 450px;" placeholder="Search here">
                                <button type="submit" class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <?php 
                                if($_SESSION['USER_TYPE'] == 'Admin'){
                                    ?>
                                    <a href="ECS_ADMIN/admin_dashboard.php">
                                    <i class="fa fa-cog"></i>
                                    <span>Settings</span>
                                </a>
                            <?php   
                        }else{
                            ?>
                            <a href="ECS_ADMIN/verify_account.php">
                                    <i class="fa fa-cog"></i>
                                    <span>Settings</span>
                                </a>
                        <?php 
                    }
                                ?>
                                
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a href="login_cart.php" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                    <div class="qty">
                                            <?php
                                        $firstName = $_SESSION['FIRST_NAME'];
                    $lastName = $_SESSION['LAST_NAME'];
                                        $sqliMain = "SELECT COUNT(ID) from purchase_basket where STATUS = 'Add to Cart' and PURCHASED_BY = '$firstName $lastName' || STATUS = 'Add to Wishlist' and PURCHASED_BY = '$firstName $lastName' ";
                                        $resultMain = mysqli_query($con, $sqliMain);
                                        $rowMain = mysqli_fetch_array($resultMain);
                                        if ($resultMain->num_rows > 0) {
                                            if (is_array($rowMain)) {
                                                echo $rowMain['COUNT(ID)'];
                                            }
                                        }
                                        ?>
                                    </div>
                                </a>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->
    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li><a href="Buyer_index.php#home">Home</a></li>
                    <li><a href="Buyer_index.php#hot-deal">Hot Deals</a></li>
                    <li><a href="Buyer_index.php#categories_div">Categories</a></li>
                    <li class="active"><a href="Buyer_index.php#discover_container">Daily Discover</a></li>
                    <li><a href="login_orders.php">My Orders</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->



    <!-- SECTION ITEM INFORMATION-->
    <div class="section" id="categories_div">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="product col-md-5" style="padding: 20px;">
                    <div class="product-img" style="height:500px">
                        <img src="ECS_ADMIN/<?php echo $_REQUEST['prodImage'] ?>" alt="" class="image_tops">
                    </div>

                </div>
                <div class="product col-md-7" style="padding: 20px;">
                    <h2><?php echo $_REQUEST['prodName'] ?></h2>
                    <!-------------- product title and ratings ----------->
                    <div class="row">
                        <div class="col-md-4 text-center">
                            10 Review(s)
                        </div>
                        <div class="col-md-4 text-center">
                            <?php echo $_REQUEST['prodPurchaseNum'] ?> sold
                        </div>
                    </div>
                    <!-------------- product price----------->
                    <div class="row bg-secondary" style="margin-top: 20px;">
                        <div class="col-md-12" style="background-color:#EEFF01; padding:10px; padding-left:60px">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    if ($_REQUEST['prodPercentage'] == 0) {
                                    ?>
                                        <h3 class="product-price" style=" color:#01D1FF">₱<?php echo $_REQUEST['prodNewPrice'] ?>.00 <del style="color: #a4a4a3;"></h3>
                                    <?php
                                    } else {
                                    ?>
                                        <h3 class="product-price" style=" color:#01D1FF">₱<?php echo $_REQUEST['prodNewPrice'] ?>.00 <del style="color: #a4a4a3;">₱<?php echo $_REQUEST['prodNewPrice'] ?>.00</del></h3>
                                    <?php
                                    }
                                    ?>

                                    <p>Lowest Price Guaranteed</p>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    if ($_REQUEST['prodStock'] != 0) {
                                    ?>
                                        <span style="font-weight:bold">IN STOCK</span>
                                    <?php
                                    } else {
                                    ?>
                                        <span style="font-weight:bold; color:red">NO STOCK</span>
                                    <?php
                                    }
                                    ?>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px; padding:10px; padding-left:60px">
                        <div class="col-md-4">
                            <span class="text_gray">Shipping:</span>
                        </div>
                        <div class="col-md-8">
                            <span style="font-weight:bold">Shipping Discount</span><br>
                            <span class="text_gray">Shipping discount for orders over ₱249</span>
                        </div>
                        <hr><br>
                        <!---------------- color selection ----------------->
                        <div class="col-md-4">
                            <span class="text_gray"><?php echo $_REQUEST['prodVariation'] ?>:</span>
                        </div>
                        <div class="col-md-8">
                            <button class="button_color"><?php echo $_REQUEST['prodOptions'] ?></button>
                        </div>
                        <br> <br>
                        <!---------------- qty selection ----------------->
                        <div class="col-md-4">
                            <span class="text_gray">Quantity:</span>
                        </div>
                        <div class="col-md-8">
                            <div class="num-block skin-7">
                                <div class="num-in">
                                    <span class="minus dis">-</span>
                                    <input type="text" class="in-num" id="itemNumber" name="itemNumber" value="1" readonly="">
                                    <span class="plus">+</span>
                                </div>
                            </div>
                        </div>
                        <br> <br><br>
                        <!---------------- # of products ----------------->
                        <div class="col-md-4">
                            <span class="text_gray">Stock:</span>
                        </div>
                        <div class="col-md-8">
                            <span id="stockNumber"><?php echo $_REQUEST['prodStock'] ?></span> pieces available
                        </div>
                        <!---------------- buttons ----------------->
                        <div class="col-md-12" style="margin-top: 60px;">

                            <form action="login_checkout.php">
                                <button class="btn" id="btn_addCart"><i class="fa fa-cart-plus"></i> Add to Cart</button>
                                <input type="hidden" name="productName" value="<?php echo $_REQUEST['prodName'] ?>">
                                <input type="hidden" name="productStock" value="<?php echo $_REQUEST['prodStock'] ?>">
                                <input type="hidden" name="productPrice" value="<?php echo $_REQUEST['prodNewPrice'] ?>">
                                <input type="hidden" name="productCode" id="productCode" value="<?php echo $_REQUEST['prodCode'] ?>">
                                <input type="hidden" name="productShop" value="<?php echo $_REQUEST['prodShop'] ?>">
                                <input type="hidden" name="productImage" value="<?php echo $_REQUEST['prodImage'] ?>">
                                <input type="hidden" name="productQty" id="productQty">
                                <button class="btn" id="btn_buy" name="btn_buy">Check Out</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION SELLERS PROFILE-->
    <div class="section" id="categories_div">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="product col-md-3" style="border: 1px solid #EEFF01; padding:18px">
                    <div class="row">
                        <div style=" background-color:white; padding:5px">
                            <h2 class="" style="margin-top:50px"><?php echo $_REQUEST['prodShop'] ?></h2>
                            <span class="text_gray"><?php
                                                    $pc = $_REQUEST['prodShop'];
                                                    $sqliMain2 = "SELECT * from sellers_information WHERE SHOP_NAME = '$pc'";
                                                    $resultMain2 = mysqli_query($con, $sqliMain2);
                                                    $rowMain2 = mysqli_fetch_array($resultMain2);
                                                    if ($resultMain2->num_rows > 0) {
                                                        if (is_array($rowMain2)) {
                                                            echo $rowMain2['REGISTERED_NAME'];
                                                            echo '<br>';
                                                            echo $rowMain2['PHONE_NUMBER'];
                                                        }
                                                    } else {
                                                    }

                                                    ?></span><br> <br>
                        </div>
                        <form action="login_view_shop.php">
                            <input type="hidden" name="pShop" value="<?php echo $_REQUEST['prodShop'] ?>">
                            <button class="btn btn-primary col-md-12 mt-5">View Shop</button>
                        </form>
                    </div>


                </div>
                <div class="product col-md-9" style="padding: 20px;">
                    <div class="row" style="margin-bottom:5px">
                        <div class="col-md-12 mb-1">
                            <h3> <b>Store Overview</b></h3>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            Number of Category
                        </div>
                        <div class="col-md-6">
                            <?php
                            $pc = $_REQUEST['prodShop'];
                            $sqliMain = "SELECT DISTINCT CATEGORY, COUNT(ID) from registered_product WHERE SHOP_NAME = '$pc'";
                            $resultMain = mysqli_query($con, $sqliMain);
                            $rowMain = mysqli_fetch_array($resultMain);
                            if ($resultMain->num_rows > 0) {
                                if (is_array($rowMain)) {
                                    echo $rowMain['COUNT(ID)'];
                                }
                            } else {
                            }

                            ?>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px">
                        <div class="col-md-6">
                            Number of Item
                        </div>
                        <div class="col-md-6">
                            <?php
                            $pc = $_REQUEST['prodShop'];
                            $sqliMain = "SELECT DISTINCT CATEGORY, COUNT(ID) from registered_product WHERE SHOP_NAME = '$pc'";
                            $resultMain = mysqli_query($con, $sqliMain);
                            $rowMain = mysqli_fetch_array($resultMain);
                            if ($resultMain->num_rows > 0) {
                                if (is_array($rowMain)) {
                                    echo $rowMain['COUNT(ID)'];
                                }
                            } else {
                            }

                            ?>
                        </div>

                    </div>

                    <div class="row" style="margin-bottom:5px">
                        <div class="col-md-6">
                            Pickup Address
                        </div>
                        <div class="col-md-6">
                            <?php
                            $pc = $_REQUEST['prodShop'];
                            $sqliMain2 = "SELECT * from sellers_information WHERE SHOP_NAME = '$pc'";
                            $resultMain2 = mysqli_query($con, $sqliMain2);
                            $rowMain2 = mysqli_fetch_array($resultMain2);
                            if ($resultMain2->num_rows > 0) {
                                if (is_array($rowMain2)) {
                                    echo $rowMain2['RA_OTHERS'];
                                    echo $rowMain2['RA_BRGY'];
                                    echo $rowMain2['RA_CITY'];
                                    echo $rowMain2['RA_REGION_PROVINCE'];
                                }
                            } else {
                            }

                            ?>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:10px">
                        <div class="col-md-6">
                            Email Address
                        </div>
                        <div class="col-md-6">
                            <?php
                            $pc = $_REQUEST['prodShop'];
                            $sqliMain2 = "SELECT * from sellers_information WHERE SHOP_NAME = '$pc'";
                            $resultMain2 = mysqli_query($con, $sqliMain2);
                            $rowMain2 = mysqli_fetch_array($resultMain2);
                            if ($resultMain2->num_rows > 0) {
                                if (is_array($rowMain2)) {
                                    echo $rowMain2['EMAIL'];
                                }
                            } else {
                            }

                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION PRODUCT DESCRIPTION-->
    <div class="section" id="categories_div">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="product col-md-12" style="padding: 20px;">
                    <h4>Product Specification</h4>

                    <div class="row" style="margin-bottom:15px">
                        <div class="col-md-4">
                            <span class="text_gray">Category</span>
                        </div>
                        <div class="col-md-8">
                            Buy & Sell > <?php echo $_REQUEST['prodCategory'] ?>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:15px">
                        <div class="col-md-4">
                            <span class="text_gray">Size</span>
                        </div>
                        <div class="col-md-8">
                            <?php echo $_REQUEST['prodSize'] ?>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:15px">
                        <div class="col-md-4">
                            <span class="text_gray">Country Origin</span>
                        </div>
                        <div class="col-md-8">
                            Philippines
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:15px">
                        <div class="col-md-4">
                            <span class="text_gray">Ships from</span>
                        </div>
                        <div class="col-md-8">
                            <?php
                            $pc = $_REQUEST['prodShop'];
                            $sqliMain2 = "SELECT * from sellers_information WHERE SHOP_NAME = '$pc'";
                            $resultMain2 = mysqli_query($con, $sqliMain2);
                            $rowMain2 = mysqli_fetch_array($resultMain2);
                            if ($resultMain2->num_rows > 0) {
                                if (is_array($rowMain2)) {
                                    echo $rowMain2['PICKUP_ADDRESS'];
                                }
                            } else {
                            }
                            ?>
                        </div>
                    </div>
                    <h4>Product Description</h4>
                    <span>
                        <?php echo $_REQUEST['prodD'] ?>
                    </span>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION daily discover-->
    <div class="section" id="discover_container">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Daily Discover</h3>
                        <hr style="border: 3px solid #EEFF01;
  border-radius: 5px;">
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="products-tabs">
                            <!--1st row tab -->
                            <div class="row">
                                <!-- product top1-->
                                <?php
                                $query2 = "SELECT * FROM registered_product order by ID asc";
                                $resultTableH2 = mysqli_query($con, $query2);
                                ?>
                                <?php
                                if (mysqli_num_rows($resultTableH2) > 0) {
                                ?>
                                    <?php
                                    while ($row = mysqli_fetch_array($resultTableH2)) {
                                        $per = $row['PERCENTAGE_NUM'];
                                        $imgs = $row['MAIN_PRODUCT_IMAGE'];
                                        $cat = $row['CATEGORY'];
                                        $pname = $row['PRODUCT_NAME'];
                                        $prodPrice = $row['SPRICE'];
                                        $oldprodPrice = $row['OPRICE'];
                                        $pnNumber = $row['PURCHASE_NUMBER'];
                                        $stock = $row['STOCK'];
                                        $size = $row['SIZE'];
                                        $shopName = $row['SHOP_NAME'];
                                        $var = $row['VARIATION'];
                                        $colors = $row['OPTIONS'];
                                        $prodCode = $row['PRODUCT_CODE'];
                                        $prodDesc = $row['PRODUCT_DESCRIPTION'];
                                    ?>
                                        <?php
                                        if ($per == 0) {
                                        ?>
                                            <!-- product with no discount-->
                                            <div class="col-md-3 mx-3" style="padding-bottom: 60px;margin-bottom: -60px;z-index: 2;">
                                                <div class="product">
                                                    <div class="product-img" style="height: 260px;">
                                                    <form action="login_productInfo.php">
															<div class="product-btns">
																<input type="hidden" name="prodImage" value="<?php echo $imgs ?>">
																<input type="hidden" name="prodName" value="<?php echo $pname ?>">
																<input type="hidden" name="prodPercentage" value="<?php echo $per ?>">
																<input type="hidden" name="prodCategory" value="<?php echo $cat ?>">
																<input type="hidden" name="prodNewPrice" value="<?php echo $prodPrice ?>">
																<input type="hidden" name="prodOrigPrice" value="<?php echo $oldprodPrice ?>">
																<input type="hidden" name="prodPurchaseNum" value="<?php echo $pnNumber ?>">
																<input type="hidden" name="prodStock" value="<?php echo $stock ?>">
																<input type="hidden" name="prodSize" value="<?php echo $size ?>">
																<input type="hidden" name="prodShop" value="<?php echo $shopName ?>">
																<input type="hidden" name="prodVariation" value="<?php echo $var ?>">
																<input type="hidden" name="prodOptions" value="<?php echo $colors ?>">
																<input type="hidden" name="prodCode" value="<?php echo $prodCode ?>">
																<input type="hidden" name="prodD" value="<?php echo $prodDesc ?>">
																<input type="hidden" name="prodImage" value="<?php echo $imgs ?>">
															    <button type="submit" class="quick-view" style="border: none; background:none"><img src="ECS_ADMIN/<?php echo $imgs ?>" alt="" class="image_tops"></button>
															</div>
														</form>
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category"><?php echo $cat ?></p>
                                                        <h3 class="product-name"><a href="#"><?php echo $pname ?></a></h3>
                                                        <h4 class="product-price"><?php echo '₱ ';
                                                                                    echo $prodPrice;
                                                                                    echo '.00'; ?></h4>
                                                        <hr>
                                                        <form action="login_productInfo.php">
                                                            <div class="product-btns">
                                                                <input type="hidden" name="prodImage" value="<?php echo $imgs ?>">
                                                                <input type="hidden" name="prodName" value="<?php echo $pname ?>">
                                                                <input type="hidden" name="prodPercentage" value="<?php echo $per ?>">
                                                                <input type="hidden" name="prodCategory" value="<?php echo $cat ?>">
                                                                <input type="hidden" name="prodNewPrice" value="<?php echo $prodPrice ?>">
                                                                <input type="hidden" name="prodOrigPrice" value="<?php echo $oldprodPrice ?>">
                                                                <input type="hidden" name="prodPurchaseNum" value="<?php echo $pnNumber ?>">
                                                                <input type="hidden" name="prodStock" value="<?php echo $stock ?>">
                                                                <input type="hidden" name="prodSize" value="<?php echo $size ?>">
                                                                <input type="hidden" name="prodShop" value="<?php echo $shopName ?>">
                                                                <input type="hidden" name="prodVariation" value="<?php echo $var ?>">
                                                                <input type="hidden" name="prodOptions" value="<?php echo $colors ?>">
                                                                <input type="hidden" name="prodCode" value="<?php echo $prodCode ?>">
                                                                <input type="hidden" name="prodD" value="<?php echo $prodDesc ?>">
                                                                <input type="hidden" name="prodImage" value="<?php echo $imgs ?>">
                                                                <?php echo $pnNumber ?> Sold | View <button type="submit" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="add-to-cart">
														<form action="login_addCart.php" enctype="multipart/form-data">
															<input type="hidden" name="add_prodCode" value="<?php echo $prodCode ?>">
															<input type="hidden" name="add_prodName" value="<?php echo $pname ?>">
															<button class="add-to-cart-btn" type="submit" name="addcart"><i class="fa fa-shopping-cart"></i> add to cart</button>
														</form>
													</div>
                                                </div>
                                            </div>
                                            <!-- /product -->
                                        <?php
                                        } else {
                                        ?>
                                            <!-- product with discount-->
                                            <div class="col-md-3 mx-3" style="padding-bottom: 60px;margin-bottom: -60px;z-index: 2;">
                                                <div class="product">
                                                    <div class="product-img" style="height: 260px;">
                                                    <form action="login_productInfo.php">
															<div class="product-btns">
																<input type="hidden" name="prodImage" value="<?php echo $imgs ?>">
																<input type="hidden" name="prodName" value="<?php echo $pname ?>">
																<input type="hidden" name="prodPercentage" value="<?php echo $per ?>">
																<input type="hidden" name="prodCategory" value="<?php echo $cat ?>">
																<input type="hidden" name="prodNewPrice" value="<?php echo $prodPrice ?>">
																<input type="hidden" name="prodOrigPrice" value="<?php echo $oldprodPrice ?>">
																<input type="hidden" name="prodPurchaseNum" value="<?php echo $pnNumber ?>">
																<input type="hidden" name="prodStock" value="<?php echo $stock ?>">
																<input type="hidden" name="prodSize" value="<?php echo $size ?>">
																<input type="hidden" name="prodShop" value="<?php echo $shopName ?>">
																<input type="hidden" name="prodVariation" value="<?php echo $var ?>">
																<input type="hidden" name="prodOptions" value="<?php echo $colors ?>">
																<input type="hidden" name="prodCode" value="<?php echo $prodCode ?>">
																<input type="hidden" name="prodD" value="<?php echo $prodDesc ?>">
																<input type="hidden" name="prodImage" value="<?php echo $imgs ?>">
															    <button type="submit" class="quick-view" style="border: none; background:none"><img src="ECS_ADMIN/<?php echo $imgs ?>" alt="" class="image_tops"></button>
															</div>
														</form>
                                                        <div class="product-label">
                                                            <span class="sale"><?php echo $per ?>%</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category"><?php echo $cat ?></p>
                                                        <h3 class="product-name"><a href="#"><?php echo $pname ?></a></h3>
                                                        <h4 class="product-price"><?php echo '₱ ';
                                                                                    echo $prodPrice;
                                                                                    echo '.00'; ?><del class="product-old-price"><?php echo '₱ ';
                                                                                                                                    echo $oldprodPrice;
                                                                                                                                    echo '.00'; ?></del></h4>
                                                        <hr>
                                                        <form action="login_productInfo.php">
                                                            <div class="product-btns">
                                                                <input type="hidden" name="prodImage" value="<?php echo $imgs ?>">
                                                                <input type="hidden" name="prodName" value="<?php echo $pname ?>">
                                                                <input type="hidden" name="prodPercentage" value="<?php echo $per ?>">
                                                                <input type="hidden" name="prodCategory" value="<?php echo $cat ?>">
                                                                <input type="hidden" name="prodNewPrice" value="<?php echo $prodPrice ?>">
                                                                <input type="hidden" name="prodOrigPrice" value="<?php echo $oldprodPrice ?>">
                                                                <input type="hidden" name="prodPurchaseNum" value="<?php echo $pnNumber ?>">
                                                                <input type="hidden" name="prodStock" value="<?php echo $stock ?>">
                                                                <input type="hidden" name="prodSize" value="<?php echo $size ?>">
                                                                <input type="hidden" name="prodShop" value="<?php echo $shopName ?>">
                                                                <input type="hidden" name="prodVariation" value="<?php echo $var ?>">
                                                                <input type="hidden" name="prodOptions" value="<?php echo $colors ?>">
                                                                <input type="hidden" name="prodCode" value="<?php echo $prodCode ?>">
                                                                <input type="hidden" name="prodD" value="<?php echo $prodDesc ?>">
                                                                <input type="hidden" name="prodImage" value="<?php echo $imgs ?>">9
                                                                <?php echo $pnNumber ?> Sold | View <button type="submit" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="add-to-cart">
														<form action="login_addCart.php" enctype="multipart/form-data">
															<input type="hidden" name="add_prodCode" value="<?php echo $prodCode ?>">
															<input type="hidden" name="add_prodName" value="<?php echo $pname ?>">
															<button class="add-to-cart-btn" type="submit" name="addcart"><i class="fa fa-shopping-cart"></i> add to cart</button>
														</form>
													</div>
                                                </div>
                                            </div>
                                            <!-- /product -->
                                        <?php
                                        } ?>
                                    <?php
                                    } ?>
                                <?php
                                } else {
                                ?>
                                    <center><span style="color: #01D1FF; font-weight:800; font-size:20px">NO TOP SALE</span></center>
                                <?php
                                } ?>

                            </div>
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                            <br><br>
                            <!-- /tab -->


                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- /SECTION -->
    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>Santa Cruz, Laguna</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>buyandsell@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Categories</h3>
							<ul class="footer-links">
								<li><a href="#">Top Selling</a></li>
								<li><a href="#">Hot Deals</a></li>
								<li><a href="#">Daily Discovery</a></li>
								<li><a href="#"></a></li>
								<li><a href="#"></a></li>
							</ul>
						</div>
					</div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Information</h3>
                            <ul class="footer-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Service</h3>
                            <ul class="footer-links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">View Cart</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <!--<div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">-->
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved.
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->
    <!-- Scroll Top Button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>

<script>
    /////////////////// product +/-
    $(document).ready(function() {
        $('.num-in span').click(function() {
            var $input = $(this).parents('.num-block').find('input.in-num');
            if ($(this).hasClass('minus')) {
                var count = parseFloat($input.val()) - 1;
                count = count < 1 ? 1 : count;
                if (count < 2) {
                    $(this).addClass('dis');
                } else {
                    $(this).removeClass('dis');
                }
                $input.val(count);
            } else {
                var count = parseFloat($input.val()) + 1
                $input.val(count);
                if (count > 1) {
                    $(this).parents('.num-block').find(('.minus')).removeClass('dis');
                }
            }

            $input.change();
            return false;
        });

    });
    // product +/-
    $('#productQty').val('1')
    $('#itemNumber').change(function() {
        var itemNumber = $('#itemNumber').val();
        var stockNumber = $('#stockNumber').text();

        if (itemNumber > stockNumber) {
            Swal.fire({
                icon: 'info',
                title: 'Warning!',
                text: 'Item stock is not enough to your desired quantity'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#itemNumber').val('1');
                    $('#productQty').val('1');
                } else {
                    return false;
                }
            });

        } else {
            $('#productQty').val(itemNumber);
        }
    })

    var stockNumber = $('#stockNumber').text();
    if (stockNumber == 0) {
        $('#btn_buy').hide();
    } else {
        $('#btn_buy').show();
    }

    $('#btn_addCart').click(function(e) {
        var productCode = $('#productCode').val();
        var itemNumber = $('#itemNumber').val();
        e.preventDefault();

        $.ajax({
            url: "php/addToCart.php",
            type: "POST",
            data: {
                productCode: productCode,
                itemNumber:itemNumber
            },
            success: function(response) {
                if (response == 0) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully added to cart',
                        text: ''
                    }).then((result) => {
                        if (result.isConfirmed) {
                            return false;
                        } else {
                            return false;
                        }
                    });
                } else {
                    if (response == 1) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Oooops, ITEM OUT OF STOCK',
                            text: 'This item is out of stock and is currently added to your wishlist'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                return false;
                            } else {
                                return false;
                            }
                        });
                    } else {
                        alert(response)
                    }
                }
            }
        })
    })
</script>