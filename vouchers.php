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
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> buyandsell@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Santa Cruz, Laguna</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li><a href="createAccount.php"><i class="fa fa-user-plus"></i> Sign Up</a></li>
                    <li><a href="SignIn.php"><i class="fa fa-user-o"></i> Login</a></li>
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
                            <a href="#" class="logo mt-3 text-white">
                                <H2 style="color: white;"><span style="color: #01D1FF;">BUY</span> AND <span style="color: #EEFF01;">SELL</span></H2>
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form>
                                <select class="input-select">
                                    <option value="0">All Categories</option>
                                    <option value="1">Category 01</option>
                                    <option value="1">Category 02</option>
                                </select>
                                <input class="input" placeholder="Search here">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="SignIn.php">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <div class="qty">0</div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                    <div class="qty">0</div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="./img/product01.png" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>

                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="./img/product02.png" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>
                                    </div>
                                    <div class="cart-summary">
                                        <small>3 Item(s) selected</small>
                                        <h5>SUBTOTAL: $2940.00</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="#" style="color: white;">View Cart</a>
                                        <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
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
                    <li><a href="index.php#home">Home</a></li>
                    <li><a href="index.php#hot-deal">Hot Deals</a></li>
                    <li><a href="index.php#categories_div">Categories</a></li>
                    <li><a href="index.php#discover_container">Daily Discover</a></li>
                    <li class="active"><a href="vouchers.php">Vouchers</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- SECTION SELLERS PROFILE-->
    <div class="section" id="categories_div">

        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <h3 class="title text-center">Free Shipping Discount</h3><br><br>
                <!-------------- for new uesers only -------------->
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <h3 class="title">New Users only</h3>
                </div>
                <div class="col-md-2"></div>
                <div class="product col-md-8" style="padding: 20px;">
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-2">
                            <div class="product-img" style="height:130px">
                                <img src="assets/images/truck7.png" alt="" class="image_tops">
                            </div>
                        </div>
                        <div class=" col-md-6">

                            <h3>Shipping Discount up to <br> ₱ 80 off</h3>
                            <p>Min. Spend ₱0</p>
                            <br>
                            <SPAN class="text_gray">Valid for 90 Days after claim</SPAN>
                        </div>
                        <div class=" col-md-3">
                            <button class="btn btn-primary" style="float: right;">Claim</button>
                        </div>

                    </div>
                    <!-- /row -->
                </div>
                <div class="col-md-2"></div>
                <!--------------end of new users only -------------->


                <!-- /container -->
            </div>

            <div class="row"> <br>
                <!-------------- free shopping vouvhers-------------->
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <h3 class="title">Free shipping vouchers</h3>
                </div>
                <div class="col-md-2"></div>
                <div class="product col-md-8" style="padding: 20px;">
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-2">
                            <div class="product-img" style="height:130px">
                                <img src="assets/images/truck7.png" alt="" class="image_tops">
                            </div>
                        </div>
                        <div class=" col-md-6">

                            <h3>Shipping Discount up to <br> ₱ 80 off</h3>
                            <p>Min. Spend ₱0</p>
                            <br>
                            <SPAN class="text_gray">Valid until 2023/10/01</SPAN>
                        </div>
                        <div class=" col-md-3">
                            <button class="btn btn-primary" style="float: right;">Claim</button>
                        </div>

                    </div>
                    <!-- /row -->
                </div>
                <div class="col-md-2"></div>
                <!--------------end of new users only -------------->


                <!-- /container -->
            </div>
            <!-- /SECTION -->

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
                                <div id="tab3" class="tab-pane fade in active">
                                    <div class="products-slick" data-nav="#slick-nav-2">
                                        <!-- product 1-->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/dress1.jpg" alt="" class="image_tops">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">DRESS</p>
                                                <h3 class="product-name"><a href="#">Floral Summer Dress for women</a></h3>
                                                <h4 class="product-price">₱ 780.00</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    10 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product2 -->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/ft1.jpg" alt="" class="image_tops">
                                                <div class="product-label">
                                                    <span class="sale">-50%</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">SHOES</p>
                                                <h3 class="product-name"><a href="#">New Air Force Sneakers Outdoor Fashion</a></h3>
                                                <h4 class="product-price">₱ 1999.00 <del class="product-old-price">₱ 3999.00</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    20 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        <!-- /product -->

                                        <!-- product 3-->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/dress6.png" alt="" class="image_tops">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">DRESS</p>
                                                <h3 class="product-name"><a href="#">Classy and Elegant Casual Pia Dress</a></h3>
                                                <h4 class="product-price">₱ 2780.00</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    10 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product 4-->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/men1.jpg" alt="" class="image_tops">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Tops</p>
                                                <h3 class="product-name"><a href="#">New restock Dry-fit T-shirts For Active Sports</a></h3>
                                                <h4 class="product-price">₱ 780.00</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    10 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                    </div>
                                    <div id="slick-nav-2" class="products-slick-nav"></div>
                                </div>
                                <br><br>
                                <!-- /tab -->
                                <!--2nd row tab -->
                                <div id="tab4" class="tab-pane fade in active">
                                    <div class="products-slick" data-nav="#slick-nav-2">
                                        <!-- product 1-->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/dress1.jpg" alt="" class="image_tops">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">DRESS</p>
                                                <h3 class="product-name"><a href="#">Floral Summer Dress for women</a></h3>
                                                <h4 class="product-price">₱ 780.00</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    10 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product2 -->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/ft1.jpg" alt="" class="image_tops">
                                                <div class="product-label">
                                                    <span class="sale">-50%</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">SHOES</p>
                                                <h3 class="product-name"><a href="#">New Air Force Sneakers Outdoor Fashion</a></h3>
                                                <h4 class="product-price">₱ 1999.00 <del class="product-old-price">₱ 3999.00</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    20 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        <!-- /product -->

                                        <!-- product 3-->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/dress6.png" alt="" class="image_tops">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">DRESS</p>
                                                <h3 class="product-name"><a href="#">Classy and Elegant Casual Pia Dress</a></h3>
                                                <h4 class="product-price">₱ 2780.00</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    10 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product 4-->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/men1.jpg" alt="" class="image_tops">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Tops</p>
                                                <h3 class="product-name"><a href="#">New restock Dry-fit T-shirts For Active Sports</a></h3>
                                                <h4 class="product-price">₱ 780.00</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    10 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                    </div>
                                    <div id="slick-nav-2" class="products-slick-nav"></div>
                                </div>
                                <br><br>
                                <!-- /tab -->
                                <!--1st row tab -->
                                <div id="tab5" class="tab-pane fade in active">
                                    <div class="products-slick" data-nav="#slick-nav-2">
                                        <!-- product 1-->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/dress1.jpg" alt="" class="image_tops">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">DRESS</p>
                                                <h3 class="product-name"><a href="#">Floral Summer Dress for women</a></h3>
                                                <h4 class="product-price">₱ 780.00</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    10 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product2 -->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/ft1.jpg" alt="" class="image_tops">
                                                <div class="product-label">
                                                    <span class="sale">-50%</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">SHOES</p>
                                                <h3 class="product-name"><a href="#">New Air Force Sneakers Outdoor Fashion</a></h3>
                                                <h4 class="product-price">₱ 1999.00 <del class="product-old-price">₱ 3999.00</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    20 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        <!-- /product -->

                                        <!-- product 3-->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/dress6.png" alt="" class="image_tops">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">DRESS</p>
                                                <h3 class="product-name"><a href="#">Classy and Elegant Casual Pia Dress</a></h3>
                                                <h4 class="product-price">₱ 2780.00</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    10 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product 4-->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/men1.jpg" alt="" class="image_tops">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Tops</p>
                                                <h3 class="product-name"><a href="#">New restock Dry-fit T-shirts For Active Sports</a></h3>
                                                <h4 class="product-price">₱ 780.00</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    10 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                    </div>
                                    <div id="slick-nav-2" class="products-slick-nav"></div>
                                </div>
                                <br><br>
                                <!-- /tab -->
                                <!--4rth row  tab -->
                                <div id="tab6" class="tab-pane fade in active">
                                    <div class="products-slick" data-nav="#slick-nav-2">
                                        <!-- product 1-->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/dress1.jpg" alt="" class="image_tops">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">DRESS</p>
                                                <h3 class="product-name"><a href="#">Floral Summer Dress for women</a></h3>
                                                <h4 class="product-price">₱ 780.00</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    10 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product2 -->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/ft1.jpg" alt="" class="image_tops">
                                                <div class="product-label">
                                                    <span class="sale">-50%</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">SHOES</p>
                                                <h3 class="product-name"><a href="#">New Air Force Sneakers Outdoor Fashion</a></h3>
                                                <h4 class="product-price">₱ 1999.00 <del class="product-old-price">₱ 3999.00</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    20 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        <!-- /product -->

                                        <!-- product 3-->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/dress6.png" alt="" class="image_tops">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">DRESS</p>
                                                <h3 class="product-name"><a href="#">Classy and Elegant Casual Pia Dress</a></h3>
                                                <h4 class="product-price">₱ 2780.00</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    10 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product 4-->
                                        <div class="product">
                                            <div class="product-img" style="height:180px">
                                                <img src="img/men1.jpg" alt="" class="image_tops">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Tops</p>
                                                <h3 class="product-name"><a href="#">New restock Dry-fit T-shirts For Active Sports</a></h3>
                                                <h4 class="product-price">₱ 780.00</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    10 sold | Santa Cruz, Laguna
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="productInfo.php">
                                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-eye"></i>QUICK VIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                    </div>
                                    <div id="slick-nav-2" class="products-slick-nav"></div>
                                </div>
                                <br><br>
                                <!-- /tab -->


                            </div>
                            <div class="mt-4 mb-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <center>
                                            <a href="#" class="btn btn-primary">VIEW ALL</a>
                                        </center>
                                    </div>
                                </div>
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
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="footer-payments">
                                <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                                <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                                <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                                <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                                <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                                <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                            </ul>
                            <span class="copyright">
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
</script>