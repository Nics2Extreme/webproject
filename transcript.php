<?php
require_once("php/dbcontroller.php");
date_default_timezone_set('Asia/Manila');
$db_handle = new DBController();
$username = $_SESSION['username'];
$price = $_SESSION['total_price'];
$status = "";
$items = [];
$quantities = [];
$datetime = date('Y-m-d h:i:s');
if(isset($_POST['submit'])){
    if(isset($_SESSION['cart_item'])){
        foreach ($_SESSION['cart_item'] as $item){
            array_push($items, $item['code']);
            array_push($quantities, $item['quantity']);
        }
    }
    $item = json_encode($items);
    $quantity = json_encode($quantities);
    $status = 1;
    $db_handle->storeDetails($username, $item, $quantity, $price, $datetime, $status);
    unset($_SESSION['cart_item']);
    echo "<script>window.location.href='orderlist.php'</script>";
}
?>