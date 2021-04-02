<?php
if(isset($_POST['add-movie'])) {
    $mov_title = $_POST['title'];
    $mov_director = $_POST['director'];
    $mov_genre = $_POST['genre'];
    $mov_running_time = $_POST['running-time'];
    $mov_release_year = $_POST['release-year'];
    $mov_description = $_POST['description'];
    $mov_date = $_POST['date'];
    $mov_time = $_POST['time'];
    $mov_price = $_POST['ticket-price'];
    $mov_delete = 0;

            //Create Connection
    $servername = "localhost";
    $root = "root";
    $password = "";
    $dbname = "cinemazing";

    $newconn = mysqli_connect($servername, $root, $password, $dbname);

    $datetime = "SELECT * FROM movies WHERE showtime = '$mov_time' AND showdate = '$mov_date'";

    $res_datetime = mysqli_query($newconn, $datetime);

    if (mysqli_num_rows($res_datetime) > 0) { //time and date validation
        header("location: addmovie.php?error=1");
    } else {
        $selectquery = "SELECT MAX(movie_id) FROM movies";
        $res = mysqli_query($newconn, $selectquery);
        $row = mysqli_fetch_array($res);

        $movie_id = $row[0]+1;

        $cover_name = $row[0]+1;
        $cover_name = $_FILES['cover']['name'];
        $cover_path = "poster/" . $cover_name;

        $trailer_name = $row[0]+1;
        $trailer_name = $_FILES['trailer']['name'];
        $trailer_path = "trailer/" . $trailer_name;

        if (move_uploaded_file($_FILES['cover']['tmp_name'], $cover_path)){
            if(move_uploaded_file($_FILES['trailer']['tmp_name'], $trailer_path)){
                $insertquery = "INSERT INTO movies (movie_id, title, director, genre, running_time, release_year, description, showdate, showtime, price, photo, trailer, delete_movie) VALUES ('$movie_id','$mov_title', '$mov_director', '$mov_genre', '$mov_running_time', '$mov_release_year', '$mov_description', '$mov_date', '$mov_time', '$mov_price', '$cover_name', '$trailer_name', '$mov_delete')";
                $res = mysqli_query($newconn, $insertquery);
                header("location:movies.php?success=1");
            }
        }
        $insertseats = "INSERT INTO movie_seats (movie_id) VALUES ($movie_id)";
            $res = mysqli_query($newconn, $insertseats);
            header("location: movies.php?success=1");
        }

    } if(isset($_POST['cancel'])){
        header("location: movies.php");
    }
?>