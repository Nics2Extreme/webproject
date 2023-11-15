<?php
  session_start();
	if(!isset($_SESSION['username'])){
		echo "Log in first";
		header('location: login.php');
	}
?>

<!DOCTYPE html>
<html>
  <head>
  <title>Chef Food - Admin</title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
      <?php include('php/nav.php')?><br>
      <div class="titletxt">&nbsp;&nbsp;Welcome, <?php echo $_SESSION['username'];?>!</div><br>
      <div id="addItems">
        <form method="POST" action="" enctype="multipart/form-data" class="form">
        <?php include('php/adminAddItems.php');?>
        <br><div class="titletxt">Add to Menu</div><br>
          
          <div class="input-group">
            <input type="text" name="name" value="" placeholder = "Dish Name"><br>
          </div>
          <div class="input-group">
            <input type="text" name="code" value="" placeholder = "Meal Code"><br>
          </div> 
          <div class="input-group">
            <input type="text" name="price" value="" placeholder = "Input Price"><br>
          </div>

          <br>
          <input type="file" name="uploadfile" value=""/><br><br>
          <button type="submit" name="upload" class="button">UPLOAD</button>
        </form>
      </div>

      <div id="product-grid">
		<div class="txt-heading"><h1>Menu List</h1></div>
		<?php
		$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
		if (!empty($product_array)) {
			foreach($product_array as $key=>$value){
		?>
			<div class="product-item">
				<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
				<div class="product-tile-footer">
				<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
				<div class="product-price"><?php echo "₱".$product_array[$key]["price"]; ?></div><br><br>
        <div class="product-status"><?php echo $product_array[$key]["item_status"]; ?></div>
				<div class="cart-action"><a class="buttoncart" href="editItemPage.php?code=<?php echo $product_array[$key]['code']?>">Edit</a></div>
				</div>
			</div>
		<?php
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