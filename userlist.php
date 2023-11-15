<?php
    session_start();
    require_once("php/dbcontroller.php");
    if(!isset($_SESSION['username'])){
		echo "Log in first";
		header('location: login.php');
	}
?>
<html>
<head>
    <title>Chef Food - Admin</title>
    <style>
    </style>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <style>
 		<?php include "css/navbar.css" ?>
         <?php include "css/style.css" ?>
	</style>
</head>
<body>
    <div class="container">
        <?php include('php/nav.php')?><br>
        <div class="titletxt">&nbsp;&nbsp;Welcome, <?php echo $_SESSION['username'];?>!</div>
        <div class="userlist">
        <div id="product-grid">
            <div class="txt-heading"><h1>User Lists</h1></div>
                <?php include ("php/loaduserlist.php")?>
            </div>
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