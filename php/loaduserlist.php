<?php
    $db_handle = new DBController();
    $result = $db_handle->loadUserList();

    foreach($result as $key=> $value){
        ?>
            <div class="user">
                <img src="<?php echo $result[$key]['profile_pic'];?>" alt="">
                <div class="info">
                    <h2><?php echo $result[$key]['name'];?></h2>
                    <p><?php echo $result[$key]['mobile_number'];?></p>
                </div>
            </div>
        <?php
    }
       
?>
