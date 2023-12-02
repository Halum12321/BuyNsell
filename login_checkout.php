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
					<li><a href="login_orders.php">My Orders</a></li>
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
					<h3 class="breadcrumb-header">Checkout</h3>
					<ul class="breadcrumb-tree">
						<li><a href="Buyer_index.php">Home</a></li>
						<li class="active">Checkout</li>
					</ul>
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

				<div class="col-md-7">






					<!-- Billing Details -->
			
					
					<div class="billing-details">
						
						<div class="section-title">
							<h3 class="title">Delivery address</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" readonly name="first-name" id="first-name" value="<?php echo $_SESSION['FIRST_NAME'] ?>" placeholder="First Name">
						</div>
						<div class="form-group">
							<input class="input" type="text" readonly name="last-name" id="last-name" value="<?php echo $_SESSION['LAST_NAME'] ?>" placeholder="Last Name">
						</div>
						<div class="form-group">
							<input class="input" type="email" name="email" id="email" value="<?php echo $_SESSION['EMAIL_ADD'] ?>" placeholder="Email">
						</div>

						<div class="form-group">
							<input class="input" type="text" name="city" id="city" readonly="City" value="<?php echo $_SESSION['ADDRESS_CITY'] ?>" placeholder="Sta Cruz Laguna">
						</div>

						
						<div class="form-group">
							<input class="input" type="text" name="street" id="street" placeholder="street" value="<?php echo $_SESSION['ADDRESS_OTHERS'] ?>" placeholder="Street">
						</div>

						<div class="form-group">
							<input class="input" type="text" name="#" id="brgy" readonly placeholder="Barangay" value="" placeholder="Barangay">
							<?php
								// Assuming $con is your database connection
								$selectedBrgy = isset($_POST['brgy']) ? htmlspecialchars($_POST['brgy']) : '';

								?>

								<select name="regbrgy" id="regbrgy" class="form-control">
									<option value="<?php echo $selectedBrgy; ?>" selected><?php echo $selectedBrgy; ?></option >

									<?php
									$sql = "SELECT * FROM address_reference";
									$res = mysqli_query($con, $sql);

									while ($row = mysqli_fetch_assoc($res)) {
										$barangayValue = htmlspecialchars($row['BARANGGAY']);
										echo '<option value="' . $barangayValue . '">' . $barangayValue . '</option>';
									}
									?>
								</select>
						</div> 
					

						<div class="form-group">
							<input class="input" type="text" name="country" id="country" readonly placeholder="Country" value="Philippines">
						</div>
						<div class="form-group">
							<input class="input" type="tel" name="tel" id="tel" placeholder="Phone Number" value="">
						</div>
					</div>
				</div>










				<!-- Order Details -->
				<div class="col-md-5 order-details">
					<div class="section-title text-center">
						<h3 class="title">Your Order</h3>
					</div>
					<div class="order-summary">
						<div class="order-col">
							<div><strong>PRODUCT</strong></div>
							<div><strong>TOTAL</strong></div>
						</div>
						<div class="order-products">
							<div class="order-col">
								<div><span id="prodQty"><?php echo $_REQUEST['productQty']; ?></span>x <span id="prodNames"><?php echo $_REQUEST['productName']; ?></span></div>
								<div>₱<span id="priceItem"></span>.00</div>
							</div>
						</div>
						<div class="order-col">
							<div>Shiping</div>
							<div><strong>FREE</strong></div>
						</div>
						<div class="order-col">
							<div><strong>TOTAL</strong></div>
							<div><strong class="order-total">₱<span id="totalPurchase"></span>.00</strong></div>
						</div>
					</div>
					<div class="payment-method">
						<div class="row">
							<div class="col-md-6">
								MODE OF PAYMENT:
							</div>
							<div class="col-md-6">
								<div class="input-radio">
									<input type="radio" name="payment" id="payment-1">
									<label for="payment-1">
										<span></span>
										CASH ON DELIVERY
									</label>
									<div class="caption">
										<p>Cash on Delivery (COD) payment terms require customers to pay for their orders in cash at the time of delivery, ensuring payment is made only upon receipt of the goods.</p>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="input-checkbox">
						<input type="checkbox" id="terms">
						<label for="terms">
							<span></span>
							I've read and accept the <a href="#">terms & conditions</a>
						</label>
					</div>
					<center><button id="btnCheckout" class="primary-btn order-submit">Place order</button> </center>
				</div>
				<!-- /Order Details -->
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
<input type="hidden" id="qty_sent" value="<?php echo $_REQUEST['productQty'] ?>">
<input type="hidden" id="price_sent" value="<?php echo $_REQUEST['productPrice'] ?>">
<input type="hidden" id="prodcode_sent" value="<?php echo $_REQUEST['productCode'] ?>">
<input type="hidden" id="prodshop_sent" value="<?php echo $_REQUEST['productShop'] ?>">
<input type="hidden" id="productImage" value="<?php echo $_REQUEST['productImage'] ?>">
<script>
	var qty_sent = $('#qty_sent').val();
	var price_sent = $('#price_sent').val();
	var totalItem = qty_sent * price_sent;
	$('#priceItem').text(totalItem);
	$('#totalPurchase').text(totalItem);

	$('#btnCheckout').click(function() {
		var fname = $('#first-name').val();
		var lname = $('#last-name').val();
		var email = $('#email').val();
		var street = $('#street').val();
		var brgy = $('#brgy').val();
		var city = $('#city').val();
		var tel = $('#tel').val();
		var prodQty = $('#prodQty').text();
		var prodNames = $('#prodNames').text();
		var priceItem = $('#priceItem').text();
		var totalPurchase = $('#totalPurchase').text();
		var prodcode_sent = $('#prodcode_sent').val();
		var prodshop_sent = $('#prodshop_sent').val();
		var productImage = $('#productImage').val();

		if ($('input[type="radio"]:not(:checked').length > 0) {
			alert('Please select payment method');
		} else {
			if ($('input[type="checkbox"]:not(:checked').length > 0) {
				alert('Please check terms and condition if you wish to continue');
			} else {
				$.ajax({
					url: "php/checkout_perpiece.php",
					type: "POST",
					data: {
						fname: fname,
						lname: lname,
						email: email,
						street: street,
						brgy: brgy,
						city: city,
						tel: tel,
						prodQty: prodQty,
						prodNames: prodNames,
						priceItem: priceItem,
						totalPurchase: totalPurchase,
						prodcode_sent: prodcode_sent,
						prodshop_sent: prodshop_sent,
						productImage:productImage
					},
					success: function(response) {
						if (response == 0) {
							location.href = "login_orders.php"
						} else {
							if (response == 1) {
								Swal.fire({
									icon: 'info',
									title: 'Oooops, something went wrong',
									text: 'This user is already registered.'
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
			}
		}
	})
</script>