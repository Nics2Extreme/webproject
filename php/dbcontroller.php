<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "testing";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}

    function saveItems($name,$code,$folder,$price){
        mysqli_query($this->conn, "INSERT INTO tblproduct (name,code,image,price,item_status)
        VALUES ('$name','$code','$folder','$price','Enabled')");
        echo "<div class='message' style='background-color:green; width: 250px; color:#FFFFFF;'>Item added successfully!</div>";
    }

    function registerUser($username,$name,$password, $number, $image){
        mysqli_query($this->conn, "INSERT INTO users (username,pass,name, mobile_number, profile_pic)
        VALUES ('$username','$password','$name', '$number', '$image')");
    }

	function storeDetails($username, $item, $quantity, $price, $datetime, $status){
		mysqli_query($this->conn, "INSERT INTO transactions(cusname, item_name, item_quantity, total, tdate, order_status)
		VALUES ('$username', '$item', '$quantity', '$price', '$datetime', '$status');");
	}
	
	function updateItem($name,$price,$status,$folder,$code){
		mysqli_query($this->conn, "UPDATE tblproduct
								SET name = '$name', price = '$price', item_status = '$status', image = '$folder'
								WHERE code = '$code';");
	}

	function editOrderStatus($status, $id){
		mysqli_query($this->conn, "UPDATE transactions SET order_status = '$status' WHERE tid = '$id';");
	}

	function getItemImage($code){
		$result = mysqli_query($this->conn, "SELECT * FROM tblproduct WHERE code = '$code'");
		while($row=mysqli_fetch_assoc($result)) {
			return $row;
		}		
	}

	function loadUserList(){
		$result = mysqli_query($this->conn, "SELECT * FROM users WHERE username != 'admin'");
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}
}
?>