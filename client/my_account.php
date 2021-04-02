<?php session_start();
require 'header-loggedin.php';
?>
 <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
 <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
 <title>Cinemazing Films | My Account </title>
 <link rel="stylesheet" type="text/css" href="login-css/css/util.css">
 <link rel="stylesheet" type="text/css" href="login-css/css/main.css">
<style type="text/css">

html {
	height:100%;
	background-color: black; 
	overflow: hidden;
}

body{
	background-color: black
}
#services{
		margin-top: 100px;
		margin-bottom: -100px;
		background-size: cover;
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
            <h3 class="title-w3l">My Account</h3>
          </div>
         
            <div class="grid-columns d-grid">
              <div class="column two order-1">
                <div class="box13">
            <?php 
                if(isset($_SESSION['username'])){
                $username = $_SESSION['username'];
    				$connection = mysqli_connect("localhost","root","","cinemazing");
					  $query = "SELECT * FROM `customer_accounts` WHERE `username` = '$username' ";
					  $res = mysqli_query($connection,$query);
					  while($rows = mysqli_fetch_array($res)){
						echo '<h3>'.'<a>'.'Welcome, '.($rows['first_name']).' '.($rows['last_name']).'</a>'.'</h3>';
						echo '<h1>'.'<a>'.($rows['username']).' | '.($rows['email']).'</a>'.'</h1>';
						echo '<h1>'.'<a>'.($rows['contact']).'</a>'.'</h1>';
						echo '<h1>'.'<a>'.($rows['c_coins']).' Cinema Coins'.'</a>'.'</h1>';
						}
					}
          ?>
                   
                </div>
              </div>
              <div class="column order-2">
                <div class="box13">
                  <a><img class=" side-img" src="assets/images/account.jpg" alt=""></a>
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
