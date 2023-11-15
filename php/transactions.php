<?php
$db_handle = new DBController();
$username = $_SESSION['username'];
$orders = $db_handle->runQuery("SELECT * FROM transactions ORDER BY tid DESC");
if (!empty($orders)) {
    foreach ($orders as $key => $value) {
        if ($orders[$key]['order_status'] == 3) {
            if (!empty($orders)) {
                $_SESSION['orderid'] = $orders[$key]["tid"];
?>
                <br>
                <div class="order">
                    <div class="details">
                        <div class="product-details"><?php echo "<b>Transaction No: </b>" . $orders[$key]["tid"]; ?></div>
                        <div class="product-details"><?php echo "<b>Customer Name: </b>" . $orders[$key]["cusname"]; ?></div>
                        <b>Order Status: </b>
                        <div class="product-details" style="color: #00FF00;"><b>Completed</b></div>
                    </div>
                    <div class="actions">
                        <a class="orderinfo" href="orderdetails.php?id=<?php echo $orders[$key]['tid']; ?>">See Order Details</a>
                    </div>
                </div>
                <br>
                <hr>
            <?php
            }
        } else if ($orders[$key]['order_status'] == 2) {
            if (!empty($orders)) {
                $_SESSION['orderid'] = $orders[$key]["tid"];
            ?>
                <br>
                <div class="order">
                    <div class="details">
                        <div class="product-details"><?php echo "<b>Transaction No: </b>" . $orders[$key]["tid"]; ?></div>
                        <div class="product-details"><?php echo "<b>Customer Name: </b>" . $orders[$key]["cusname"]; ?></div>
                        <b>Order Status: </b>
                        <div class="product-details" style="color: #FF0000;"><b>Cancelled</b></div>
                    </div>
                    <div class="actions">
                        <a class="orderinfo" href="orderdetails.php?id=<?php echo $orders[$key]['tid']; ?>">See Order Details</a>
                    </div>
                </div>
                <hr>
<?php
            }
        }
    }
} else {
    echo "No active transactions.";
}
?>