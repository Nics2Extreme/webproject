<?php
    session_start();
    require_once("php/dbcontroller.php");
    if(!isset($_SESSION['username'])){
		echo "Log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <title>Chef Food - Order</title>
    <style>
 		<?php include "css/navbar.css";
              include "css/style.css"; ?>
	</style>
</head>
<body>
    <div class="container">
        <?php include('php/nav.php')?><br>
        <div class="titletxt">&nbsp;&nbsp;Welcome, <?php echo $_SESSION['username'];?>!</div>
        <div class="transactions">
        <div id="product-grid">
            <div class="txt-heading"><h1>Order Details</h1></div>
                <div class="details">
                    <table class="tbl-details" cellpadding="8" cellspacing="1">
                        <tbody>
                            <tr>
                                <th style="text-align:center;">Item Name</th>
                                <th style="text-align:center;" width="25%">Quantity</th>
                                <th style="text-align:center;" width="25%">Unit Price</th>
                                <th style="text-align:center;" width="25%">Price</th>
                            </tr>
                            <?php include('php/details.php')?>
                            <tr>
                                <td colspan="3" align="right"><strong>Total:</strong></td>
                                <td align="center"><strong><?php echo $order[$key]['total'];?></strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="left"><strong>Customer Name: </strong><?php echo $order[$key]['cusname'];?></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="left"><strong>Contact Number: </strong>09*********</td>
                            </tr>
                            <tr>
                                <td colspan="4" align="left"><strong>Date of Order: </strong><?php echo $order[$key]['tdate'];?></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="left"><strong>Order Status: </strong>
                                    <?php 
                                        if($order[$key]['order_status']==1){ echo "<p style='color: #FABD02;'>Pending</p>";}
                                        else if($order[$key]['order_status']==2){ echo "<p style='color: #FF0000;'>Cancelled</p>";}
                                        else if($order[$key]['order_status']==3){ echo "<p style='color: #006400;'>Completed</p>";}
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
</body>
</html>