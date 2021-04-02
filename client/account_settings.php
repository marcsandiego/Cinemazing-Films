<?php session_start();
require 'header-loggedin.php';
?>
 <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
 <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
 <title>Cinemazing Films | Account Settings </title>
 <link rel="stylesheet" type="text/css" href="login-css/css/util.css">
 <link rel="stylesheet" type="text/css" href="login-css/css/main.css">
 <link rel="stylesheet" type="text/css" href="login-css/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<style type="text/css">

html {
  background-color: black; 
}

body{
  background-color: black
}
#services{
    margin-top: 100px;
    margin-bottom: -100px;
    background-size: cover;
  }

.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 18px;
  transition: 0.4s;
}

.actives, .accordions:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}

.error{
  color: red;
  margin: auto;
  width: 50%;
  padding: 0px;
  display: flex;
  justify-content: center;
}

</style>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>

<body class="w3lhny-head fixed-top">
   <section class="w3l-gallery-25-top" id="services">
      <!-- gallery-25 -->
      <div class="gallery-25 py-5">
        <div class="container py-lg-5 py-md-4" style="margin-bottom: 500px">
           <div class="header-title mx-auto text-center mb-md-5 mb-4">
            <span class="sub-title">Services</span>
            <h3 class="title-w3l">Account Settings</h3>
          </div>
         
            <div class="grid-column" style="width: 50%; margin: auto">
              <div class="column one order-1">
                <div class="box13">
                  

                    <button class="accordion">Change Username</button>
                    <div class="panel">
                      <form action="" method="post">
                       <section class="wrap-input100 validate-input m-b-16">
                        <div style="width: 100%;" class="wrap-input100 validate-input m-b-16 m-t-16">
                          <input class="input100" type="text" name="old_uname" placeholder="Old Username" required="">           
                          <span class="focus-input100"></span>
                          <span class="symbol-input100">
                          <span class="lnr lnr-chevron-right" id="sign"></span>
                          </span> 
                        </div>

                        <div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
                          <input class="input100" type="text" name="new_uname" placeholder="New Username" required="">           
                          <span class="focus-input100"></span>
                          <span class="symbol-input100">
                          <span class="lnr lnr-chevron-right" id="sign"></span>
                          </span> 
                        </div>

                        <div class="container-login100-form-btn">
                          <button class="login100-form-btn" name="change_un">
                            Change Username
                          </button>
                        </div>
                        </section>
                      </form>
                      <?php  
                      if (isset($_SESSION['username']) && (isset($_POST['change_un']))) {
                        $username = $_SESSION['username'];
                        $old = $_POST['old_uname'];
                        $new = $_POST['new_uname'];

                        if ($old === $username) {
                          $connection = mysqli_connect("localhost","root","","cinemazing");
                          $query = "UPDATE `customer_accounts` SET `username` = '$new' WHERE `username` = '$username' ";
                          $res = mysqli_query($connection,$query);
                          echo "<script>if(confirm('Congratulations your username is already changed. Re-login now!')){document.location.href='logout.php'}
                          ;</script>";
                        }
                        else{
                          echo '<div class="error" class="wrap-input100 validate-input m-b-16">Incorrect username.</div>';
                        }
                      }
                      ?>

                    </div>

                    <button class="accordion">Change Password</button>
                    <div class="panel">
                      <form action="" method="post">
                       <section class="wrap-input100 validate-input m-b-16">
                        <div style="width: 100%;" class="wrap-input100 validate-input m-b-16 m-t-16">
                          <input class="input100" type="password" name="old_pw" placeholder="Old Password" required="">           
                          <span class="focus-input100"></span>
                          <span class="symbol-input100">
                          <span class="lnr lnr-chevron-right" id="sign"></span>
                          </span> 
                        </div>

                        <div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
                          <input class="input100" type="password" name="new_pw" placeholder="New Password" required="">           
                          <span class="focus-input100"></span>
                          <span class="symbol-input100">
                          <span class="lnr lnr-chevron-right" id="sign"></span>
                          </span> 
                        </div>

                        <div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
                          <input class="input100" type="password" name="reenter" placeholder="Re-enter Password" required="">           
                          <span class="focus-input100"></span>
                          <span class="symbol-input100">
                          <span class="lnr lnr-chevron-right" id="sign"></span>
                          </span> 
                        </div>

                        <div class="container-login100-form-btn">
                          <button class="login100-form-btn" name="change_pass">
                            Change Password
                          </button>
                        </div>
                        </section>
                      </form>
                     <?php  
                      if (isset($_SESSION['username']) && (isset($_POST['change_pass']))) {
                        $username = $_SESSION['username'];
                        $old = $_POST['old_pw'];
                        $new = $_POST['new_pw'];
                        $reenter = $_POST['reenter'];
                        $connection = mysqli_connect("localhost","root","","cinemazing");
                        $query = "SELECT `password` FROM `customer_accounts` WHERE `username` = '$username' ";
                        $res = mysqli_query($connection,$query);
                       while($row = mysqli_fetch_array($res)){
                        $oldpw = $row['password'];

                       }
                            if ($oldpw === $old){
                              if ($new === $reenter) {
                            $query = "UPDATE `customer_accounts` SET `password` = '$new' WHERE `username` = '$username' ";
                            $res = mysqli_query($connection,$query);
                            echo "<script>if(confirm('Congratulations your password is already changed. Re-login now!')){document.location.href='logout.php'}
                            ;</script>";
                             }else{
                             echo '<div class="error" class="wrap-input100 validate-input m-b-16">Password mismatch.</div>';
                             }
                           }
                           else{
                          echo '<div class="error" class="wrap-input100 validate-input m-b-16">Incorrect password.</div>';
                          }
                        }
                        
                        
                      
                      ?>
                    </div>

                    <button class="accordion">Change Email</button>
                    <div class="panel">
                      <form action="" method="post">
                       <section class="wrap-input100 validate-input m-b-16">
                        <div style="width: 100%;" class="wrap-input100 validate-input m-b-16 m-t-16">
                          <input class="input100" type="text" name="old_em" placeholder="Old Email" required="">           
                          <span class="focus-input100"></span>
                          <span class="symbol-input100">
                          <span class="lnr lnr-chevron-right" id="sign"></span>
                          </span> 
                        </div>

                        <div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
                          <input class="input100" type="text" name="new_em" placeholder="New Email" required="">           
                          <span class="focus-input100"></span>
                          <span class="symbol-input100">
                          <span class="lnr lnr-chevron-right" id="sign"></span>
                          </span> 
                        </div>

                        <div class="container-login100-form-btn">
                          <button class="login100-form-btn" name="change_em">
                            Change Email
                          </button>
                        </div>
                        </section>
                      </form>
                      <?php  
                      if (isset($_SESSION['username']) && (isset($_POST['change_em']))) {
                        $username = $_SESSION['username'];
                        $old = $_POST['old_em'];
                        $new = $_POST['new_em'];
                        $connection = mysqli_connect("localhost","root","","cinemazing");
                        $query = "SELECT `email` FROM `customer_accounts` WHERE `username` = '$username' ";
                        $res = mysqli_query($connection,$query);
                       while($row = mysqli_fetch_array($res)){
                        $oldem = $row['email'];

                       }

                          if (!filter_var($_POST['new_em'], FILTER_VALIDATE_EMAIL)){
                            echo '<div class="error" class="wrap-input100 validate-input m-b-16">Your email is invalid.</div>';
                          }
                          else{
                            if ($oldem === $old) {
                            $query = "UPDATE `customer_accounts` SET `email` = '$new' WHERE `username` = '$username' ";
                            $res = mysqli_query($connection,$query);
                            echo "<script>if(confirm('Congratulations your email is already changed. Check it now!')){document.location.href='my_account.php'}
                            ;</script>";
                             }else{
                          echo '<div class="error" class="wrap-input100 validate-input m-b-16">Incorrect email.</div>';
                          }
                          }
                        
                        
                      }
                      ?>
                    </div>



                </div>
              </div>

            </div>
      </div>
    </div>
    </section>




</body>


<?php 
  include ('scripts.php');
 ?>

 <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
