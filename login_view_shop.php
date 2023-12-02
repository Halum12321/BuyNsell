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
					<?php	}else{
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
							<a href="#" class="logo mt-3 text-white">
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
					<li><a href="index.php#home">Home</a></li>
					<li><a href="index.php#hot-deal">Hot Deals</a></li>
					<li><a href="index.php#discover_container">Daily Discover</a></li>
					<li><a href="login_orders.php">My Orders</a></li>
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
                <div class="product col-md-3" style="border: 1px solid #EEFF01; padding:18px">
                    <div class="row">
                        <div style=" background-color:white; padding:5px">
                            <h2 class="" style="margin-top:50px"><?php echo $_REQUEST['pShop'] ?></h2>
                            <span class="text_gray"><?php
                                                    $pc = $_REQUEST['pShop'];
                                                    $sqliMain2 = "SELECT * from sellers_information WHERE SHOP_NAME = '$pc'";
                                                    $resultMain2 = mysqli_query($con, $sqliMain2);
                                                    $rowMain2 = mysqli_fetch_array($resultMain2);
                                                    if ($resultMain2->num_rows > 0) {
                                                        if (is_array($rowMain2)) {
                                                            echo $rowMain2['REGISTERED_NAME'];
                                                            echo '<br>';
                                                            echo $rowMain2['PHONE_NUMBER'];
															echo '<br>';
															echo $rowMain2['EMAIL'];
                                                        }
                                                    } else {
                                                    }

                                                    ?></span><br> <br>
                        </div>
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
                            $pc = $_REQUEST['pShop'];
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
                            $pc = $_REQUEST['pShop'];
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
                            $pc = $_REQUEST['pShop'];
                            $sqliMain2 = "SELECT * from sellers_information WHERE SHOP_NAME = '$pc'";
                            $resultMain2 = mysqli_query($con, $sqliMain2);
                            $rowMain2 = mysqli_fetch_array($resultMain2);
                            if ($resultMain2->num_rows > 0) {
                                if (is_array($rowMain2)) {
                                    echo $rowMain2['RA_OTHERS'];
                                    echo $rowMain2['RA_BRGY'];
                                    echo $rowMain2['RA_CITY'];
                                    echo $rowMain2['RA_REGION_PROVINCE'];
									echo '<br>';
                                }
                            } else {
                            }

                            ?>
							<br>
                        </div>
                    </div>
                    
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
	<!-- SECTION sales item-->
	<div class="section" id="topSale_container">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title"><?php echo $_REQUEST['pShop']?> ITEM</h3>
						<hr style="border: 3px solid #EEFF01;border-radius: 5px;">
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
								$shops = $_REQUEST['pShop'];
								$query22 = "SELECT * FROM registered_product WHERE SHOP_NAME = '$shops' ORDER BY PRODUCT_NAME ASC";
								$resultTableH22 = mysqli_query($con, $query22);
								?>
								<?php
								if (mysqli_num_rows($resultTableH22) > 0) {
								?>
									<?php
									while ($row22 = mysqli_fetch_array($resultTableH22)) {
										$per = $row22['PERCENTAGE_NUM'];
										$imgs = $row22['MAIN_PRODUCT_IMAGE'];
										$cat = $row22['CATEGORY'];
										$pname = $row22['PRODUCT_NAME'];
										$prodPrice = $row22['SPRICE'];
										$oldprodPrice = $row22['OPRICE'];
										$pnNumber = $row22['PURCHASE_NUMBER'];
										$stock = $row22['STOCK'];
										$size = $row22['SIZE'];
										$shopName = $row22['SHOP_NAME'];
										$var = $row22['VARIATION'];
										$colors = $row22['OPTIONS'];
										$prodCode = $row22['PRODUCT_CODE'];
										$prodDesc = $row22['PRODUCT_DESCRIPTION'];
									?>
										<?php
										if ($per == 0) {
										?>
											<!-- product with no discount-->
											<div class="col-md-3 mx-3" style="padding-bottom: 60px;margin-bottom: -60px;z-index: 2;">
												<div class="product">
													<div class="product-img" style="height: 260px;">
													<form action="login_productInfo.php">
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
										} ?>
									<?php
									} ?>
								<?php
								} else {
								?>
									<center><span style="color: #01D1FF; font-weight:800; font-size:20px">NO FOUND ITEM</span></center>
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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>


?>