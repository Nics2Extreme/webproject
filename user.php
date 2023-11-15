<?php
include('php/addItems.php');
if (!isset($_SESSION['username'])) {
	echo "Log in first";
	header('location: login.php');
}
?>

<html>

<head>
	<title>Chef Food - User</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

	<style>
		<?php
		include "css/navbar.css";
		include "css/style.css";
		?>
	</style>
</head>

<body>
	<div class="container">
		<?php include('php/nav.php') ?><br><br>
		<div class="titletxt">&nbsp;&nbsp;Welcome, <?php echo $_SESSION['username']; ?>!</div>
		<div id="product-grid">
			<div class="txt-heading">
				<h1>Products</h1>
			</div>
			<?php
			$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
			if (!empty($product_array)) {
				foreach ($product_array as $key => $value) {
					if ($product_array[$key]['item_status'] == 'Enabled') {
			?>
						<div class="product-item">
							<form method="post" action="user.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
								<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
								<div class="product-tile-footer">
									<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
									<div class="product-price"><?php echo "₱" . $product_array[$key]["price"]; ?></div><br><br><br>
									<div class="product-price">
										<p>QTY</p>
									</div><br><br><br>
									<div class="cart-action"><input type="text" name="quantity" value="1" size="2" class="product-quantity" /><input type="submit" class="buttoncart" name="addToCart" value="Add to Cart" class="btnAddAction" /></div>
									<?php
									if (isset($_POST['addToCart'])) {
										echo "<script>swal('Added to Cart!');</script>";
									}
									?>
							</form>
						</div>
		</div>
<?php
					}
				}
			}
?>
	</div>
	</div>
	<br><br>
	<hr>
	<div class="footer-basic">
		<footer>
			<div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
			<ul class="list-inline">
				<li class="list-inline-item"><a href="#"><b>Services</a></li>
				<li class="list-inline-item"><a href="#">About Us</a></li>
				<li class="list-inline-item"><a href="#">Terms & Conditions</a></li>
				<li class="list-inline-item"><a href="#">Privacy Policy</b></a></li>
			</ul>
			<br>
			<p class="copyright">Chef Food's Kitchen © 2023</p>
		</footer>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>