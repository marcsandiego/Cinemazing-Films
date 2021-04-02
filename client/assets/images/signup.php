<!DOCTYPE html>
<html lang="en">
<head>
<title>Cinemazing Films | Sign up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
		<link rel="icon" href="login-css/images/icon-cinemazing.png">
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
	html{
    height:100%;
    }
body {
	 background: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,.4)),url(login-css/images/bg.jpeg) no-repeat center top;
     background-size: cover; 
     height:100vh;  
	}
.form{
	display: flex;
	justify-content: center;
	padding: 120px 0px;
}

.inside{
	display: flex;
	justify-content: space-between;
	flex-wrap: wrap;
}

.error-message{
	color: red;
}

#sign{
	display: flex;
	align-items: center;
}


</style>
</head>
<?php 

		require 'dbconfig.php';

		 $table = "CREATE TABLE `cinemazing`.`customer_accounts` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `first_name` VARCHAR(255) NOT NULL , `last_name` VARCHAR(255) NOT NULL , `birthday` DATE NOT NULL , `gender` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `contact` VARCHAR(255) NOT NULL , `c_coins` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`username`(255)), UNIQUE (`email`(255)))";

		  /*if($connect->query($table)){
     		echo "created";
      	}else{
   		echo "error creating table: ".$connect->error;
   		}*/

    	# TANGGALIN MO LANG COMMENT NETO, MAG CECREATED SYA NG TABLE KUSA, THEN AFTER NON ICOMMENT MO SYA ULIT
    	# TABLE CREATE ----- TABLE CREATE ----- TABLE CREATE ----- TABLE CREATE ----- TABLE CREATE ----- TABLE CREATE


		$error = array('fname' => '','lname' => '','uname' => '','bday' => '','password' => '','password1' => '','email' => '','contact' => '', 'gender' => '');
		$count = 0;
		

		if(isset($_POST['sign_up'])){
			$cus_username = $_POST['uname'];
     	 	$cus_password = $_POST['password'];
      		$cus_birthday = $_POST['bday'];
      		$cus_gender = $_POST['gender'];
      		$cus_email = $_POST['email'];
      		$cus_contact = $_POST['contact'];
			$c_coins = 0; 
			$age = floor((time() - strtotime($_POST['bday'])) / 31556926);
			$password_val = $_POST['password'];
			$uppercase = preg_match('@[A-Z]@', $password_val);
			$lowercase = preg_match('@[a-z]@', $password_val);
			$integers = preg_match('@[0-9]@', $password_val);
			$contact_val = substr($_POST['contact'], 0,2);
			# FIRSTNAME AND LASTNAME VALIDATION
			if(empty($_POST['fname'])){
				$error['fname'] = "First name is required";
			}else{
				if (preg_match('/[0-9]/', $_POST['fname'])) {
					$error['fname'] = "First name cannot have numbers";
				}
				else{
					$cus_fname = ucwords($_POST['fname']);
					$count+= 1;
					
				}
			
			}
			if(empty($_POST['lname'])){
				$error['lname'] = "Last name is required";
			}
			else {
				if ((preg_match('/[0-9]/', $_POST['lname'])) ){
					$error['lname'] = "Last name cannot have numbers";
				}
				else{
					$cus_lname = ucwords($_POST['lname']);
      				$count+= 1;
      		
				}
      		
    		}

			# USERNAME VALIDATION ----------------->
			if(empty($_POST['uname'])){
				$error['uname'] = "Username is required";
			}else{
				$username_checker = "SELECT * FROM customer_accounts WHERE (username = '$cus_username' or email ='$cus_email')";
				$username_exist=mysqli_query($connect, $username_checker);

				if(mysqli_num_rows($username_exist) > 0){
					$row = mysqli_fetch_assoc($username_exist);
					if($cus_username==$row['username']){
						$error['uname'] = "Username is already exist";
					}
					if($cus_email==$row['email']){
						$error['email'] = "Email is already exist";
					}
				}else{
					$count+= 1;
				}
			}

			# BIRTHDAY VALIDATION
			if(empty($_POST['bday'])){
				$error['bday'] = "Birth date is required";
			}else{
				if($age < 18){
				$error['bday'] = "You must be atleast 18 years old to register";
			}
			else{
				$count+= 1;
	
			}
			
			}

			# PASSWORD VALIDATION
			if(empty($_POST['password'])){
				$error['password'] = "Password is required";
			}else{
				if(strlen($_POST['password']) < 6){
					$error['password'] = "Your password must be atleast 6 characters";
				}
				else if(!$uppercase){
					$error['password'] = "Your password must have atleast one uppercase letter";
				}
				else if(!$lowercase){
					$error['password'] = "Your password must have atleast one lowercase letter";
				}
				else if(!$integers){
					$error['password'] = "Your password must have atleast one integer";
				}
				else{
					$count+= 1;
			
				}
				
			}

			if(empty($_POST['password1'])){
				$error['password1'] = "Re-type is required";
			}else{
				if($_POST['password1'] != $_POST['password']){
				$error['password1'] = "Your password did not match";
			}
			else{
				$count+= 1;
		
			}
			
			}

			# EMAIL VALIDATION
			if(empty($_POST['email'])){
				$error['email'] = "Email is required";
			}else{
				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$error['email'] = "Your email is invalid";
				}
				else{
					$count+= 1;
	
				}
			}

			# CONTACT 
			if(empty($_POST['contact'])){
				$error['contact'] = "Contact number is required";
			}else{
				if(strlen($_POST['contact']) > 11 || $contact_val !=("09") ){
					$error['contact'] = "Invalid contact number";
				}
				else{
					$count+= 1;
				
				}
				
			}

			# GENDER VALIDATION

			if(empty($_POST['gender'])){
				$error['gender'] = "Gender is required";
			}else{
				$count+= 1;
	
			}

			if ($count == 9){
			

    		$query = "INSERT INTO `customer_accounts`(id, username, password, first_name, last_name, birthday, gender, email, contact, c_coins) VALUES ('?','$cus_username','$cus_password','$cus_fname','$cus_lname','$cus_birthday','$cus_gender','$cus_email','$cus_contact','$c_coins')";
      
    
            if (mysqli_query($connect, $query)) {
        		echo "<script>if(confirm('Congratulations your account is already created. You can Login now!')){document.location.href='login.php'};</script>";
    		} else {
        		echo '<script type="text/javascript">'.'alert("Data failed to add")' . $query . "<br>" . mysqli_error($connect)."</script>";
    		}

		}
		}
		

	 ?>
<body>
	
<div class="limiter">
		<div class="form">
			<div  style="width: 60%; background-color: rgba(33, 45, 74, .9)" class="wrap-login100 p-l-50 p-r-50 p-t-45 p-b-40">
				<form action="signup.php" method="post">										
					<a href="login.php"><span style="color:white; font-size: 2.2em" class="lnr lnr-arrow-left"></span></a>
					<div class="inside">
					<span class="login100-form-title p-b-55">
						<img src="login-css/images/logo-cinemazing.png" width="250px" height="100px">
					</span>

					<section style="width: 48%;" class="wrap-input100 validate-input m-b-16">
					<div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="fname" placeholder="First name" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<span class="lnr lnr-chevron-right" id="sign"></span>
						</span>			
					</div>
					<div class="error-message"><?php echo $error['fname']; ?></div> <!-- ERROR MESSAGE DISPLAY -->	
					</section>

					<section style="width: 48%;" class="wrap-input100 validate-input m-b-16">
					<div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="lname" placeholder="Last name" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<span class="lnr lnr-chevron-right" id="sign"></span>
						</span>		
					</div>
					<div class="error-message"><?php echo $error['lname']; ?></div> <!-- ERROR MESSAGE DISPLAY -->		
					</section>

					<section style="width: 48%;" class="wrap-input100 validate-input m-b-16">
					<div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="uname" placeholder="Username" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<span class="lnr lnr-user"></span>
						</span>	
					</div>
					<div class="error-message"><?php echo $error['uname']; ?></div> <!-- ERROR MESSAGE DISPLAY -->
					</section>

					<section style="width: 48%;" class="wrap-input100 validate-input m-b-16">
					<div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="date" name="bday">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<span class="lnr lnr-chevron-right"></span>
						</span>
					</div>
					<div class="error-message"><?php echo $error['bday']; ?></div> <!-- ERROR MESSAGE DISPLAY -->
					</section>

					<section style="width: 48%;" class="wrap-input100 validate-input m-b-16">
					<div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="password" name="password" placeholder="Password">						
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<span class="lnr lnr-lock"></span>
						</span>
					</div>
					<div class="error-message"><?php echo $error['password']; ?></div> <!-- ERROR MESSAGE DISPLAY -->
					</section>

					<section style="width: 48%;" class="wrap-input100 validate-input m-b-16">
					<div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="password" name="password1" placeholder="Re-enter Password">		
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<span class="lnr lnr-lock"></span>
						</span>
					</div>
					<div class="error-message"><?php echo $error['password1']; ?></div> <!-- ERROR MESSAGE DISPLAY -->
					</section>

					<section style="width: 48%;" class="wrap-input100 validate-input m-b-16">
					<div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="email" placeholder="Email">						
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<span class="lnr lnr-envelope"></span>
						</span>
					</div>
					<div class="error-message"><?php echo $error['email']; ?></div> <!-- ERROR MESSAGE DISPLAY -->
					</section>

					<section style="width: 48%;" class="wrap-input100 validate-input m-b-16">
					<div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="number" name="contact" placeholder="Contact">						
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<span class="lnr lnr-phone-handset"></span>
						</span>
					</div>
					<div class="error-message"><?php echo $error['contact']; ?></div> <!-- ERROR MESSAGE DISPLAY -->
					</section>

					<section style="width: 48%;" class="wrap-input100 validate-input m-b-16">
					<div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
						<select class="input100" name="gender">
						<option value="" disabled selected>Choose Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option></select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<span class="lnr lnr-chevron-right"></span>
						</span>
					</div>
					<div class="error-message"><?php echo $error['gender']; ?></div> <!-- ERROR MESSAGE DISPLAY -->
					</section>

					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" name="sign_up">
							Sign up
						</button>
					</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	
	


</body>
</html>