<?php include("addmoviedatabase.php"); ?>
<?php session_start();
$username = $_SESSION['admin_username'];
if(isset($_SESSION['admin_username'])){
}
else{
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Movies - Cinemazing Films</title>
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
                                    <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                </li>
                                <li class="active"><a href="movies.php"><i class="ti-map-alt"></i> <span>Movies</span></a></li>
                                <li><a href="accounts.php"><i class="ti-map-alt"></i> <span>Accounts</span></a></li>
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
                if (isset($_GET['error']) && $_GET['error'] == 1){
                    echo '
                    <div class="alert-dismiss">                                        
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> The timeslot has already been taken.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times"></span>
                    </button>
                    </div>
                    </div>';
                }
                ?>
                <!-- page title area end -->
                <div class="main-content-inner">
                    <div class="row">
                        <div class="col-lg-6 col-ml-12">
                            <div class="row">
                                <!-- Textual inputs start -->
                                <div class="col-3 mt-5"></div>
                                <div class="col-6 mt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="post" enctype="multipart/form-data">
                                                <h4 class="header-title">Add Movie</h4>
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">Title</label>
                                                    <input class="form-control" name="title" type="text" required="" id="example-text-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label" >Director</label>
                                                    <input class="form-control" name="director" type="text" required="" id="example-text-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label" >Genre</label>
                                                    <input class="form-control" name="genre" type="text" required="" id="example-text-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label" >Running Time in Minutes</label>
                                                    <input class="form-control" name="running-time" type="text" required="" id="example-text-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label" >Release Year</label>
                                                    <input class="form-control" name="release-year" type="text" required="" id="example-text-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label" >Description</label>
                                                    <input class="form-control" name="description" type="text" required="" id="example-text-input">
                                                </div>
                                                <div class="form-row align-items-center">
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label" for="inlineFormInputName" >Date</label>
                                                        <input class="form-control form-control-lg mb-4" name="date" required="" type="date" id="inlineFormInputName">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label" for="inlineFormInputName" >Time</label>
                                                        <select class="form-control form-control-lg mb-4" name="time" required="" id="inlineFormInputName">
                                                            <option selected disable="">--:-- - --:--</option>
                                                            <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                                                            <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
                                                            <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                                                            <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                                                            <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
                                                            <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label" >Ticket Price</label>
                                                    <input class="form-control" name="ticket-price" type="text" required="" id="example-text-input">
                                                </div>
                                                <div class="custom-file">
                                                    <label for="inputGroupFile03" class="custom-file-label">Upload Movie Poster</label>
                                                    <input class="custom-file-input" name="cover" type="file" required="" accept="image/" id="inputGroupFile03">
                                                </div>
                                                <div class="custom-file">
                                                    <label for="inputGroupFile03" class="custom-file-label">Upload Movie Trailer</label>
                                                    <input class="custom-file-input" name="trailer" type="file" required="" accept="video/" id="inputGroupFile03">
                                                </div>                                      
                                                
                                                <button style="margin: 20px 0px 0px 0px;" class="btn btn-danger pull-right" name="add-movie" type="submit">Add Movie</button>
                                            </form>
                                            <form action="movies.php">
                                                <button style="margin: 20px 10px 0px 10px;" class="btn btn-outline-secondary pull-right" name="cancel" type="submit">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mt-5"></div>
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
