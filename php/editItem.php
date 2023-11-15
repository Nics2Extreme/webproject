<?php 
require_once("php/dbcontroller.php");
$db_handle = new DBController();

$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 
                                                    'code'=>$productByCode[0]["code"], 
                                                    'price'=>$productByCode[0]["price"], 
                                                    'image'=>$productByCode[0]["image"],
													'item_status'=>$productByCode[0]["item_status"]));
																										
			
	if(!empty($_SESSION["cart_item"])) {
		if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
			foreach($_SESSION["cart_item"] as $k => $v) {
				if($productByCode[0]["code"] == $k) {
					if(empty($_SESSION["cart_item"][$k]["quantity"])) {
				    	$_SESSION["cart_item"][$k]["quantity"] = 0;
                    }
				}
			}
		} else {
			$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
		}
	} else {
		$_SESSION["cart_item"] = $itemArray;
}

if(isset($_POST['upload'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
	$status = $_POST['status'];
    $code = $_GET['code'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "product-images/".$filename;
    if($_FILES["uploadfile"]["error"] == 4){ 
        echo "<p style='color: red;'>Please upload an image!</p>";
    }else{
        $db_handle->updateItem($name,$price,$status,$folder,$code);
        echo "<script>window.location.href='admin.php'</script>";
        unset($_SESSION['cart_item']);
    }
}
?>