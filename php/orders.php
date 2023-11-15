<?php
$db_handle = new DBController();
$username = $_SESSION['username'];
//For admin
if ($_SESSION['username'] == 'admin') {
    $orders = $db_handle->runQuery("SELECT * FROM transactions ORDER BY tid DESC");
    if (!empty($orders)) {
        foreach ($orders as $key => $value) {
            //If order is ongoing
            if ($orders[$key]['order_status'] == 1) {
                $_SESSION['orderid'] = $orders[$key]["tid"];
?>
                <br>
                <div class="order">
                    <div class="details">
                        <div class="product-details"><?php echo "<b>Transaction No: </b>" . $orders[$key]["tid"]; ?></div>
                        <div class="product-details"><?php echo "<b>Customer Name: </b>" . $orders[$key]["cusname"]; ?></div>
                        <b>Order Status: </b>
                        <div class="product-details" style="color: #e6b800;"><b>Pending</b></div>
                    </div>
                    <!-- Create buttons for admin-->
                    <div class="actions">
                        <form method="POST">
                            <a class="orderinfo" href="orderdetails.php?id=<?php echo $orders[$key]['tid']; ?>">See Order Details</a>
                            <button type="submit" class="finished" name="adminfinished" value=<?php echo $_SESSION['orderid'] ?>>Set as Completed</button>
                            <button type="submit" class="cancel" name="admincancel" value=<?php echo $_SESSION['orderid'] ?>>Cancel Order</button>
                        </form>
                    </div>
                </div>
                <hr>
                <?php   //Action for button
                if (isset($_POST['adminfinished'])) {
                    $id = $_POST['adminfinished'];
                    $db_handle->editOrderStatus(3, $id);
                    echo "<script>window.location.href='orderlist.php'</script>";
                }

                if (isset($_POST['admincancel'])) {
                    $id = $_POST['admincancel'];
                    $db_handle->editOrderStatus(2, $id);
                    echo "<script>window.location.href='orderlist.php'</script>";
                }

                if (isset($_POST['order_details'])) {
                    echo "<script>window.location.href='orderdetails.php'</script>";
                }
            }
        }
    } else {
        echo "No active orders.";
    } // End of admin side, else for user side.





} else if ($_SESSION['username']) {
    $orders = $db_handle->runQuery("SELECT * FROM transactions WHERE cusname='$username' ORDER BY tid DESC");
    if (!empty($orders)) {
        foreach ($orders as $key => $value) {
            //If order is ongoing
            if ($orders[$key]['order_status'] == 1) {
                $_SESSION['orderid'] = $orders[$key]["tid"];
                ?> <div class="order">
                    <div class="details">
                        <div class="product-details"><?php echo "<b>Transaction No: </b>" . $orders[$key]["tid"]; ?></div>
                        <div class="product-details"><?php echo "<b>Customer Name: </b>" . $orders[$key]["cusname"]; ?></div>
                        <b>Order Status: </b>
                        <div class="product-details" style="color: #e6b800;"><b>Pending</b></div>
                    </div>

                    <!--Create buttons for user-->
                    <div class="actions">
                        <form method="POST">
                            <a class="orderinfo" href="orderdetails.php?id=<?php echo $orders[$key]['tid']; ?>">See Order Details</a>
                            <button type="submit" class="canceluser" name="usercancel" value=<?php echo $_SESSION['orderid'] ?>>Cancel Order</button>
                        </form>
                    </div>
                </div>
                <hr>
                <?php       //Action for button
                if (isset($_POST['usercancel'])) {
                    $id = $_POST['usercancel'];
                    $db_handle->editOrderStatus(2, $id);
                    echo "<script>window.location.href='orderlist.php'</script>";
                }

                if (isset($_POST['order_details'])) {
                    echo "<script>window.location.href='orderdetails.php'</script>";
                }

                //If order is cancelled
            } else if ($orders[$key]['order_status'] == 2) {
                $_SESSION['orderid'] = $orders[$key]["tid"];
                ?>
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
            <?php   //If order is finished
            } else if ($orders[$key]['order_status'] == 3) {
                $_SESSION['orderid'] = $orders[$key]["tid"];
            ?>
                <div class="order">
                    <div class="details">
                        <div class="product-details"><?php echo "<b>Transaction No: </b>" . $orders[$key]["tid"]; ?></div>
                        <div class="product-details"><?php echo "<b>Customer Name: </b>" . $orders[$key]["cusname"]; ?></div>
                        <b>Order Status: </b>
                        <div class="product-details" style="color: #00FF00;"><b>Finished</b></div>
                    </div>
                    <div class="actions">
                        <a class="orderinfo" href="orderdetails.php?id=<?php echo $orders[$key]['tid']; ?>">See Order Details</a>
                    </div>
                </div>
                <hr>
<?php
            }
        }
    } else {
        echo "<div class='no-records'>You have no recent orders.</div>";
    }
} //End of user side.
?>