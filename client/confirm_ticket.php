<!DOCTYPE html>
<!DOCTYPE html>
<html>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
	body{
		background-color: #16070b;
		
	}
	
	#receipt-cont{
		width: 1080px;
		height: 588px;
		margin: auto;
		margin-top: 150px;
		border-radius: 20px;
		background-color: #121212;
		background-image: url("assets/images/resibo.jpg");
		background-position: center;
		background-size: cover;
		box-shadow: 0 0px 30px rgb(255, 7, 58, 2);
		text-align: center;
		color: white;
		padding: 50px;
		font-size: 42px;
		font-family: 'Bebas Neue', cursive;

	}
	table{

	}
	td,tr,th{
		background-color: #110101  ;
		border-radius: 10px;
		padding-bottom: 10px;
		box-shadow: 0 0px 10px rgb(255, 7, 58, 1);
	}
	th{padding-top: 20px;
		text-shadow:  0 0px 20px rgb(255, 7, 58, 1);
	}
</style>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php 
	session_start();
	require 'dbconfig.php';
	$username = $_SESSION['username'];
	
	$query = "SELECT * FROM users_movie_entry WHERE username = '$username'";
    $query_run = mysqli_query($connect, $query);
    $getData = mysqli_num_rows($query_run);

    if($getData){
    	while($row = mysqli_fetch_array($query_run)){
    		$movie_name = $row['movie_name'];
    		$seat_num = $row['seat_no'];
    		$ticket_num = $row['ticket_no'];
    		$seat_occu = $row['seats_occupied'];
    		$is_verified = $row['is_verified'];
    		$payment = $row['total_payment'];
    	}

    }

    $balance_query = "SELECT * FROM customer_accounts WHERE username = '$username'";
    $cus_balance = mysqli_query($connect, $balance_query);
    $balance_data = mysqli_num_rows($cus_balance);

    if($getData){
    	while($row = mysqli_fetch_array($cus_balance)){
    		$c_coins = $row['c_coins'];
    	}

    }


    if($is_verified == "NO"){
		$c_coins -=$payment; 
    	$verify_ticket = "UPDATE users_movie_entry SET is_verified = 'YES' WHERE ticket_no = '$ticket_num'";
    	$update_balance = "UPDATE customer_accounts SET c_coins ='$c_coins' WHERE username = '$username'";

    	mysqli_query($connect, $verify_ticket);
    	mysqli_query($connect, $update_balance);
    }
	
 ?>
<html>
<head>
	<title>ticket</title>
</head>
<body>
	<div id="main-cont">
		<div id="receipt-cont">
			<table>
				<th colspan="4"><img src="assets/images/logo-cinemazing.png" style="width: 30%;">
			<h2>Thankyou for verifying <?php echo $username; ?>, Enjoy watching!</h2></th>
				<tr>
					<td><p> MOVIE TITLE: <?php echo "<br>".$movie_name; ?> </p></td>
					<td><p> TICKET NUMBER: <?php echo "<br>"."C-#".$ticket_num; ?> </p></td>
					<td><p> SEAT NUMBER: <?php echo "<br>".$seat_num; ?> </p></td>
					<td><p> TOTAL SALE: <?php echo "<br>".$payment; ?> </p></td>
				</tr>
			</table>
		</div>
	</div>
	

</body>
</html>






