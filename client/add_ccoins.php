<?php session_start();
require 'header-loggedin.php';
?>
 <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
 <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
 <title>Cinemazing Films | Add Cinema Coins </title>
 <link rel="stylesheet" type="text/css" href="login-css/css/util.css">
 <link rel="stylesheet" type="text/css" href="login-css/css/main.css">
 <link rel="stylesheet" type="text/css" href="login-css/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
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
            <h3 class="title-w3l">Add Cinema Coins</h3>
          </div>
         
            <div class="grid-columns d-grid">
              <div class="column two order-1">
                <div class="box13">
                  <h3><a>Top up: Cinema Coins</a></h3>              
                  <form action="paypal.php" method="get">
                  <section class="wrap-input100 validate-input m-b-16">
          					<div style="width: 100%;" class="wrap-input100 validate-input m-b-16">
          						<input class="input100" type="number" name="ccoins" placeholder="Amount">						
          						<span class="focus-input100"></span>
                          <span class="symbol-input100">
                          <span class="lnr lnr-database"></span>
                          </span> 
          					</div>

          					<div class="container-login100-form-btn">
          						<button class="login100-form-btn" name="paypal" value="yes">
          							Payment Option
          						</button>
          					</div>
          					</section>
					       </form>

                </div>
              </div>
              <div class="column order-2">
                <div class="box13">
                  <a><img class=" side-img" src="assets/images/pay.jpg" alt=""></a>
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
