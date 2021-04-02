<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Cinemazing Films | Log in or Sign up</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" href="login-css/images/icon-cinemazing.png" >
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
  height: 70vh;
  display: flex;
  justify-content: center;
  align-items: center;
  }

#forms{
  display: flex;
  align-items: center;
}

#error-msg-div{
  margin: auto;
  color: red;
}

</style>
</head>
<?php
  require 'dbconfig.php';
  $error_message = array('error' => '');
    if(isset($_POST['login-btn'])){

        $username = mysqli_real_escape_string($connect,$_POST['username']);
        $password = mysqli_real_escape_string($connect,$_POST['password']);

        if (!empty($username) && empty(!$password)){
          
            $sql_query = "select count(*) as user_count from customer_accounts where username='".$username."' and password='".$password."'";
            $result = mysqli_query($connect,$sql_query);
            $row = mysqli_fetch_array($result);

            $count = $row['user_count'];

            if($count > 0){
                $_SESSION['username'] = $username;
                if(isset($_POST['remember-me'])){
                  setcookie("username",$username,time()+3600*24*365);
                  setcookie("password",$password,time()+3600*24*365);
                }else{

                  setcookie("username", $username, 30);
                  setcookie("password", $password, 30);
                }
                $_SESSION['IS_LOGIN'] = "yes";
                header("location: homepage.php");
            }else{
                 $error_message['error'] = "Incorrect Username and Password";
                 
            }
          }

    }
    $username_cookie = '';
        $password_cookie = '';
        $checked = '';
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
            $username_cookie = $_COOKIE['username'];
            $password_cookie = $_COOKIE['password'];
            $checked = "checked='checked'";
        }
   ?>
<body>
  
  <div class="limiter">
    <div class="form">
      <div id="forms" class="wrap-login100 p-l-50 p-r-50 p-t-250 p-b-40" style="background-color: rgba(0, 0, 0, .7);">
        <form class="login100-form validate-form" action="login.php" method="post">
          <span class="login100-form-title p-b-55">
            <img src="login-css/images/secondary-logo-cinemazing.png" width="200px" height="200px">
          </span>
          <div id="error-msg-div" ><?php echo $error_message['error']; ?></div> <!-- ERROR MESSAGE DISPLAY -->
          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="text" name="username" placeholder="Username" required="" value='<?php echo $username_cookie; ?>'>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <span class="lnr lnr-user"></span>
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="password" name="password" placeholder="Password" required="" value='<?php echo $password_cookie; ?>'>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-lock"></span>
            </span>
          </div>

          <div class="contact100-form-checkbox m-l-4">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" <?php echo $checked; ?>>
            <label class="label-checkbox100" for="ckb1">
              Remember me
            </label>
          </div>
          
          <div class="container-login100-form-btn p-t-25">
            <a href="homepage.php"><button class="login100-form-btn" name="login-btn"></a>
              Login
            </button>
          </div>

          <div class="text-center w-full p-t-115">
            <span class="txt1">
              Not a member?
            </span>

            <a class="txt1 bo1 hov1" href="signup.php">
              Sign up now             
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  
</body>
</html>