<?php session_start(); 
$username = $_SESSION['admin_username'];
if(isset($_SESSION['admin_username'])){
  }
 else{
  header('Location: login.php');
  exit();
  }



?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard - Cinemazing Films</title>
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
                            <li class="active">
                                <a href="index.php" aria-expanded="true"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                            </li>
                            <li><a href="movies.php"><i class="fa fa-film"></i> <span>Movies</span></a></li>
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
                            <h4 class="page-title pull-left">Dashboard</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                        <?php
                                  $aid = $_SESSION ['admin_id'];
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
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-users"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">NUMBER OF USERS</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <?php
                                            $servername = "localhost";
                                            $root = "root";
                                            $password = ""; 
                                            $dbname = "cinemazing";

                                            $newconn = mysqli_connect($servername, $root, $password, $dbname); 

                                            $this_sql = "SELECT count(DISTINCT username) AS cnt FROM users_movie_entry";
                                            $this_result = mysqli_query($newconn,$this_sql);
                                            $this_values = mysqli_fetch_assoc($this_result);
                                            $this_numrows = $this_values['cnt'];
                                        ?>
                                        <h2><?php echo $this_numrows ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-ticket"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">OCCUPIED SEATS</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <?php
                                            $this_sql = "SELECT SUM(seats_occupied) AS cnt FROM users_movie_entry";
                                            $this_result = mysqli_query($newconn,$this_sql);
                                            $this_values = mysqli_fetch_assoc($this_result);
                                            $this_numrows = $this_values['cnt'];
                                        ?>
                                        <h2><?php echo $this_numrows ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-film"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">TOP GROSSING FILM</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <?php
                                            $this_sql = "SELECT movie_name a, COUNT(movie_name) cnt FROM users_movie_entry GROUP BY movie_name ORDER BY cnt DESC limit 1";
                                            $this_result = mysqli_query($newconn,$this_sql);
                                            $this_values = mysqli_fetch_assoc($this_result);
                                            $this_numrows = $this_values['a'];
                                        ?>
                                        <h2><?php echo $this_numrows ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">TRANSACTIONS</h4>
                                <?php
                                                 
                                    $row = 0;
                                    $rowperpage = 5;
                                    if(isset($_POST['num_rows'])){
                                        $rowperpage = $_POST['num_rows'];
                                    }

                                    if(isset($_POST['but_prev'])){
                                        $row = $_POST['row'];
                                        $row -= $rowperpage;
                                        if( $row < 0 ){
                                            $row = 0;
                                            }
                                    }

                                    if(isset($_POST['but_next'])){
                                        $row = $_POST['row'];
                                        $allcount = $_POST['allcount'];
                                        $val = $row + $rowperpage;
                                        if( $val < $allcount ){
                                        $row = $val;
                                        }
                                    }        
                                ?>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Number</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Ticket Number</th>
                                                    <th scope="col">Seat Number</th>
                                                    <th scope="col">Seats Occupied</th>
                                                    <th scope="col">Total Payment</th>
                                                    <th scope="col">Verified</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                                $sql = "SELECT COUNT(*) AS cntrows FROM users_movie_entry";
                                                $result = mysqli_query($newconn,$sql);
                                                $fetchresult = mysqli_fetch_array($result);
                                                $allcount = $fetchresult['cntrows'];

                                                $sql = "SELECT * FROM users_movie_entry  ORDER BY id ASC limit $row,".$rowperpage;
                                                $result = mysqli_query($newconn,$sql);
                                                $sno = $row + 1;

                                                while($fetch = mysqli_fetch_array($result)){
                                                    $id = $fetch['id'];
                                                    $movie_name = $fetch['movie_name'];
                                                    $username = $fetch['username'];
                                                    $email = $fetch['email'];
                                                    $ticket_no = $fetch['ticket_no'];
                                                    $seat_no = $fetch['seat_no'];
                                                    $seats_occupied = $fetch['seats_occupied'];
                                                    $total_payment = $fetch['total_payment'];
                                                    $is_verified = $fetch['is_verified'];
                                                ?>
                                                <tr>
                                                    <td align='center'><?php echo $id; ?></td>
                                                    <td align='center'><?php echo $movie_name; ?></td>
                                                    <td align='center'><?php echo $username; ?></td>
                                                    <td align='center'><?php echo $email; ?></td>
                                                    <td align='center'><?php echo $ticket_no; ?></td>
                                                    <td align='center'><?php echo $seat_no; ?></td>
                                                    <td align='center'><?php echo $seats_occupied; ?></td>
                                                    <td align='center'><?php echo $total_payment; ?></td>
                                                    <td align='center'><?php echo $is_verified; ?></td>
                                                </tr>
                                                <?php
                                                        $sno ++;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <form method="post" id=form >
                                    <div id="pagination">
                                        <input type="hidden" name="row" value="<?php echo $row; ?>">
                                        <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                                        <br>
                                            <input type="submit" name="but_prev" style="border:none; background: none;" value="Previous"> &ensp;
                                                <select id="num_rows" name="num_rows" class="custome-select border-0 pr-3">  
                                                    <?php
                                                        $numrows_arr = array("5","10","25","50","100","250");
                                                        foreach($numrows_arr as $nrow){
                                                            if(isset($_POST['num_rows']) && $_POST['num_rows'] == $nrow){
                                                                echo '<option value="'.$nrow.'" selected="selected">'.$nrow.'</option>';
                                                            } else {
                                                                echo '<option value="'.$nrow.'">'.$nrow.'</option>';
                                                            }
                                                        }
                                                    ?>  
                                                </select>
                                            <input type="submit" name="but_next" style="border:none; background: none; padding: 10px 15px;" value="Next">
                                        <br>                                            
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
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
