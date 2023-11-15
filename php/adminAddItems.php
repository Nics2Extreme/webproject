<?php
require_once("php/dbcontroller.php");
$db_handle = new DBController();

$name = "";
$code = "";
$price = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];
	  $price = $_POST['price'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];   
    $folder = "product-images/".$filename;
    
    $db_handle->saveItems($name,$code,$folder,$price);
    if (move_uploaded_file($tempname, $folder))  {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }
?>