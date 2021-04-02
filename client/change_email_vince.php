<?php
  include("updateaccount.php");
// session_start();
// if(isset($_SESSION['username'])){

// } else {
//   header('Location: login.php');
//   exit();
// }
// require 'header-loggedin.php';
?>

<link rel="icon" href="login-css/images/icon-cinemazing.png" >
<link rel="stylesheet" type="text/css" href="login-css/css/util.css">
<link rel="stylesheet" type="text/css" href="login-css/css/main.css">
<link rel="stylesheet" type="text/css" href="login-css/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<title>Cinemazing Films | Change Email </title>
<style type="text/css">

.form{
  display: flex;
  justify-content: center;
  margin-bottom: 450px;

}

body{
  background-size: cover; 
  overflow: visible;    
}
</style>


<div class="content-1 py-5" style="margin-top:100px;margin-bottom: -600px">
  <section class="w3l-team-main" id="showing">
    <div class="team py-5">
        <div class="container py-lg-5">
            <div class="title-content text-center">
              <div class="header-title">
                <span class="sub-title">Settings</span>
                <h3 class="title-w3l">EDIT PROFILE</h3>
              </div>
            </div>
        </div>
      </div>
<div class="limiter">
    <div class="form">
    <?php

      $servername = "localhost";
      $root = "root";
      $password = "";
      $dbname = "cinemazing";

      $newconn = mysqli_connect($servername, $root, $password, $dbname);

      $selectquery = "SELECT * FROM user_account WHERE user_id = 1";

      $res = mysqli_query($newconn, $selectquery);
      if ($res->num_rows === 1){
        while ($row = $res->fetch_assoc()){
      ?>
        <form class="login100-form validate-form m-b-100" style="position: flex; justify-content: center" method="post">
          <div id="error-msg-div" >
          <div class="wrap-input100 validate-input m-b-16">
          <?php echo
            '<input class="input100" type="text" name="first_name" value="'.$row['first_name'].'" required="">';
          ?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <span class="lnr lnr-circle-minus"></span>
            </span>
          </div>
   
          <div id="error-msg-div" >
          <div class="wrap-input100 validate-input m-b-16">
          <?php echo
            '<input class="input100" type="text" name="last_name" value="'.$row['last_name'].'" required="">';
          ?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <span class="lnr lnr-envelope"></span>
            </span>
          </div>

          <div id="error-msg-div" >
          <div class="wrap-input100 validate-input m-b-16">
          <?php echo
            '<input class="input100" type="text" name="username" value="'.$row['username'].'" required="">';
          ?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <span class="lnr lnr-envelope"></span>
            </span>
          </div>

          <div id="error-msg-div" >
          <div class="wrap-input100 validate-input m-b-16">
          <?php echo
            '<input class="input100" type="date" name="birthday" value="'.$row['birthday'].'" required="">';
          ?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <span class="lnr lnr-envelope"></span>
            </span>
          </div>

          <div id="error-msg-div" >
          <div class="wrap-input100 validate-input m-b-16">
          <?php echo
            '<input class="input100" type="text" name="gender" value="'.$row['gender'].'" required="">';
          ?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <span class="lnr lnr-envelope"></span>
            </span>
          </div>

          <div id="error-msg-div" >
          <div class="wrap-input100 validate-input m-b-16">
          <?php echo
            '<input class="input100" type="text" name="email" value="'.$row['email'].'" required="">';
          ?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <span class="lnr lnr-envelope"></span>
            </span>
          </div>

          <div id="error-msg-div" >
          <div class="wrap-input100 validate-input m-b-16">
          <?php echo
            '<input class="input100" type="text" name="contact" value="'.$row['contact'].'" required="">';
          ?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <span class="lnr lnr-envelope"></span>
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="text" name="upassword" placeholder="Old Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <span class="lnr lnr-checkmark-circle"></span>
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="text" name="unpassword" placeholder="New Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <span class="lnr lnr-checkmark-circle"></span>
            </span>
          </div>
          
          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="text" name="ucnpassword" placeholder="Confirm New Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <span class="lnr lnr-checkmark-circle"></span>
            </span>
          </div>

          <div class="container-login100-form-btn p-t-25">
            <a href=""><button class="login100-form-btn" name="update-acc"></a> Update Account </button>
          </div>
        <?php
          }
        }
        ?>
        </form>
    </div>
  </div>
</section>
</div>


<!--  <?php 
  include ('scripts.php');
 ?> -->
