<?php
require('php/logsys.php');
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Chef Food</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<style>
		<?php
		include("css/loginreg.css");
		?>
	</style>
</head>

<body>

	<div id="container">
		<div class="justify-content-md-center">
			<form method="POST" action="#login" enctype="multipart/form-data" class="center">
				<img src="./product-images/logo.png" alt="logo" class="w-100" />
				<h4><b>Register</b></h4>
				<?php include("php/errors.php"); ?>

				<div class="mb-3">
					<input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Username">
				</div>
				<div class="mb-3">
					<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Name">
				</div>
				<div class="mb-3">
					<input type="text" name="number" class="form-control" value="<?php echo $number; ?>" placeholder="Mobile No.">
				</div>
				<div class="mb-3">
					<input type="password" name="password_1" class="form-control" placeholder="Password">
				</div>
				<div class="mb-3">
					<input type="password" name="password_2" class="form-control" placeholder="Confirm Password">
				</div>
				<div class="mb-3">
					<label for="uploadfile">Upload Profile Picture</label>
					<input type="file" name="uploadfile" value="" />
				</div>
				<div class="mb-3">
					<button type="submit" class="btn btn-primary" name="reg_user">Register</button>
				</div>
				<p>
					Already a member? <a href="http://localhost/webproject/login.php#login">Sign in</a>
				</p>
			</form>
		</div>
	</div>
</body>

</html>