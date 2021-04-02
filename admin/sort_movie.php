<?php
session_start(); 
$username = $_SESSION['admin_username'];
if(isset($_SESSION['admin_username'])){
} else {
  header('Location: login.php');
  exit();
}

$connect = new PDO("mysql:host=localhost;dbname=cinemazing", "root", "");

if ($_POST["query"] != ''){
  $search_array = explode(",", $_POST["query"]);
  $search_text = "'" . implode("', '", $search_array) . "'";
  $query = "SELECT * FROM movies WHERE delete_movie = 0 AND genre IN (".$search_text.") ";
} else {
  $query = "SELECT * FROM movies WHERE delete_movie = 0 ORDER BY showdate, CAST(showtime AS UNSIGNED), showtime ASC";
}

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$total_row = $statement->rowCount();
$output = '';

if ($total_row > 0){
  foreach($result as $row) {
    $output .= '
    <tr>
    <th scope="row">'.$row['title'].'</th>
    <td>'.$row['director'].'</td>
    <td>'.$row['genre'].'</td>
    <td>'.$row['running_time'].'</td>
    <td>'.$row['release_year'].'</td>
    <td>'.$row['showdate'].'</td>
    <td>'.$row['showtime'].'</td>
    <td>'.$row['price'].'</td>
    <td> 30 </td>
    <td>
    <ul class="d-flex justify-content-center">
    <li class="mr-3"><a href="editmovie.php?movieID='.$row['movie_id'].'"class="btn btn-secondary"><i class="fa fa-edit"></i></a></li> <!--EDIT BUTTON -->
    <li class="mr-3"><a href="delete.php?delete='.$row['movie_id'].'" class="btn btn-danger"><i class="ti-trash"></i></a></li> <!--DELETE BUTTON -->
    </ul>
    </td>
    </tr>';
  }
} else {
  $output .= '
  <tr>
  <td colspan="10" align="center">No Data Found</td>
  </tr>';
}
echo $output;
?>