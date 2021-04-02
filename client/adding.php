<?php session_start();
?>
 <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
 <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
 <title>Cinemazing Films | Add Cinema Coins </title>
 <link rel="stylesheet" type="text/css" href="login-css/css/util.css">
 <link rel="stylesheet" type="text/css" href="login-css/css/main.css">

<?php 
	 	$username = ($_SESSION['username']);
    	$coins = ($_GET['ccoins']); 
    	$price = $coins/50;
                        

        $connection = mysqli_connect("localhost","root","","cinemazing");
        $query_show = "SELECT c_coins FROM `customer_accounts` WHERE `username` = '$username' ";
        $res = mysqli_query($connection,$query_show);
        while($row = mysqli_fetch_array($res)){
        $c_coins = $row['c_coins'];}

        $query_load = "UPDATE `customer_accounts` SET c_coins = $c_coins+$coins WHERE `username` = '$username' ";
        $res = mysqli_query($connection,$query_load);

header('location: homepage.php');
?>
    
