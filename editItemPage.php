<?php
    session_start();   
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
    <title>Chef Food - Admin</title>
    <style>
        <?php include "css/navbar.css";
		          include "css/style.css"; ?>
    </style>
</head>
<body>
    <div class="container">
        <?php include 'php/nav.php'?>
        <br><br>
        <div class="edit">
        <form method="POST" action="" enctype="multipart/form-data" class="formedit">
        <?php include('php/editItem.php');
        if(isset($_SESSION["cart_item"])){
            foreach ($_SESSION["cart_item"] as $item){ ?>
        <?php    }
        } ?>
          <div class = "titletxt">Edit Item</div>
          <br>
          <div class="input-group">
          <label>Dish Name</label>
          <input type="text" name="name" value="<?php echo $item['name'];?>"></div><br>

          <div class="input-group">
          <label>Selling Price</label>
          <input type="text" name="price" value="<?php echo $item['price'];?>"></div><br>

          <label for="status">Status </label>
          <select name="status" id="status">
            <option value="Enabled">Enabled</option>
            <option value="Disabled">Disabled</option>
          </select><br><br>
          <img src="<?php echo $item['image']?>" alt=""><br><br>

          <input type="hidden" id="image" name="image" value="default.png">
          <input type="file" name="uploadfile" value=""/><br><br><br>
       
          <button type="submit" name="upload" class="button">UPLOAD</button>
        </form>
        </div>
    </div>
    <br><br>
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