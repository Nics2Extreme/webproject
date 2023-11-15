<?php
    include('php/addItems.php');
    if(!isset($_SESSION['username'])){
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
        <?php include('php/nav.php')?><br>
        <div class="titletxt">&nbsp;&nbsp;Welcome, <?php echo $_SESSION['username'];?>!</div>
        <div id="shopping-cart">
            <div class="txt-heading"><h1>Shopping Cart</h1></div>
            <br>
            <a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
            <?php
            if(isset($_SESSION["cart_item"])){
                $total_quantity = 0;
                $total_price = 0;
            ?>	
            <br><br><br>
            <table class="tbl-cart" cellpadding="10" cellspacing="1">
                <tbody>
                    <tr>
                        <th style="text-align:left;">Name</th>
                        <th style="text-align:left;">Code</th>
                        <th style="text-align:right;" width="5%">Quantity</th>
                        <th style="text-align:right;" width="10%">Unit Price</th>
                        <th style="text-align:center;" width="10%">Price</th>
                        <th style="text-align:center;" width="5%">Remove</th>
                    </tr>	
            <?php
                foreach ($_SESSION["cart_item"] as $item){
                    $item_price = $item["quantity"]*$item["price"];
		    ?>
				    <tr>
				        <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				        <td><?php echo $item["code"]; ?></td>
				        <td style="text-align:center;"><?php echo $item["quantity"]; ?></td>
				        <td style="text-align:left;"><?php echo "₱ ".$item["price"]; ?></td>
				        <td style="text-align:centers;"><?php echo "₱ ". number_format($item_price,2); ?></td>
				        <td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="product-images/icon-delete.png" alt="Remove Item" /></a></td>
				    </tr>
		    <?php
			    $total_quantity += $item["quantity"];
			    $total_price += ($item["price"]*$item["quantity"]);
		    }
		    ?>

                    <tr>
                        <td colspan="2" align="right">Total:</td>
                        <td align="center"><?php echo $total_quantity;?></td>
                        <td align="left" colspan="2"><strong><?php echo "₱ ".number_format($total_price, 2);  $_SESSION['total_price'] = $total_price;?></strong></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <form method="post" action="">
                <button type="submit" class="btnAddAction" name="confirm">Confirm</button>
            </form>    
            <?php
                if(isset($_POST['confirm'])){ 
                    echo "<script>window.location.href='transaction.php'</script>";
                }
            
            }else {
            ?>
                <br><br><br><br><br><br><br>
                <div class="no-records">Your Cart is Empty</div>
            <?php
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
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  </body> 
    </body>
</html>