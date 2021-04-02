<style type="text/css">

@import url("https://fonts.googleapis.com/css?family=Lato&display=swap");
@import url('https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@200&display=swap');

* {
  
}

.movie-container {
  margin: 20px 0;
}

.movie-container select {
  background-color: #fff;
  border: 0;
  border-radius: 5px;
  font-size: 14px;
  margin-left: 10px;
  padding: 5px 15px 5px 15px;
  appearance: none;
  -moz-appearance: none;
  -webkit-appearance: none;
}

.seat-poster{
  display: flex;
  justify-content: center;
}

.container {
  perspective: 1000px;
  margin-bottom: 10px;
}

.seat {
  background-color: #444451;
  height: 12px;
  width: 15px;
  margin: 3px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.seat.selected {
  background-color: #6feaf6;
}
.seat.occupied {
  background-color: #fff;
}

.seat:nth-of-type(2) {
  margin-right: 18px;
}
.seat:nth-last-of-type(2) {
  margin-left: 18px;
}

.seat:not(.occupied):hover {
  cursor: pointer;
  transform: scale(1.2);
}
.showcase.seat:not(.occupied):hover {
  cursor: default;
  transform: scale(1);
}

.showcase {
  padding: 5px 10px;
  border-radius: 5px;
  color: #777;
  list-style-type: none;
  display: flex;
  justify-content: center;
}
.showcase li {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 10px;
}
.showcase li small {
  margin-left: 2px;
}

.row {
  display: flex;
}

.screen {
  background-color: #fff;
  height: 70px;
  width: 100%;
  margin: 15px 0;
  transform: rotateX(-45deg);
  box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
}

p.text {
  margin: 5px 0;
}

p.text span {
  color: #6faef6;
}

.desc{
  width: 30%;
  margin-left: 20px;
  margin-right: 20px;

}

.post{
  display: flex;
  justify-content: center;
  margin-top: 70px;
}


.movie-selection{
  margin: 20px 0;
}
.movie-selection select{
  background-color: #fff;
  border: 0;
  border-radius: 5px;
  font-size: 14px;
  margin-left: 10px;
  padding: 5px 15px 5px 15px;
  appearance: none;
  -moz-appearance: none;
  -webkit-appearance: none;
}
.selection{
  perspective: 1000px;
  margin-bottom: 10px;
}
.seat{
  background-color: #FFFFFF;
  height: 32px;
  width: 35px;
  margin: 3px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
}
.seat.selected{
  background-color: #990033; // selected
}
.seat.booked{
  background-color: #C73045; // reserved
}
.seat:nth-of-type(2){
  margin-right: 18px;
}
.seat:nth-last-of-type(2){
  margin-left: 18px;
}
/* .seat:not(.booked):hover{
  cursor: pointer;
  transform: scale(1.2);
}
.lbl.seat:not(.booked):hover{
  cursor: default;
  transform: scale(1);
} */
.place{
  float: left;
  display: block;
  margin: 5px;
  background: #FFFFFF;
  width: 25px;
  height: 30px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  transition: .2s;
}
.place:not(.seat-selected):hover{
  cursor: pointer;
  transform: scale(1.2);
}
.seat-select{
  display: none;
}
.seat-select:checked+.place{
  background: #990033; // selected
}
.btn1{
  margin-top: 45px; 
  padding: 15px 35px;
  font-size: 16px;
  border: none;
  border-radius: 5px;
float: right;
}

.lbl{
  padding: 5px 10px;
  border-radius: 5px;
  color: #777777;
  list-style-type: none;
  display: flex;
  justify-content: space-between;
}
.lbl li{
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 10px;
}
.lbl li small{
  margin-left: 2px;
}
.row{
  display: block;
}

p.text{
  margin: 5px 0;
}
p.text span{
  color: #6FAEF6;
}
.screen{
  text-align: center;
  font-size: 22px;
  height: 120px;
  font-family: 'Gloria Hallelujah', cursive;
  color: red; 
  padding: 10px;
  text-shadow: 0 3px 10px rgb(255, 7, 58, 1);
}
#coin-container{
  
  margin-top: 120px;
  padding-right: 110px;
  color: white;
  font-size: 20px;
  font-family: 'Saira Condensed', sans-serif;
}
#coin-box{
  border-radius: 5px;
  border: none;
  width: 170px;
  text-align: center;
  text-shadow: 0 0px 10px rgb(255, 7, 58, 1);
}

</style>

<section class="post">
  <div>
     <?php 
     require 'dbconfig.php';
          if (isset($_GET['movieID'])){
            $movie_id = $_GET['movieID'];
            $movie_name = $_GET['title'];
            $username = $_SESSION['username'];


                  $connection = mysqli_connect("localhost","root","","cinemazing");
                              $query = "SELECT * FROM `movies` WHERE `movie_id` = $movie_id ";
                              $res = mysqli_query($connection,$query);
                              while($row = mysqli_fetch_array($res)){
                                  echo "<img controls autoplay loop src = '../admin/poster/$row[photo]' width = '300px' height='420px'>";            
                                 
                        }
                     }
                   ?>
  
  </div>
<?php /*
if ( function_exists( 'mail' ) )
{
    echo 'mail() is available';
}
else
{
    echo 'mail() has been disabled';
}*/
?>

<div class="desc">
          <?php 
          $user_email = $_SESSION['email'];
          $user_coins = $_SESSION['c_coins'];
          if (isset($_GET['movieID'])){
            $movie_id = $_GET['movieID'];

                  $connection = mysqli_connect("localhost","root","","cinemazing");
                              $query = "SELECT * FROM `movies` WHERE `movie_id` = $movie_id ";
                              $res = mysqli_query($connection,$query);
                              while($row = mysqli_fetch_array($res)){
                                  //echo "<img controls autoplay loop src = '../admin/poster/$row[photo]' width = '300px' height='420px'>";            
                                  echo "<h1>".($row['title'])." (".($row['release_year']).")"."</h1>";
                                   echo "<h3>".($row['genre'])."</h3>";
                                  echo "<h4>".($row['running_time'])." min"."</h4>";
                                  echo "<h6>".($row['description'])."</h6>";
                                  echo "<h4>"."Director: ".($row['director'])."</h4>";
                                  echo "<h4>"."In Cinema: ".($row['showdate'])." ".($row['showtime'])."</h4>";
                                
                                //echo "<video controls src = '../admin/trailer/$row[trailer]'>";
                                //echo "<img src = '../admin/poster/$row[photo]' width = '260px' height='350px'>";
                              
                        }
                     }
                   ?>
</div>

<?php 
// PHP MAIL  PHP MAIL  PHP MAIL  PHP MAIL  PHP MAIL  PHP MAIL  PHP MAIL  PHP MAIL  PHP MAIL  PHP MAIL  PHP MAIL  PHP MAIL  PHP MAIL  PHP MAIL  
require 'includes/PHPMailer.php';
      require 'includes/SMTP.php';
      require 'includes/Exception.php';
//Define name spaces
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\SMTP;
      use PHPMailer\PHPMailer\Exception;
    $body = "<h1>Thank you for reserving</h1></br><p id='para-email-html'>Please verify to proceed to your payment</p><br> 
  <a href='localhost/cinemazing/client/confirm_ticket.php'>
  <button name='click_here' id='click-here' style='background-color: #d33f8d;
  width: 150px;
  height: 70px;
  font-size: 22px;
  font-weight: bold;
  border-radius: 5px;
  outline: none;
  border: none;
  color: white;'>CLICK HERE</button>";

  // RETRIVE SEATS DATA ----- RETRIVE SEATS DATA ----- RETRIVE SEATS DATA ----- RETRIVE SEATS DATA ----- RETRIVE SEATS DATA ----- RETRIVE SEATS DATA ----- RETRIVE SEATS DATA 
  $occupied_seats = array('seat1' => '','seat2' => '','seat3' => '','seat4' => '','seat5' => '','seat6' => '','seat7' => '','seat8' => '','seat9' => '','seat10' => '','seat11' => '','seat12' => '','seat13' => '','seat14' => '','seat15' => '','seat16' => '','seat17' => '','seat18' => '','seat19' => '','seat20' => '','seat21' => '','seat22' => '','seat23' => '','seat24' => '','seat25' => '', 'seat26' => '','seat27' => '','seat28' => '','seat29' => '','seat30' => '');

  $lock_seat = array('seat1' => '','seat2' => '','seat3' => '','seat4' => '','seat5' => '','seat6' => '','seat7' => '','seat8' => '','seat9' => '','seat10' => '','seat11' => '','seat12' => '','seat13' => '','seat14' => '','seat15' => '','seat16' => '','seat17' => '','seat18' => '','seat19' => '','seat20' => '','seat21' => '','seat22' => '','seat23' => '','seat24' => '','seat25' => '', 'seat26' => '','seat27' => '','seat28' => '','seat29' => '','seat30' => '');

  $seat_loader = array('seat1' => '','seat2' => '','seat3' => '','seat4' => '','seat5' => '','seat6' => '','seat7' => '','seat8' => '','seat9' => '','seat10' => '','seat11' => '','seat12' => '','seat13' => '','seat14' => '','seat15' => '','seat16' => '','seat17' => '','seat18' => '','seat19' => '','seat20' => '','seat21' => '','seat22' => '','seat23' => '','seat24' => '','seat25' => '', 'seat26' => '','seat27' => '','seat28' => '','seat29' => '','seat30' => '');


              $seat_query = "SELECT * FROM `movie_seats` WHERE `movie_id` = $movie_id ";
                              $res = mysqli_query($connection,$seat_query);
                              while($row = mysqli_fetch_array($res)){
                                
                                if($row['seat1'] == 1){
                                  $occupied_seats['seat1'] = "background: #990033;";
                                  $lock_seat['seat1'] = "return false";
                                  $seat1 = $seat_loader['seat1'] = 1;
                                }
                                else{
                                  $seat1 = $seat_loader['seat1'] = 0;
                                }


                                if($row['seat2'] == 1){
                                  $occupied_seats['seat2'] = "background: #990033;";
                                  $lock_seat['seat2'] = "return false";
                                  $seat2 = $seat_loader['seat2'] = 1;
                                }
                                else{
                                  $seat2 = $seat_loader['seat2'] = 0;
                                }


                                if($row['seat3'] == 1){
                                  $occupied_seats['seat3'] = "background: #990033;";
                                  $lock_seat['seat3'] = "return false";
                                  $seat3 =  $seat_loader['seat3'] = 1;
                                }
                                else{
                                  $seat3 =  $seat_loader['seat3'] = 0;
                                }



                                if($row['seat4'] == 1){
                                  $occupied_seats['seat4'] = "background: #990033;";
                                  $lock_seat['seat4'] = "return false";
                                  $seat4 = $seat_loader['seat4'] = 1;
                                }
                                else{
                                  $seat4 = $seat_loader['seat4'] = 0;
                                }


                                if($row['seat5'] == 1){
                                  $occupied_seats['seat5'] = "background: #990033;";
                                  $lock_seat['seat5'] = "return false";
                                  $seat5 = $seat_loader['seat5'] = 1;
                                }
                                else{
                                  $seat5 = $seat_loader['seat5'] = 0;
                                }


                                if($row['seat6'] == 1){
                                  $occupied_seats['seat6'] = "background: #990033;";
                                  $lock_seat['seat6'] = "return false";
                                  $seat6 = $seat_loader['seat6'] = 1;
                                }
                                else{
                                  $seat6 = $seat_loader['seat6'] = 0;
                                }


                                if($row['seat7'] == 1){
                                  $occupied_seats['seat7'] = "background: #990033;";
                                  $lock_seat['seat7'] = "return false";
                                  $seat7 = $seat_loader['seat7'] = 1;
                                }
                                else{
                                  $seat7 = $seat_loader['seat7'] = 0;
                                }



                                if($row['seat8'] == 1){
                                  $occupied_seats['seat8'] = "background: #990033;";
                                  $lock_seat['seat8'] = "return false";
                                  $seat8 = $seat_loader['seat8'] = 1;
                                }
                                else{
                                  $seat8 = $seat_loader['seat8'] = 0;
                                }



                                if($row['seat9'] == 1){
                                  $occupied_seats['seat9'] = "background: #990033;";
                                  $lock_seat['seat9'] = "return false";
                                  $seat9 = $seat_loader['seat9'] = 1;
                                }
                                else{
                                  $seat9 = $seat_loader['seat9'] = 0;
                                }



                                if($row['seat10'] == 1){
                                  $occupied_seats['seat10'] = "background: #990033;";
                                  $lock_seat['seat10'] = "return false";
                                  $seat10 = $seat_loader['seat10'] = 1;
                                }
                                else{
                                  $seat10 = $seat_loader['seat10'] = 0;
                                }



                                if($row['seat11'] == 1){
                                  $occupied_seats['seat11'] = "background: #990033;";
                                  $lock_seat['seat11'] = "return false";
                                  $seat11 = $seat_loader['seat11'] = 1;
                                }
                                else{
                                  $seat11 = $seat_loader['seat11'] = 0;
                                }



                                if($row['seat12'] == 1){
                                  $occupied_seats['seat12'] = "background: #990033;";
                                  $lock_seat['seat12'] = "return false";
                                  $seat12 = $seat_loader['seat12'] = 1;
                                }
                                else{
                                  $seat12 = $seat_loader['seat12'] = 0;
                                }



                                if($row['seat13'] == 1){
                                  $occupied_seats['seat13'] = "background: #990033;";
                                  $lock_seat['seat13'] = "return false";
                                  $seat13 = $seat_loader['seat13'] = 1;
                                }
                                else{
                                  $seat13 = $seat_loader['seat13'] = 0;
                                }



                                if($row['seat14'] == 1){
                                  $occupied_seats['seat14'] = "background: #990033;";
                                  $lock_seat['seat14'] = "return false";
                                  $seat14 = $seat_loader['seat14'] = 1;
                                }
                                else{
                                  $seat14 = $seat_loader['seat14'] = 0;
                                }



                                if($row['seat15'] == 1){
                                  $occupied_seats['seat15'] = "background: #990033;";
                                  $lock_seat['seat15'] = "return false";
                                  $seat15 = $seat_loader['seat15'] = 1;
                                }
                                else{
                                  $seat15 = $seat_loader['seat15'] = 0;
                                }



                                if($row['seat16'] == 1){
                                  $occupied_seats['seat16'] = "background: #990033;";
                                  $lock_seat['seat16'] = "return false";
                                  $seat16 = $seat_loader['seat16'] = 1;
                                }
                                else{
                                  $seat16 = $seat_loader['seat16'] = 0;
                                }



                                if($row['seat17'] == 1){
                                  $occupied_seats['seat17'] = "background: #990033;";
                                  $lock_seat['seat17'] = "return false";
                                  $seat17 = $seat_loader['seat17'] = 1;
                                }
                                else{
                                  $seat17 = $seat_loader['seat17'] = 0;
                                }



                                if($row['seat18'] == 1){
                                  $occupied_seats['seat18'] = "background: #990033;";
                                  $lock_seat['seat18'] = "return false";
                                  $seat18 = $seat_loader['seat18'] = 1;
                                }
                                else{
                                  $seat18 = $seat_loader['seat18'] = 0;
                                }



                                if($row['seat19'] == 1){
                                  $occupied_seats['seat19'] = "background: #990033;";
                                  $lock_seat['seat19'] = "return false";
                                  $seat19 = $seat_loader['seat19'] = 1;
                                }
                                else{
                                  $seat19 = $seat_loader['seat19'] = 0;
                                }



                                if($row['seat20'] == 1){
                                  $occupied_seats['seat20'] = "background: #990033;";
                                  $lock_seat['seat20'] = "return false";
                                  $seat20 = $seat_loader['seat20'] = 1;
                                }
                                else{
                                  $seat20 = $seat_loader['seat20'] = 0;
                                }



                                if($row['seat21'] == 1){
                                  $occupied_seats['seat21'] = "background: #990033;";
                                  $lock_seat['seat21'] = "return false";
                                  $seat21 = $seat_loader['seat21'] = 1;
                                }
                                else{
                                  $seat21 = $seat_loader['seat21'] = 0;
                                }


                                if($row['seat22'] == 1){
                                  $occupied_seats['seat22'] = "background: #990033;";
                                  $lock_seat['seat22'] = "return false";
                                  $seat22 = $seat_loader['seat22'] = 1;
                                }
                                else{
                                  $seat22 = $seat_loader['seat22'] = 0;
                                }



                                if($row['seat23'] == 1){
                                  $occupied_seats['seat23'] = "background: #990033;";
                                  $lock_seat['seat23'] = "return false";
                                  $seat23 = $seat_loader['seat23'] = 1;
                                }
                                else{
                                  $seat23 = $seat_loader['seat23'] = 0;
                                }


                                if($row['seat24'] == 1){
                                  $occupied_seats['seat24'] = "background: #990033;";
                                  $lock_seat['seat24'] = "return false";
                                  $seat24 = $seat_loader['seat24'] = 1;
                                }
                                else{
                                  $seat24 = $seat_loader['seat24'] = 0;
                                }



                                if($row['seat25'] == 1){
                                  $occupied_seats['seat25'] = "background: #990033;";
                                  $lock_seat['seat25'] = "return false";
                                  $seat25 = $seat_loader['seat25'] = 1;
                                }
                                else{
                                  $seat25 = $seat_loader['seat25'] = 0;
                                }


                                if($row['seat26'] == 1){
                                  $occupied_seats['seat26'] = "background: #990033;";
                                  $lock_seat['seat26'] = "return false";
                                  $seat26 = $seat_loader['seat26'] = 1;
                                }
                                else{
                                  $seat26 = $seat_loader['seat26'] = 0;
                                }



                                if($row['seat27'] == 1){
                                  $occupied_seats['seat27'] = "background: #990033;";
                                  $lock_seat['seat27'] = "return false";
                                  $seat27 = $seat_loader['seat27'] = 1;
                                }
                                else{
                                  $seat27 = $seat_loader['seat27'] = 0;
                                }



                                if($row['seat28'] == 1){
                                  $occupied_seats['seat28'] = "background: #990033;";
                                  $lock_seat['seat28'] = "return false";
                                  $seat28 = $seat_loader['seat28'] = 1;
                                }
                                else{
                                  $seat28 = $seat_loader['seat28'] = 0;
                                }


                                if($row['seat29'] == 1){
                                  $occupied_seats['seat29'] = "background: #990033;";
                                  $lock_seat['seat29'] = "return false";
                                  $seat29 = $seat_loader['seat29'] = 1;
                                }
                                else{
                                  $seat29 = $seat_loader['seat29'] = 0;
                                }


                                if($row['seat30'] == 1){
                                  $occupied_seats['seat30'] = "background: #990033;";
                                  $lock_seat['seat30'] = "return false";
                                  $seat30 = $seat_loader['seat30'] = 1;
                                }
                                else{
                                  $seat30 = $seat_loader['seat30'] = 0;
                                }
                          

                              
                        }

 ?>


<?php
  $movie_price_query = "SELECT * FROM `movies` WHERE `movie_id` = $movie_id ";
  $movie_price_result = mysqli_query($connect, $movie_price_query);
  $movie_price_row = mysqli_num_rows($movie_price_result);

    if($movie_price_row){
      while($row = mysqli_fetch_array($movie_price_result)){
        $movie_price = $row['price'];
        
        
      }

    }
  $error_msg = array('error' => '');
  if (isset($_POST['check-out'])){
      if(!empty($_POST['seat'])){
        $checked = $_POST['seat'];
        $count = count($_POST['seat']);
        $price = 0.0;
        $checks = array();
        $is_verified = "NO";
        $success = 0;
        $seats_occupied = 0;
        for ($i=0; $i < $count; $i++) {
          if($checked[$i] == "A1"){
            $price += $movie_price;
            $seat1 = $seat_loader['seat1'] = 1;
            $seats_occupied += 1;

          }
          if($checked[$i] == "A2"){
            $price += $movie_price;
            $seat2 = $seat_loader['seat2'] = 1;
            $seats_occupied += 1;
          }

          if($checked[$i] == "A3"){
            $price += $movie_price;
            $seat3 = $seat_loader['seat3'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "A4"){
            $price += $movie_price;
            $seat4 = $seat_loader['seat4'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "A5"){
            $price += $movie_price;
            $seat5 = $seat_loader['seat5'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "A6"){
            $price += $movie_price;
            $seat6 = $seat_loader['seat6'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "A7"){
            $price += $movie_price;
            $seat7 = $seat_loader['seat7'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "A8"){
            $price += $movie_price;
            $seat8 = $seat_loader['seat8'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "A9"){
            $price += $movie_price;
            $seat9 = $seat_loader['seat9'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "A10"){
            $price += $movie_price;
            $seat10 = $seat_loader['seat10'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "B1"){
            $price += $movie_price;
            $seat11 = $seat_loader['seat11'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "B2"){
            $price += $movie_price;
            $seat12 = $seat_loader['seat12'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "B3"){
            $price += $movie_price;
            $seat13 = $seat_loader['seat13'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "B4"){
            $price += $movie_price;
            $seat14 = $seat_loader['seat14'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "B5"){
            $price += $movie_price;
            $seat15 = $seat_loader['seat15'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "B6"){
            $price += $movie_price;
            $seat16 = $seat_loader['seat16'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "B7"){
            $price += $movie_price;
            $seat17 = $seat_loader['seat17'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "B8"){
            $price += $movie_price;
            $seat18 = $seat_loader['seat18'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "B9"){
            $price += $movie_price;
            $seat19 = $seat_loader['seat19'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "B10"){
            $$price += $movie_price;
            $seat20 = $seat_loader['seat20'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "C1"){
            $price += $movie_price;
            $seat21 = $seat_loader['seat21'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "C2"){
            $price += $movie_price;
            $seat22 = $seat_loader['seat22'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "C3"){
            $price += $movie_price;
            $seat23 = $seat_loader['seat23'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "C4"){
            $price += $movie_price;
            $seat24 = $seat_loader['seat24'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "C5"){
            $price += $movie_price;
            $seat25 = $seat_loader['seat25'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "C6"){
            $price += $movie_price;
            $seat26 = $seat_loader['seat26'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "C7"){
            $price += $movie_price;
            $seat27 = $seat_loader['seat27'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "C8"){
            $price += $movie_price;
            $seat28 = $seat_loader['seat28'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "C9"){
            $price += $movie_price;
            $seat29 = $seat_loader['seat29'] = 1;
            $seats_occupied += 1;
          }
          if($checked[$i] == "C10"){
            $price += $movie_price;
            $seat30 = $seat_loader['seat30'] = 1;
            $seats_occupied += 1;
          }


          
        }
        if($price > $user_coins){
            $error_msg['error'] = "Insufficient Balance";
          }else{ // <-------
            $success +=1;
              foreach ( $_POST['seat'] as $seats) {
                $checks = array($_POST['seat']);
                }

                $check = implode(", ",$checks[0]);

                $ticket_num = rand(10000,99999);

                 $mail = new PHPMailer();  
                    //Set mailer to use smtp
                      $mail->isSMTP();
                    //Define smtp host
                      $mail->Host = "smtp.gmail.com";
                    //Enable smtp authentication
                      $mail->SMTPAuth = true;
                    //Set smtp encryption type (ssl/tls)
                      $mail->SMTPSecure = "tls";
                    //Port to connect smtp
                      $mail->Port = "587";
                    //Set gmail username
                      $mail->Username = "OathYenta@gmail.com";
                    //Set gmail password
                      $mail->Password = "10023654";
                    //Email subject
                      $mail->Subject = "Cinemazing Payment Confirmation";
                    //Set sender email
                      $mail->setFrom('OathYenta@gmail.com');
                     //Enable HTML
                      $mail->isHTML(true);
                     //add image
                     //  $mail->AddEmbeddedImage('login-css\images\email_logo.png', 'logo');
                     //$mail->AddEmbeddedImage('logo.png', 'logoimg', 'logo.png'); // attach file logo.jpg, and later link to it using identfier logoimg
                     $mail->Body = ($body);
                     $mail->AltBody="This is text only alternative body.";
                     //Email body
                      //  $mail->Body = ($body);
  
                      //Add recipient
                     $mail->addAddress($user_email);
                     /*$emailTo = "$user_email";
                     $subject = "Payment Confirmation";
                     $content = $body;
                     $headers = "From: cinemazingfilms@gmail.com";
                      //Finally send email*/
                      if ( $mail->send()) {
                        $movie_input = "INSERT INTO users_movie_entry (id, movie_name, username, email, ticket_no, seat_no, seats_occupied, total_payment, is_verified) VALUES ('?','$movie_name','$username','$user_email','$ticket_num','$check','$seats_occupied','$price','$is_verified')";
                        $res = mysqli_query($connection, $movie_input);

                        $seat_query = "UPDATE movie_seats SET seat1 =$seat1, seat2 =$seat2, seat3 =$seat3, seat4 =$seat4, seat5 =$seat5, seat6 =$seat6, seat7 =$seat7, seat8 =$seat8, seat9 =$seat9, seat10 =$seat10, seat11 =$seat11, seat12 =$seat12, seat13 =$seat13, seat14 =$seat14, seat15 =$seat15, seat16 =$seat16, seat17 =$seat17, seat18 =$seat18,seat19=$seat19, seat20 =$seat20, seat21 =$seat21, seat22 =$seat22, seat23 =$seat23, seat24 =$seat24, seat25 =$seat25, seat26 =$seat26, seat27 =$seat27, seat28 =$seat28, seat29 =$seat29, seat30=$seat30 WHERE movie_id = $movie_id";
                         $res = mysqli_query($connection, $seat_query);
                       
                       echo "<script>alert('We send email verification please check your email')</script>";
                     }else{
                       // echo $mail->ErrorInfo;
                        echo "<script>alert('FAIL')</script>";
                     }
                    //Closing smtp connection
                    // $mail->smtpClose();
               } // <------
      }  

      else if (empty($_POST['seat'])){
        $error_msg['error'] = "No seat selected";
      }

      }


    

 ?>


<div style="width: 20%">
    <ul class="showcase">
      <li>
        <div class="seat"></div>
        <small>N/A</small>
      </li>
      <li>
        <div class="seat selected"></div>
        <small>Selected</small>
      </li>
      <li>
        <div class="seat occupied"></div>
        <small>Occupied <?php echo $user_email; ?></small>
      </li>
    </ul>

    <div class="container">

      <div class="screen"><?php echo $movie_name."</br>"; echo $error_msg['error'] ; ?></div>
      
      <div class="seats">
        <form class=""  method="post">
          <section>
            <input id="seat-1" class="seat-select" type="checkbox" name="seat[]" value="A1" onclick="<?php echo $lock_seat['seat1']; ?>">
            <label for="seat-1" class="place" style="<?php echo $occupied_seats['seat1']; ?>"></label>

            <input id="seat-2" class="seat-select" type="checkbox" name="seat[]" value="A2" onclick="<?php echo $lock_seat['seat2']; ?>">
            <label for="seat-2" class="place" style="<?php echo $occupied_seats['seat2']; ?>"></label>

            <input id="seat-3" class="seat-select" type="checkbox" name="seat[]" value="A3" onclick="<?php echo $lock_seat['seat3']; ?>">
            <label for="seat-3" class="place" style="<?php echo $occupied_seats['seat3']; ?>" ></label>

            <input id="seat-4" class="seat-select" type="checkbox" name="seat[]" value="A4" onclick="<?php echo $lock_seat['seat4']; ?>">
            <label for="seat-4" class="place" style="<?php echo $occupied_seats['seat4']; ?>"></label>

            <input id="seat-5" class="seat-select" type="checkbox" name="seat[]" value="A5" onclick="<?php echo $lock_seat['seat5']; ?>">
            <label for="seat-5" class="place" style="<?php echo $occupied_seats['seat5']; ?>"></label>

            <input id="seat-6" class="seat-select" type="checkbox" name="seat[]" value="A6" onclick="<?php echo $lock_seat['seat6']; ?>">
            <label for="seat-6" class="place" style="<?php echo $occupied_seats['seat6']; ?>"></label>

            <input id="seat-7" class="seat-select" type="checkbox" name="seat[]" value="A7" onclick="<?php echo $lock_seat['seat7']; ?>">
            <label for="seat-7" class="place" style="<?php echo $occupied_seats['seat7']; ?>"></label>

            <input id="seat-8" class="seat-select" type="checkbox" name="seat[]" value="A8" onclick="<?php echo $lock_seat['seat8']; ?>">
            <label for="seat-8" class="place" style="<?php echo $occupied_seats['seat8']; ?>"></label>

            <input id="seat-9" class="seat-select" type="checkbox" name="seat[]" value="A9" onclick="<?php echo $lock_seat['seat9']; ?>">
            <label for="seat-9" class="place" style="<?php echo $occupied_seats['seat9']; ?>"></label>

            <input id="seat-10" class="seat-select" type="checkbox" name="seat[]" value="A10" onclick="<?php echo $lock_seat['seat10']; ?>">
            <label for="seat-10" class="place" style="<?php echo $occupied_seats['seat10']; ?>"></label>

            <input id="seat-11" class="seat-select" type="checkbox" name="seat[]" value="B1" onclick="<?php echo $lock_seat['seat11']; ?>">
            <label for="seat-11" class="place" style="<?php echo $occupied_seats['seat11']; ?>"></label>

            <input id="seat-12" class="seat-select" type="checkbox" name="seat[]" value="B2" onclick="<?php echo $lock_seat['seat12']; ?>">
            <label for="seat-12" class="place" style="<?php echo $occupied_seats['seat12']; ?>"></label>

            <input id="seat-13" class="seat-select" type="checkbox" name="seat[]" value="B3" onclick="<?php echo $lock_seat['seat13']; ?>">
            <label for="seat-13" class="place" style="<?php echo $occupied_seats['seat13']; ?>"></label>

            <input id="seat-14" class="seat-select" type="checkbox" name="seat[]" value="B4" onclick="<?php echo $lock_seat['seat14']; ?>">
            <label for="seat-14" class="place" style="<?php echo $occupied_seats['seat14']; ?>"></label>

            <input id="seat-15" class="seat-select" type="checkbox" name="seat[]" value="B5" onclick="<?php echo $lock_seat['seat15']; ?>">
            <label for="seat-15" class="place" style="<?php echo $occupied_seats['seat15']; ?>"></label>

            <input id="seat-16" class="seat-select" type="checkbox" name="seat[]" value="B6" onclick="<?php echo $lock_seat['seat16']; ?>">
            <label for="seat-16" class="place" style="<?php echo $occupied_seats['seat16']; ?>"></label>

            <input id="seat-17" class="seat-select" type="checkbox" name="seat[]" value="B7" onclick="<?php echo $lock_seat['seat17']; ?>">
            <label for="seat-17" class="place" style="<?php echo $occupied_seats['seat17']; ?>"></label>

            <input id="seat-18" class="seat-select" type="checkbox" name="seat[]" value="B8" onclick="<?php echo $lock_seat['seat18']; ?>">
            <label for="seat-18" class="place" style="<?php echo $occupied_seats['seat18']; ?>"></label>

            <input id="seat-19" class="seat-select" type="checkbox" name="seat[]" value="B9" onclick="<?php echo $lock_seat['seat19']; ?>">
            <label for="seat-19" class="place" style="<?php echo $occupied_seats['seat19']; ?>"></label>

            <input id="seat-20" class="seat-select" type="checkbox" name="seat[]" value="B10" onclick="<?php echo $lock_seat['seat20']; ?>">
            <label for="seat-20" class="place" style="<?php echo $occupied_seats['seat20']; ?>"></label>

            <input id="seat-21" class="seat-select" type="checkbox" name="seat[]" value="C1" onclick="<?php echo $lock_seat['seat21']; ?>">
            <label for="seat-21" class="place" style="<?php echo $occupied_seats['seat21']; ?>"></label>

            <input id="seat-22" class="seat-select" type="checkbox" name="seat[]" value="C2" onclick="<?php echo $lock_seat['seat22']; ?>">
            <label for="seat-22" class="place" style="<?php echo $occupied_seats['seat22']; ?>"></label>

            <input id="seat-23" class="seat-select" type="checkbox" name="seat[]" value="C3" onclick="<?php echo $lock_seat['seat23']; ?>">
            <label for="seat-23" class="place" style="<?php echo $occupied_seats['seat23']; ?>"></label>

            <input id="seat-24" class="seat-select" type="checkbox" name="seat[]" value="C4" onclick="<?php echo $lock_seat['seat24']; ?>">
            <label for="seat-24" class="place" style="<?php echo $occupied_seats['seat24']; ?>"></label><br>

            <input id="seat-25" class="seat-select" type="checkbox" name="seat[]" value="C5" onclick="<?php echo $lock_seat['seat25']; ?>">
            <label for="seat-25" class="place" style="<?php echo $occupied_seats['seat25']; ?>"></label>

            <input id="seat-26" class="seat-select" type="checkbox" name="seat[]" value="C6" onclick="<?php echo $lock_seat['seat26']; ?>">
            <label for="seat-26" class="place" style="<?php echo $occupied_seats['seat26']; ?>"></label>

            <input id="seat-27" class="seat-select" type="checkbox" name="seat[]" value="C7" onclick="<?php echo $lock_seat['seat27']; ?>">
            <label for="seat-27" class="place" style="<?php echo $occupied_seats['seat27']; ?>"></label>

            <input id="seat-28" class="seat-select" type="checkbox" name="seat[]" value="C8" onclick="<?php echo $lock_seat['seat28']; ?>">
            <label for="seat-28" class="place" style="<?php echo $occupied_seats['seat28']; ?>"></label>

            <input id="seat-29" class="seat-select" type="checkbox" name="seat[]" value="C9" onclick="<?php echo $lock_seat['seat29']; ?>">
            <label for="seat-29" class="place" style="<?php echo $occupied_seats['seat29']; ?>"></label>

            <input id="seat-30" class="seat-select" type="checkbox" name="seat[]" value="C10" onclick="<?php echo $lock_seat['seat30']; ?>">
            <label for="seat-30" class="place" style="<?php echo $occupied_seats['seat30']; ?>"></label>           
            
             <input type="submit" name="check-out" value="CHECK OUT" class="btn1 btn-danger btn-border"><br>
 
           </section>
         </form>
      </div>


     
    </div>
        <div id="coin-container">
          <div id="coin-box">
            <img src="login-css/images/ccoins_icon_p.png"; style="width: 23% ;height: 23%;">
            <?php echo "COINS: ".$user_coins; ?>
          </div>
        </div>
 </div>






<?php 


 ?>
