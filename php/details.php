<?php
    $db_handle = new DBController();
    $username = $_SESSION['username'];
    $order_id = $_GET['id'];
    $order = $db_handle->runQuery("SELECT * FROM transactions WHERE tid = '$order_id'");
    $a = 0;
    foreach($order as $key => $value){
        $items = json_decode($order[$key]['item_name'], true);
        $quantity = json_decode($order[$key]['item_quantity'], true);
            foreach($items as $item){
                $result = $db_handle->getItemImage($item);
               ?>
                <tr>
                    <td><img src="<?php echo $result['image'];?>" width="60%" height="60%" style="margin: 0 30px 0 30px;"><p style="text-align: center;"><?php echo $result['name'];?></p></td>
                    <td style="text-align:center;"><?php echo $quantity[$a];?></td>
                    <td style="text-align:center;"><?php echo $result['price'];?></td>
                    <td style="text-align:center;"><?php echo $result['price']*$quantity[$a];?></td>
               <?php
               $a++;
            }
        ?>
            </tr>
        <?php
    }
?>