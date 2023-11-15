<?php
    session_start();
    if(!isset($_SESSION['username'])){
		echo "Log in first";
		header('location: login.php');
	}
?>

<html>
<head>
    <title>Chef Food - User</title>
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
    <?php include('php/nav.php')?>
    <?php include('transcript.php')?>
    <br><br><center>
    <div class="receipt">
        <br>
        <div class = "titletxt">Order Receipt</div>
    <?php
        foreach ($_SESSION["cart_item"] as $item){
            $item_price = $item["quantity"]*$item["price"];?><br>
            Item: <?php echo $item["code"]; ?><br>
            Amount: <?php echo $item["quantity"]; ?><br>
            Price: <?php echo "$". number_format($item_price,2); ?><hr>
    <?php
        } ?>Total Price: <strong><?php echo "$".$_SESSION['total_price'];
	?></strong>
    <br><br>
    <h3>Customer Name: <?php echo $_SESSION['username'];?></h3>
    <h3>Contact Number: 09*********</h3>
    </div>
    <br><br><br><br><br>
        <form method="POST">
            <button name="submit" class="btnAddAction" style = "float:left;">< Checkout Order</button>    
        </form>
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
</body>
</html>