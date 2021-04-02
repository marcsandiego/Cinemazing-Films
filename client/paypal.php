<?php
session_start();
?>
<!DOCTYPE html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>
<title>Cinemazing Films | Paypal </title>
<link rel="icon" href="login-css/images/icon-cinemazing.png">
<link rel="stylesheet" type="text/css" href="login-css/css/util.css">
<link rel="stylesheet" type="text/css" href="login-css/css/main.css">
<body>
<style type="text/css">
.paypal, .limiter{
  display: flex;
  justify-content: center;
  align-items: center;
  width: 60%
  margin:auto;
  height: 100%;
  }

body{
  background-image: url(assets/images/ticket.jpg);
}


</style>
<div class="paypal">
<div class="limiter">
<div class="wrap-login100 p-l-50 p-r-50 p-t-80 p-b-70" style="background-color: rgba(33, 45, 74); border-radius: 5%;"> 
<?php
  if (empty($_GET['ccoins'])) {
    header('Location: add_ccoins.php');
  }else{
    $username = ($_SESSION['username']);
    $coins = $_GET['ccoins']; 
    $price = $coins/50;
        $connection = mysqli_connect("localhost","root","","cinemazing");
        $query_show = "SELECT c_coins FROM `customer_accounts` WHERE `username` = '$username' ";
        $res = mysqli_query($connection,$query_show);
        while($row = mysqli_fetch_array($res)){
        $c_coins = $row['c_coins'];}
}                                                     
?>

<script
    src="https://www.paypal.com/sdk/js?client-id=Ab9dEGu1ooKBfPqw4v3HPmyf1qWZHuSO7vLOM1qhG7WktnB3t_dpRBSAtYhruNyBe9Xmqg7Rckw18Q0r"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
  </script>

  <div id="paypal-button-container"></div>

<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php
                  echo 
                  $price;     
            ?>'
          }
        }]
      });
    },
    onApprove: function(data, actions) {           
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        window.alert ('Transaction completed, <?php       
                                        
                  echo 
                  $coins;     
            ?> cinema coins added.')
      window.location.href="adding.php?ccoins=<?php echo $coins?>"; 
    });
          
  }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>

<!-- </div>
</div>
</div> -->
</body>

