<?php
if (isset($_POST['add-movie'])){

//Create Connection
  $servername = "localhost";
  $root = "root";
  $password = "";
  $dbname = "movie_db";

  $newconn = mysqli_connect($servername, $root, $password, $dbname);

  $mov_title = $_POST['title'];
  $mov_director = $_POST['director'];
  $mov_genre = $_POST['genre'];
  $mov_running_time = $_POST['running-time'];
  $mov_release_year = $_POST['release-year'];
  $mov_description = $_POST['description'];
  $mov_date = $_POST['date'];
  $mov_time = $_POST['time'];
  $mov_price = $_POST['ticket-price'];
  $mov_cover = $_POST['cover'];
  $mov_trailer = $_POST['trailer'];

//Insert Data
  $insertquery = "INSERT INTO movies (title, director, genre, running_time, release_year, description, show_date, show_time, price, cover, trailer)
  VALUES ('$mov_title', '$mov_director', '$mov_genre', '$mov_running_time', '$mov_release_year', '$mov_description', '$mov_date', '$mov_time', '$mov_price', '$mov_cover', '$mov_trailer')";
  $res = mysqli_query($newconn, $insertquery);
}
?>