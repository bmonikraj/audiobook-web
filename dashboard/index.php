<!-- <?php
	// include "config.php"
?> -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title>DASHBOARD</title>
</head>
<?php
		include 'config.php';
		session_start();

		if(isset($_POST['submit'])){
			$username = mysqli_real_escape_string($conn,$_POST['username']);
			$password = mysqli_real_escape_string($conn,$_POST['password']);

			if($username=='libadmin' && $password=='admin@123#'){

	         	$_SESSION['adm_user'] = $username;
				header("location:dashboard.php");
			}
			else{
				echo '<script>alert("Invalid Credentials !!!");window.open("index.php","_self");</script>';
			}
		}
?>
<body style="background-color: rgb(255,255,180);">
	<div class="row" style="height:4em;background-color: rgb(0,0,60);color:white;">
		<center style="position:relative;margin-top:0.5em;font-size:1.5em">DASHBOARD</center>
	</div>
	<section class="admin-signin" style="margin-top: 10em">
		<div class="row" style="margin-top: 1em;">
			<center><h4><b>Admin SignIn</b></h4></center>
		</div>
		<hr>
		<form class="form-group" action="" method="POST">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6" style="padding: 0em 6em ; margin: 0.5em 0em;">
					<div class="row">
						<label for="username">Username:</label>
						<input type="text" class="form-control" id="username" name="username">
					</div>
					<div class="row">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<div class="row" style="margin-top: 0.5em;">
						<button type="submit" name="submit" class="btn btn-info">Submit</button>
					</div>
				</div>
			</div>
		</form>
	</section>
	<hr>
</body>
</html>