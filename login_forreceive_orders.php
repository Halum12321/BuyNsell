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

	<title>BUY & SELL</title>
	<link href="assets/images/buyAndSell.png" rel="icon">
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
					<li><a href="Buyer_index.php#discover_container">Daily Discover</a></li>
					<li class="active"><a href="login_orders.php">My Orders</a></li>
				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">MY ORDER</h3>
					<ul class="breadcrumb-tree">
						<li class="active"><a href="login_orders.php">To Pay</a></li>
						<li><a href="login_forship_orders.php">To Ship</a></li>
						<li><a href="login_forreceive_orders.php" style="font-weight:bold; color:maroon">To Receive</a></li>
						<li><a href="login_completed_orders.php">Completed</a></li>
						<li><a href="login_cancelled_orders.php">Cancelled</a></li>
						<li><a href="login_returned_orders.php">Returned</a></li>
					</ul>

					<?php
					$firstName = $_SESSION['FIRST_NAME'];
					$lastName = $_SESSION['LAST_NAME'];
					$query2 = "SELECT * FROM purchase_basket WHERE PURCHASED_BY = '$firstName $lastName' AND STATUS = 'To Receive' ORDER BY DATE_PURCHASED DESC, TIME_PURCHASED DESC";
					$resultTableH2 = mysqli_query($con, $query2);
					?>
					<?php
					if (mysqli_num_rows($resultTableH2) > 0) {
					?>
						<?php
						while ($row = mysqli_fetch_array($resultTableH2)) {
							$shop = $row['SHOP'];
							$pname = $row['PRODUCT_NAME'];
							$prodPrice = $row['ITEM_PRICE'];
							$prodQty = $row['QTY'];
							$prodTotal = $row['TOTAL_PURCHASE'];
							$prodDate = $row['DATE_PURCHASED'];
							$prodTime = $row['TIME_PURCHASED'];
							$prodCode = $row['PRODUCT_CODE'];
							$prodAddress = $row['DELIVERY_ADDRESS'];
							$prodEmail = $row['EMAIL'];
							$prodPnumber = $row['PHONE_NUMBER'];
							$prodStatus = $row['STATUS'];
							$purchasedBy = $row['PURCHASED_BY'];
							$prodImage = $row['ITEM_IMAGE'];
							$prodCode = $row['PRODUCT_CODE'];
						?>

							<div class="row" style="margin-top: 30px;">
								<div class="col-md-12">

									<div class="card" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; padding:10px">
										<b><i class="fa fa-map-pin"></i> Delivery Address</b> <br>
										<span id="name"><?php echo $purchasedBy; ?></span>
										<p><?php echo $prodPnumber; ?></p>
										<p><?php echo $prodAddress; ?></p>
									</div>
									<br>
									<div class="card mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; padding:10px">
										<div class="row mt-3">
											<div class="col-md-6" style="margin-top: 10px;">
												<b><i class="fa fa-home"></i> <?php echo $shop; ?></b> <br>
											</div>
											<div class="col-md-6">
												<form action="login_view_shop.php">
													<input type="hidden" name="pShop" value="<?php echo $shop ?>">
													<button style="float: right;" class="btn btn-outline-dark">Visit Shop ></button>
												</form>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-3">
												<img src="ECS_ADMIN/<?php echo $prodImage; ?>" alt="" width="150px">
											</div>
											<div class="col-md-9">
												<span id="name"><?php echo $pname; ?></span>
												<p>x2 ......................................................................................................... ₱<span><?php echo $prodPrice; ?></span>.00</p>
												<hr>
												<p style="font-weight: bold;">Order Total: ₱ <span><?php echo $prodPrice; ?></span> .00</p>
												<hr>
												Order Time: <span><?php echo $prodDate; ?> | <?php echo $prodTime; ?></span> <br>
												Status: <span><?php echo $prodStatus; ?></span> <br>

												<hr>
												<?php
												if ($prodStatus == 'To Receive') {
												?>
													<div class="row">
														<div class="col-md-6">
															<form action="login_received.php">
																<input type="hidden" name="pcode" value="<?php echo $prodCode; ?>">
																<input type="hidden" name="pnamed" value="<?php echo $pname; ?>">
																<input type="hidden" name="pQty" value="<?php echo $prodQty; ?>">
																<button class="btn btn-success col-md-12" id="">ORDER RECEIVED</button>
															</form>
														</div>
														<div class="col-md-6">
															<form action="login_return.php">
																<input type="hidden" name="pcode" value="<?php echo $prodCode; ?>">
																<input type="hidden" name="pnamed" value="<?php echo $pname; ?>">
																<input type="hidden" name="pQty" value="<?php echo $prodQty; ?>">
																<button class="btn btn-outline-danger col-md-12 mt-3" id="">RETURN ITEM</button>
															</form>
														</div>
													</div>


												<?php
												} else {
												?>
												<?php
												}  ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php
						} ?>
					<?php
					} else {
					?>
						<center><span style="color: #01D1FF; font-weight:800; font-size:20px">NO ITEM RECEIVED</span></center>
					<?php
					} ?>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-12">
					<!-- Billing Details -->

				</div>

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
	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>