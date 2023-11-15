<?php
    if($_SESSION['username']=="admin"){
        ?>
            <!--<div class="navbar">-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"><h3>
                    <li class="nav-item"><a class="nav-link" href="admin.php">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="orderlist.php">View Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="translist.php">Transactions</a></li>
                    <li class="nav-item"><a class="nav-link" href="userlist.php">Users</a></li>
	                <li class="nav-item"><a class="nav-link" href="logout.php" style="float:right">Logout</a><li>
                </ul>
	        </div>
        
        <?php
    }else if($_SESSION['username']){
        ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"><h3>
                    <li class="nav-item"><a class="nav-link" href="user.php">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="orderlist.php">Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php" style="float:right">Logout</a><li>
        	    </ul>
	        </div>
        <?php
    }

?>