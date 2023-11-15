<?php
    session_start();
    require_once("php/dbcontroller.php");
    $db_handle = new DBController();

    $username = "";
	$name = "";
    $number = "";
	$errors = [];

    if(isset($_POST['reg_user'])){
		$username =  $_POST['username'];
		$name = $_POST['name'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];
        $number = $_POST['number'];
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];   
        $folder = "product-images/".$filename;
		
		if(empty($username)){ array_push($errors, "Username is required"); }
		if(empty($name)){ array_push($errors, "Name is required"); }
		if(empty($password_1)){ array_push($errors, "Password is required"); }
        if(empty($number)){ array_push($errors, "Mobile number is required"); }
		
		if($password_1 != $password_2){
			array_push($errors, "Passwords do not match");
		}
			
		$rowCount = $db_handle->numRows("SELECT * FROM users WHERE username='$username'");
		if($rowCount == 1){
			array_push($errors, "User already exists");
		}else{
				if(count($errors) == 0){
                    move_uploaded_file($tempname, $folder);
					$password = md5($password_1); //Encrypting password into database
					$db_handle->registerUser($username,$name,$password,$number,$folder);
				
					$_SESSION['username'] = $username;
					$_SESSION['name'] = $name;
                    $_SESSION['number'] = $number;
					$_SESSION['success'] = "You are now logged in";
					header('location: login.php');
			}
		}
	}

    if(isset($_POST['login_user'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        if(empty($username)){
            array_push($errors, "Username is required");
        }
    
        if(empty($password)){
            array_push($errors, "Password is required");
        }
    
        if(count($errors) == 0){
            $password = md5($password);
            $adminCount = $db_handle->numRows("SELECT * FROM users WHERE username='admin' AND pass='$password'");
            $userCount = $db_handle->numRows("SELECT * FROM users WHERE username='$username' AND pass='$password'");
            
            if($adminCount == 1){
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $name;
                $_SESSION['success'] = "You are now logged in";
                header('location: admin.php');
            }else if($userCount == 1){
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $name;
                $_SESSION['success'] = "You are now logged in";
                header('location: user.php');
            }else{
                array_push($errors, "Wrong username/password");
            }
        }
    }
?>