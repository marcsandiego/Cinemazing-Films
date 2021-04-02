<?php
session_start();
if(isset($_SESSION['username'])){
  }
 else{
  header('Location: login.php');
  exit();
  }
require 'header-loggedin.php';
 ?>
 <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
 <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
 <title>Cinemazing Films | Reserve Ticket </title>


 <style type="text/css">
/* external css: flickity.css */

* { box-sizing: border-box; }

body { font-family: sans-serif; }

.carousel-cell-trailer {
  width: 100%;
  height: 670px;
  border-radius: 5px;
  background-image: 
}

/* cell number */
.carousel-cell:before {
  display: block;
  text-align: center;}

 .main-content{
  margin-top: 100px;
 }

</style>


<div class="middle py-5">
    <div class="container py-lg-5 py-md-4 py-3">
      <div class="carousel-cell-trailer">
                <?php 
                $user_email = $_SESSION['email'] ;
                $user_coins = $_SESSION['c_coins'];
          if (isset($_GET['movieID'])){
            $movie_id = $_GET['movieID'];
            $movie_name = $_GET['title'];
                  $connection = mysqli_connect("localhost","root","","cinemazing");
                              $query = "SELECT * FROM `movies` WHERE `movie_id` = $movie_id";
                              $res = mysqli_query($connection,$query);
                              while($row = mysqli_fetch_array($res)){
                                  echo "<video controls autoplay loop src = '../admin/trailer/$row[trailer]' width=100%>";
                                
                                //echo "<video controls src = '../admin/trailer/$row[trailer]'>";
                                //echo "<img src = '../admin/poster/$row[photo]' width = '260px' height='350px'>";
                              
                        }
                     }
                   ?>
               </div>
      </div>

<?php
  include ('seats.php');
 ?>

  </div>
               
<?php
  include ('scripts.php');
 ?>
</body>
</html>

