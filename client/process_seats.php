<?php

  $db = mysqli_connect("localhost","root","","cinemazing");
  if (isset($_POST['submit'])){
      if(!empty($_POST['seat'])){
        $checked = $_POST['seat'];
        $count = count($_POST['seat']);
        $price = 0.0;
        $check = "";
        for ($i=0; $i < $cnt; $i++) {
          if($checked[$i] == 1){
            $price = $price + 250;
          }
          if($checked[$i] == 2){
            $price = $price + 250;
          }
          if($checked[$i] == 3){
            $price = $price + 250;
          }
          if($checked[$i] == 4){
            $price = $price + 250;
          }
          if($checked[$i] == 5){
            $price = $price + 250;
          }
          if($checked[$i] == 6){
            $price = $price + 250;
          }
          if($checked[$i] == 7){
            $price = $price + 250;
          }
          if($checked[$i] == 8){
            $price = $price + 250;
          }
          if($checked[$i] == 9){
            $price = $price + 250;
          }
          if($checked[$i] == 10){
            $price = $price + 250;
          }
          if($checked[$i] == 11){
            $price = $price + 250;
          }
          if($checked[$i] == 12){
            $price = $price + 250;
          }
          if($checked[$i] == 13){
            $price = $price + 250;
          }
          if($checked[$i] == 14){
            $price = $price + 250;
          }
          if($checked[$i] == 15){
            $price = $price + 250;
          }
          if($checked[$i] == 16){
            $price = $price + 250;
          }
          if($checked[$i] == 17){
            $price = $price + 250;
          }
          if($checked[$i] == 18){
            $price = $price + 250;
          }
          if($checked[$i] == 19){
            $price = $price + 250;
          }
          if($checked[$i] == 20){
            $price = $price + 250;
          }
          if($checked[$i] == 21){
            $price = $price + 250;
          }
          if($checked[$i] == 22){
            $price = $price + 250;
          }
          if($checked[$i] == 23){
            $price = $price + 250;
          }
          if($checked[$i] == 24){
            $price = $price + 250;
          }
          if($checked[$i] == 25){
            $price = $price + 250;
          }
          if($checked[$i] == 26){
            $price = $price + 250;
          }
          if($checked[$i] == 27){
            $price = $price + 250;
          }
          if($checked[$i] == 28){
            $price = $price + 250;
          }
          if($checked[$i] == 29){
            $price = $price + 250;
          }
          if($checked[$i] == 30){
            $price = $price + 250;
          }
        }
        // echo "Total Price: ".$price."<br>";
        // echo "Seat No:<br>";
        foreach ( $_POST['seat'] as $seats) {
          // echo "$seats"."<br>";
          $check = $seats;
          $saveseats = "INSERT INTO seat_user (seat_no,seat_total,seat_price)
          VALUES ('$check','$count','$price')";
          mysqli_query($db,$saveseats);
        }
      }else {
        echo "Select atleast one.";
      }
    }
  //////////////////////////////////////////////////////////////////////////////
  //fetch data
  // $seat_query = "SELECT * FROM seat_user";
  // $query_run =mysqli_query($db,$seat_query);
  //
  // if (mysqli_num_rows($query_run) > 0) {
  //   foreach ($query_run as $seatNo) {
      // ?>
       <!-- // <input type="checkbox"/> <?php //$seatNo['seat_no'] ?>  -->
      <?php
  //   }
  // }
 ///////////////////