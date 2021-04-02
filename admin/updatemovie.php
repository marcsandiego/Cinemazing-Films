<?php
$servername = "localhost";
$root = "root";
$password = "";
$dbname = "cinemazing";

$newconn = mysqli_connect($servername, $root, $password, $dbname);

if(isset($_POST['update-movie'])){

    $mid = $_POST['mid'];
    $nmov_title = $_POST['new-title'];
    $nmov_director = $_POST['new-director'];
    $nmov_genre = $_POST['new-genre'];
    $nmov_running_time = $_POST['new-running-time'];
    $nmov_release_year = $_POST['new-release-year'];
    $nmov_description = $_POST['new-description'];
    $nmov_date = $_POST['new-date'];
    $nmov_time = $_POST['new-time'];
    $nmov_price = $_POST['new-ticket-price'];

    $datetime = "SELECT * FROM movies WHERE showtime = '$nmov_time' AND showdate = '$nmov_date'";

    $res_datetime = mysqli_query($newconn, $datetime);

    if (mysqli_num_rows($res_datetime) > 1) { //time and date validation
        header("location: editmovie.php?movieID=$mid&error=1");
    } else {
        $selectquery = "SELECT * FROM movies WHERE movie_id = $mid";
        $res = mysqli_query($newconn, $selectquery);
        $row = mysqli_fetch_array($res);

        $trailer_name = $row[0]+1;
        $trailer_name = $_FILES['new-trailer']['name'];
        $trailer_path = "trailer/" . $trailer_name;

        $cover_name = $row[0]+1;
        $cover_name = $_FILES['new-cover']['name'];
        $cover_path = "poster/" . $cover_name;

        if (move_uploaded_file($_FILES['new-cover']['tmp_name'], $cover_path)){
            $updateCover = "UPDATE movies SET photo = '$cover_name' WHERE movie_id = $mid";
            $res = mysqli_query($newconn, $updateCover);
        }

        if(move_uploaded_file($_FILES['new-trailer']['tmp_name'], $trailer_path)){
            $updateTrailer = "UPDATE movies SET trailer = '$trailer_name' WHERE movie_id = $mid";
            $res = mysqli_query($newconn, $updateTrailer);
        }

        $selectquery = "SELECT * FROM movies WHERE movie_id = $mid";
        $res = mysqli_query($newconn, $selectquery);

        if (mysqli_num_rows($res)===1){
            $row = mysqli_fetch_assoc($res);
            $updatemovie = "UPDATE movies SET title = '$nmov_title', director = '$nmov_director', genre = '$nmov_genre', running_time = '$nmov_running_time', release_year = '$nmov_release_year', description = '$nmov_description', showdate = '$nmov_date', showtime = '$nmov_time', price = '$nmov_price' WHERE movie_id = $mid";

            $res = mysqli_query($newconn, $updatemovie);
        }
        header("location:movies.php?success=2");
    }
}else if(isset($_POST['cancel'])){
    header("location:movies.php");
}
?>