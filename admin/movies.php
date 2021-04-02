<?php include("databasecreation.php"); ?>
<?php session_start(); 
$username = $_SESSION['admin_username'];
if(isset($_SESSION['admin_username'])){
} else {
  header('Location: login.php');
  exit();
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Movies - Cinemazing Films</title>
    <link rel="icon" href="login-css/icon.png" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- preloader area start -->
        <div id="preloader">
            <div class="loader"></div>
        </div>
        <!-- preloader area end -->
        <!-- page container area start -->
        <div class="page-container">
            <!-- sidebar menu area start -->
            <div class="sidebar-menu">
                <div class="sidebar-header">
                    <div class="logo">
                        <a href="index.php"><img src="assets/images/logo-cinemazing.png" alt="logo"></a>
                    </div>
                </div>
                <div class="main-menu">
                    <div class="menu-inner">
                        <nav>
                            <ul class="metismenu" id="menu">
                                <li>
                                    <a href="index.php" aria-expanded="true"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                                </li>
                                <li class="active"><a href="movies.php"><i class="fa fa-film"></i> <span>Movies</span></a></li>
                                <li><a href="accounts.php"><i class="fa fa-users"></i><span>Accounts</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- sidebar menu area end -->
            <!-- main content area start -->
            <div class="main-content">
                <!-- header area start -->
                <div class="header-area">
                    <div class="row align-items-center">
                        <!-- nav and search button -->
                        <div class="col-md-6 col-sm-8 clearfix">
                            <div class="nav-btn pull-left">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>                     
                        </div>
                        <!-- profile info & task notification -->
                        <div class="col-md-6 col-sm-4 clearfix">
                            <ul class="notification-area pull-right">
                                <li id="full-view"><i class="ti-fullscreen"></i></li>
                                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- header area end -->
                <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Movies</h4>
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="index.php">Home</a></li>
                                    <li><span>Dashboard</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix">
                            <div class="user-profile pull-right">
                                <?php
                                $aid = $_SESSION['admin_id'];
                              //Create Connection
                                $servername = "localhost";
                                $root = "root";
                                $password = "";
                                $dbname = "cinemazing";

                                $newconn = mysqli_connect($servername, $root, $password, $dbname);

                                $show_profile = "SELECT admin_profile FROM admin_account WHERE admin_id = $aid";
                                $res = mysqli_query($newconn, $show_profile);

                                if (mysqli_num_rows($res) > 0){
                                    while ($images = mysqli_fetch_assoc($res)){
                                        ?>
                                        <img class="avatar user-thumb" src="assets/images/profile/<?=$images['admin_profile']?>" alt="avatar">
                                        <?php
                                    }
                                }
                                ?>
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin<i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="settings.php">Settings</a>
                                    <a class="dropdown-item" href="logout.php">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_GET['success']) && $_GET['success'] == 1){
                    echo '
                    <div class="alert-dismiss">                                        
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> A new movie has been added.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times"></span>
                    </button>
                    </div>
                    </div>';
                } else if (isset($_GET['success']) && $_GET['success'] == 2){
                    echo '
                    <div class="alert-dismiss">                                        
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> The movie has been updated.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times"></span>
                    </button>
                    </div>
                    </div>';
                }
                ?>
                <!-- page title area end -->
                <div class="main-content-inner">
                    <!-- Movie list start -->
                    <div class="row mt-5 mb-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="header-title mb-0">List of Movies</h4><br>
                                            <form>
                                                <select name= "genre_movies" id="genre_movies" class="custome-select border-0 pr-3">
                                                    <option value="">Genre</option>
                                                    <?php

                                                    $connect = new PDO("mysql:host=localhost;dbname=cinemazing", "root", "");

                                                    $query = "SELECT DISTINCT genre FROM movies WHERE delete_movie = 0 ORDER BY genre ASC";

                                                    $statement = $connect->prepare($query);

                                                    $statement->execute();

                                                    $result = $statement->fetchAll();
                                                    foreach($result as $row)
                                                    {
                                                        echo '<option value="'.$row["genre"].'">'.$row["genre"].'</option>'; 
                                                    }
                                                    ?>
                                                    <input type="hidden" name="hidden_genre" id="hidden_genre" />
                                                    <div style="clear:both"></div>
                                                </select><br><br>
                                            </form>
                                            <div id="txtHint"><b> </b></div>
                                        </div>
                                        <form action="addmovie.php">
                                            <button class="btn btn-outline-danger pull-right" name="add-movie" type="submit">Add Movie</button>
                                        </form>
                                    </div>
                                    <div class="single-table">
                                        <div class="table-responsive">
                                            <table class="table table-hover progress-table text-center">
                                                <thead class="text-uppercase">
                                                    <tr>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Director</th>
                                                        <th scope="col">Genre</th>
                                                        <th scope="col">Runtime</th>
                                                        <th scope="col">Release Year</th>
                                                        <th scope="col">Showing</th>
                                                        <th scope="col">Time</th>
                                                        <th scope="col">Ticket Price</th>
                                                        <th scope="col">Available Seats</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- movie list end -->
                    <!-- jquery latest version -->
                    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
                    <!-- bootstrap 4 js -->
                    <script src="assets/js/popper.min.js"></script>
                    <script src="assets/js/bootstrap.min.js"></script>
                    <script src="assets/js/owl.carousel.min.js"></script>
                    <script src="assets/js/metisMenu.min.js"></script>
                    <script src="assets/js/jquery.slimscroll.min.js"></script>
                    <script src="assets/js/jquery.slicknav.min.js"></script>

                    <!-- start chart js -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
                    <!-- start highcharts js -->
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <!-- start zingchart js -->
                    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
                    <script>
                        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
                        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
                    </script>
                    <!-- all line chart activation -->
                    <script src="assets/js/line-chart.js"></script>
                    <!-- all pie chart -->
                    <script src="assets/js/pie-chart.js"></script>
                    <!-- others plugins -->
                    <script src="assets/js/plugins.js"></script>
                    <script src="assets/js/scripts.js"></script>
                </body>

                </html>

                <script>
                    $(document).ready(function(){
                        load_data();
                        function load_data(query='') {
                            $.ajax({
                                url:"sort_movie.php",
                                method:"POST",
                                data:{query:query},
                                success:function(data)
                                {
                                    $('tbody').html(data);
                                }
                            })
                        }
                        $('#genre_movies').change(function(){
                            $('#hidden_genre').val($('#genre_movies').val());
                            var query = $('#hidden_genre').val();
                            load_data(query);
                        });
                    });
                </script>