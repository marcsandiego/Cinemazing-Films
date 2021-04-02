<?php 
if (isset($_GET['delete'])){
    $mid = $_GET['delete'];

        //Create Connection
    $servername = "localhost";
    $root = "root";
    $password = "";
    $dbname = "cinemazing";

    $newconn = mysqli_connect($servername, $root, $password, $dbname);

    $selectquery = "SELECT delete_movie FROM movies WHERE movie_id = $mid";
    $res = mysqli_query($newconn, $selectquery);
    if (mysqli_num_rows($res)===1){
        $row = mysqli_fetch_assoc($res);
        $deletemov = "UPDATE movies SET delete_movie = 1 WHERE movie_id = $mid";
        $res = mysqli_query($newconn, $deletemov);
        header("location:movies.php");
    }
}
?>