<?php
    session_start();
	session_destroy();
	unset($_SESSION['username']);
	foreach($_SESSION["cart_item"] as $k => $v) {
		if($_GET["code"] == $k)
			unset($_SESSION["cart_item"][$k]);				
		if(empty($_SESSION["cart_item"]))
			unset($_SESSION["cart_item"]);
	}
	header('location: login.php');
    exit();
?>