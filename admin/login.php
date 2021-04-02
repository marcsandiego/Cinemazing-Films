<?php 
session_start();
include("databasecreation.php");
include("logindatabase.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cinemazing Films | Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" href="login-css/icon.png" >
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-css/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-css/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-css/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login-css/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-css/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-css/css/util.css">
	<link rel="stylesheet" type="text/css" href="login-css/css/main.css">
	<!--===============================================================================================-->
	<style type="text/css">
		
		body {
			background: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,.4)),url(login-css/images/bg.jpeg) no-repeat center top;
			background-size: cover; 
			height: 100px;  
			overflow: hidden;   
		}
		.form{
			height: 70vh;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		#forms{
			display: flex;
			align-items: center;
		}

	</style>
</head>
<body>
	<div class="limiter">
		<div class="form"> 
			<div id="forms" class="wrap-login100 p-l-50 p-r-50 p-t-250 p-b-40" style=" background-color: rgba(0, 0, 0, .7);">
				<form class="login100-form validate-form" action="login.php" method="post">
					<span class="login100-form-title p-b-55">
						<img src="login-css/images/secondary-logo-cinemazing.png" width="200px" height="200px">
						<h1>ADMIN</h1>
					</span>
					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="username" placeholder="Username" required="" value='<?php echo $username_cookie; ?>'>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="password" name="apassword" placeholder="Password" required="" value='<?php echo $password_cookie; ?>'>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" <?php echo $checked; ?> >
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" type="submit" name="login">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>