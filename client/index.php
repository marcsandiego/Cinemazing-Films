
<?php
require 'header.php';
require 'dbconfig.php';
 ?>
 <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
 <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
 <title>Cinemazing Films </title>

  <?php  
  include ("trailers.php");
  ?>


<div class="content-1 py-5" style="margin-top:-100px;">
  <section class="w3l-team-main" id="showing">
    <div class="team py-5">
        <div class="container py-lg-5">
            <div class="title-content text-center">
              <div class="header-title" style="width: 100%">
                <span class="sub-title">Now Showing</span>
                <h3 class="title-w3l">IN CINEMA</h3>               
             <div class="carousel-cell-trailer" data-flickity='{ "groupCells": 1 }'>
                    <?php
                    $db = mysqli_select_db($connect,'cinemazing');
                    $query = "SELECT * FROM `movies` WHERE `delete_movie` = 0 AND `showdate` = CURDATE()";
                    $res = mysqli_query($connect,$query);
                    while($row = mysqli_fetch_array($res)){

                      ?>
                          <div style=" margin:50px 90px 0px 90px; padding: 10px; background-color:#f4f4f4"> 
                              <div class="hovereffect">
                                  <?php echo "<img src = '../admin/poster/$row[photo]' width = '370px' height='650px'>";

                                  ?>
                                  <div class="overlay">
                                      <h1><?php echo ($row['title'])." (".($row['release_year']).")";?></h1>
                                      <h2><?php echo ($row['running_time'])." min | ".($row['genre']);?></h2> 
                                      <h2></h2>
                                      <h2></h2>
                                      <h2></h2>
                                       <h2>Directed by: <?php echo ($row['director']);?></h2> 
                                      <h2><?php echo ($row['showtime']);?></h2> 
                                      <li class="nav-item">
                                        <?php echo '<a  href="login.php">                        
                                         <button type="button" name="seats" class="btn btn-danger btn-border" style="padding:10px 50px; font-size: 1em;" >Buy Ticket</button>
                                        </a>';?>
                                      </li>                
                                  </div>
                              </div>
                          </div>
                        <?php
                    }
                  ?>
              </div>   
        </div>
</div>
</section>
</div>
 
  <!--MOVIE LIST NA PARANG NETFLX/ bali naka while siguro to--->
<section class="w3l-bottom-grids-6 py-5" id="movie-list">
    <h6 class="sub-title"> Action</h6>
  <div class="carousel" data-flickity='{ "groupCells": 7 }'>
  <?php
  $db = mysqli_select_db($connect,'cinemazing');
  $query = "SELECT * FROM `movies` WHERE `genre` = 'action' AND `delete_movie` = 0 AND `showdate` >= CURDATE() ";
  $res = mysqli_query($connect,$query);
  while($row = mysqli_fetch_array($res)){

    ?>
        <div class="carousel-cell"> 
            <div class="hovereffect">
                <?php echo "<img src = '../admin/poster/$row[photo]' width = '270px' height='350px'>";

                ?>
                <div class="overlay">
                    <h2><?php echo ($row['title']);?></h2> 
                    <h2><?php echo ($row['director']);?></h2> 
                    <h2></h2><h2></h2>
                    <li class="nav-item">
                      <?php echo '<a  href="movie_preview.php?movieID='.$row['movie_id']."&"."title=".$row['title'].'">                        
                       <button type="button" name="seats" class="btn btn-danger btn-border" style="padding:10px 50px; font-size: 1em;" >Buy Ticket</button>
                      </a>';?>
                    </li>                
                </div>
            </div>
        </div>
      <?php
  }
  ?>
    </div>
  </section>

  <section class="w3l-bottom-grids-6 py-5" id="features">
    <h6 class="sub-title"> Comedy</h6>
  <div class="carousel" data-flickity='{ "groupCells": 7 }'>
  <?php
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,'cinemazing');
  $query = "SELECT * FROM `movies` WHERE `genre` = 'comedy' AND `delete_movie` = 0 AND `showdate` >= CURDATE()";
  $res = mysqli_query($connection,$query);
  $ctr = 0;
  while($row = mysqli_fetch_array($res)){

    ?>
        <div class="carousel-cell"> 
            <div class="hovereffect">
                <?php echo "<img src = '../admin/poster/$row[photo]' width = '260px' height='350px'>";

                ?>
                <div class="overlay">
                    <h2><?php echo ($row['title']);?></h2> 
                    <h2><?php echo ($row['director']);?></h2> 
                    <h2></h2><h2></h2>
                    <li class="nav-item">
                      <?php echo '<a  href="movie_preview.php?movieID='.$row['movie_id']."&"."title=".$row['title'].'">                        
                       <button type="button" name="seats" class="btn btn-danger btn-border" style="padding:10px 50px; font-size: 1em;" >Buy Ticket</button>
                      </a>';?>
                    </li>                
                </div>
            </div>
        </div>
      <?php
  }
  ?>
    </div>
  </section>


<section class="w3l-bottom-grids-6 py-5" id="features">
    <h6 class="sub-title"> Crime</h6>
  <div class="carousel" data-flickity='{ "groupCells": 7 }'>
  <?php
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,'cinemazing');
  $query = "SELECT * FROM `movies` WHERE `genre` = 'crime' AND `delete_movie` = 0 AND `showdate` >= CURDATE()";
  $res = mysqli_query($connection,$query);
  while($row = mysqli_fetch_array($res)){

    ?>
        <div class="carousel-cell"> 
            <div class="hovereffect">
                <?php echo "<img src = '../admin/poster/$row[photo]' width = '260px' height='350px'>";

                ?>
                <div class="overlay">
                    <h2><?php echo ($row['title']);?></h2> 
                    <h2><?php echo ($row['director']);?></h2> 
                    <h2></h2><h2></h2>
                    <li class="nav-item">
                      <?php echo '<a  href="movie_preview.php?movieID='.$row['movie_id']."&"."title=".$row['title'].'">                        
                       <button type="button" name="seats" class="btn btn-danger btn-border" style="padding:10px 50px; font-size: 1em;" >Buy Ticket</button>
                      </a>';?>
                    </li>                
                </div>
            </div>
        </div>
      <?php
  }
  ?>
    </div>
  </section>

  <section class="w3l-bottom-grids-6 py-5" id="features">
    <h6 class="sub-title"> Drama</h6>
  <div class="carousel" data-flickity='{ "groupCells": 7 }'>
  <?php
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,'cinemazing');
  $query = "SELECT * FROM `movies` WHERE `genre` = 'drama' AND `delete_movie` = 0 AND `showdate` >= CURDATE()";
  $res = mysqli_query($connection,$query);
  $ctr = 0;
  while($row = mysqli_fetch_array($res)){

    ?>
        <div class="carousel-cell"> 
            <div class="hovereffect">
                <?php echo "<img src = '../admin/poster/$row[photo]' width = '260px' height='350px'>";

                ?>
                <div class="overlay">
                    <h2><?php echo ($row['title']);?></h2> 
                    <h2><?php echo ($row['director']);?></h2> 
                    <h2></h2><h2></h2>
                    <li class="nav-item">
                      <?php echo '<a  href="movie_preview.php?movieID='.$row['movie_id']."&"."title=".$row['title'].'">                        
                       <button type="button" name="seats" class="btn btn-danger btn-border" style="padding:10px 50px; font-size: 1em;" >Buy Ticket</button>
                      </a>';?>
                    </li>                
                </div>
            </div>
        </div>
      <?php
  }
  ?>
    </div>
  </section>

  <section class="w3l-bottom-grids-6 py-5" id="features">
    <h6 class="sub-title"> Fantasy</h6>
  <div class="carousel" data-flickity='{ "groupCells": 7 }'>
  <?php
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,'cinemazing');
  $query = "SELECT * FROM `movies` WHERE `genre` = 'fantasy' AND `delete_movie` = 0 AND `showdate` >= CURDATE()";
  $res = mysqli_query($connection,$query);
  $ctr = 0;
  while($row = mysqli_fetch_array($res)){

    ?>
        <div class="carousel-cell"> 
            <div class="hovereffect">
                <?php echo "<img src = '../admin/poster/$row[photo]' width = '260px' height='350px'>";

                ?>
                <div class="overlay">
                    <h2><?php echo ($row['title']);?></h2> 
                    <h2><?php echo ($row['director']);?></h2> 
                    <h2></h2><h2></h2>
                    <li class="nav-item">
                      <?php echo '<a  href="movie_preview.php?movieID='.$row['movie_id']."&"."title=".$row['title'].'">                        
                       <button type="button" name="seats" class="btn btn-danger btn-border" style="padding:10px 50px; font-size: 1em;" >Buy Ticket</button>
                      </a>';?>
                    </li>                
                </div>
            </div>
        </div>
      <?php
  }
  ?>
    </div>
  </section>

  <section class="w3l-bottom-grids-6 py-5" id="features">
    <h6 class="sub-title"> Horror</h6>
  <div class="carousel" data-flickity='{ "groupCells": 7 }'>
  <?php
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,'cinemazing');
  $query = "SELECT * FROM `movies` WHERE `genre` = 'horror' AND `delete_movie` = 0 AND `showdate` >= CURDATE()";
  $res = mysqli_query($connection,$query);
  $ctr = 0;
  while($row = mysqli_fetch_array($res)){

    ?>
        <div class="carousel-cell"> 
            <div class="hovereffect">
                <?php echo "<img src = '../admin/poster/$row[photo]' width = '260px' height='350px'>";

                ?>
                <div class="overlay">
                    <h2><?php echo ($row['title']);?></h2> 
                    <h2><?php echo ($row['director']);?></h2> 
                    <h2></h2><h2></h2>
                    <li class="nav-item">
                      <?php echo '<a href="movie_preview.php?movieID='.$row['movie_id']."&"."title=".$row['title'].'">                        
                       <button type="button" name="seats" class="btn btn-danger btn-border" style="padding:10px 50px; font-size: 1em;" >Buy Ticket</button>
                      </a>';?>
                    </li>                
                </div>
            </div>
        </div>
      <?php
  }
  ?>
    </div>
  </section>

  <section class="w3l-bottom-grids-6 py-5" id="features">
    <h6 class="sub-title"> Romance</h6>
  <div class="carousel" data-flickity='{ "groupCells": 7 }'>
  <?php
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,'cinemazing');
  $query = "SELECT * FROM `movies` WHERE `genre` = 'romance' AND `delete_movie` = 0 AND `showdate` >= CURDATE()";
  $res = mysqli_query($connection,$query);
  $ctr = 0;
  while($row = mysqli_fetch_array($res)){

    ?>
        <div class="carousel-cell"> 
            <div class="hovereffect">
                <?php echo "<img src = '../admin/poster/$row[photo]' width = '260px' height='350px'>";

                ?>
                <div class="overlay">
                    <h2><?php echo ($row['title']);?></h2> 
                    <h2><?php echo ($row['director']);?></h2> 
                    <h2></h2><h2></h2>
                    <li class="nav-item">
                      <?php echo '<a  href="movie_preview.php?movieID='.$row['movie_id']."&"."title=".$row['title'].'">                        
                       <button type="button" name="seats" class="btn btn-danger btn-border" style="padding:10px 50px; font-size: 1em;" >Buy Ticket</button>
                      </a>';?>
                    </li>                
                </div>
            </div>
        </div>
      <?php
  }
  ?>
    </div>
  </section>

  <section class="w3l-bottom-grids-6 py-5" id="features">
    <h6 class="sub-title"> Fiction</h6>
  <div class="carousel" data-flickity='{ "groupCells": 7 }'>
  <?php
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,'cinemazing');
  $query = "SELECT * FROM `movies` WHERE `genre` = 'fiction' AND `delete_movie` = 0 AND `showdate` >= CURDATE()";
  $res = mysqli_query($connection,$query);
  $ctr = 0;
  while($row = mysqli_fetch_array($res)){

    ?>
        <div class="carousel-cell"> 
            <div class="hovereffect">
                <?php echo "<img src = '../admin/poster/$row[photo]' width = '260px' height='350px'>";

                ?>
                <div class="overlay">
                    <h2><?php echo ($row['title']);?></h2> 
                    <h2><?php echo ($row['director']);?></h2> 
                    <h2></h2><h2></h2>
                    <li class="nav-item">
                      <?php echo '<a  href="movie_preview.php?movieID='.$row['movie_id']."&"."title=".$row['title'].'">                        
                       <button type="button" name="seats" class="btn btn-danger btn-border" style="padding:10px 50px; font-size: 1em;" >Buy Ticket</button>
                      </a>';?>
                    </li>                
                </div>
            </div>
        </div>
      <?php
  }
  ?>
    </div>
  </section>





  <!--/movie list /-->
 
  <!-- quote -->
  <div class="middle py-5">
    <div class="container py-lg-5 py-md-4 py-3">
      <div class="welcome-left text-center" data-aos="zoom-out">
        <span class="sub-title mb-2">Watch with Us</span>
        <h3 class="title-w3l">“If you want a happy ending, that depends, of course, on where you stop your story.”<br><br><span><h4> -Orson Welles</h4></span></h3>
        <a href="login.php" class="btn btn-style btn-border mt-sm-5 mt-4">Buy Ticket</a>
      </div>
    </div>
  </div>
  <!-- //quote -->
  <!-- //services -->
  <section class="w3l-gallery-25-top" id="services">
      <!-- gallery-25 -->
      <div class="gallery-25 py-5">
        <div class="container py-lg-5 py-md-4">
           <div class="header-title mx-auto text-center mb-md-5 mb-4">
            <span class="sub-title">Services</span>
            <h3 class="title-w3l">What We Offer</h3>
          </div>
         
          <div class="gallery-25-content">
            <div class="d-grid grid-columns">
              <div class="column">
                <div class="box13">
                  <a><img class=" side-img" src="assets/images/cinema-seats.jpg" alt=""></a>
                </div>
              </div>
              <div class="column two">
                <div class="box13">
                  <h3><a>
                    Onlines Seats Reservation</a></h3>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. dolor veniamet
                    suscipit, esse illu non,
                    cumque? ratione sit init...</p>
                </div>
              </div>
            </div>

            <div class="grid-columns d-grid">
              <div class="column two order-1">
                <div class="box13">
                  <h3><a>Online Payment: Cinema Coins</a></h3>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. dolor veniamet
                    suscipit, esse illu non,
                    cumque? ratione sit init...</p>
                </div>
              </div>
              <div class="column order-2">
                <div class="box13">
                  <a><img class=" side-img" src="assets/images/pay.jpg" alt=""></a>
                </div>
              </div>
            </div>

            <div class="d-grid grid-columns">
              <div class="column">
                <div class="box13">
                  <a><img class=" side-img" src="assets/images/snb.jpg" alt=""></a>
                </div>
              </div>
              <div class="column two">
                <div class="box13">
                  <h3><a>
                    Snacks & Beverages</a></h3>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. dolor veniamet
                    suscipit, esse illu non,
                    cumque? ratione sit init...</p>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    </section>
    <!--careers-->
    <div class="w3l-clients-1">
    <section class="w3l-how-grids-3" id="careers">
    <div class="container-fluid">
      <div class="row d-grid grid-col-2 grid-element-9 px-lg-0">
        <div class="left-texthny p-lg-5 py-4">
          <div class="left-texthny-2 p-lg-5 p-4">
            <h6 class="sub-title"> Careers</h6>
            <h3 class="title-w3l">Jobs at Cinemazing Films
            </h3>
            <p class="my-3 pr-lg-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur hic odio
              voluptatem
              tenetur consequatur.Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
              voluptate rem ullam dolore nisi voluptatibus esse quasi.</p>
          </div>
        </div>
        <div class="left-grid-ele-9 grid-bg1">
        </div>
      </div>
      <div class="row d-grid grid-col-3 grid-element-9 px-lg-0">
        <div class="left-grid-ele-9 grid-bg2">

        </div>
        <div class="left-texthny-3 p-lg-5 py-4 d-grid align-items-center">
          <div class="sub-wid-grid-9 py-lg-0 py-5">
            <span class="fa fa-video-camera mb-4"></span>
            <h4 class="text-grid-9"><a>Projectionist</a></h4>
            <p class="sub-para">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>

          </div>
        </div>
        <div class="left-grid-ele-9 grid-bg3" style="background-image: url(assets/images/usher.jpg);">

        </div>
        <div class="left-texthny-3 p-lg-5 py-4 d-grid align-items-center">
          <div class="sub-wid-grid-9 py-lg-0 py-5">
            <span class="fa fa-users mb-4"></span>
            <h4 class="text-grid-9"><a>Usher</a></h4>
            <p class="sub-para">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>

  <!--/about us -->
<section class="w3l-bottom-grids-6 py-5" id="about">
    <div class="midd-w3 py-5">
        <div class="container py-lg-5 py-md-4">
            <div class="row">
                <div class="col-lg-6 pr-lg-5">
                    <div class="image grids">
                        <div class="grid1">
                            <img data-aos="fade-down" data-aos-duration="1500" src="assets/images/shelby.jpg" alt="" class="radius-image img-fluid">
                            <img data-aos="fade-right" data-aos-duration="1500" src="assets/images/film.jpg" alt="" class="radius-image img-fluid mt-4">
                        </div>
                        <div class="grid2">
                            <img data-aos="fade-left" data-aos-duration="1500" src="assets/images/community.jpg" alt="" class="radius-image img-fluid">
                            <img data-aos="fade-up" data-aos-duration="1500" src="assets/images/popcorn.jpg" alt="" class="radius-image img-fluid mt-4">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pl-lg-5 mt-lg-0 mt-md-5 mt-4 align-self" data-aos="zoom-out"  data-aos-delay="400">
                  <div class="header-title mb-4">
                    <span class="sub-title">About</span>
                    <h3 class="title-w3l">Cinemazing Films</h3>
                  </div>
                  <div class="justify">
                    <p class="mt-md-4 mt-3">Cinemazing Films is an online cinema ticket reservation developed by the startup company – "The Team". The prime purpose of Cinemazing Films is to provide convenient, hassle-free and user-friendly web-based ticket reservation for their well-deserved entertainment.</p>
                        <p class="mt-4"> We believe that the capability and quality of the company's product will serve customers with an amazing and enjoyable movie-going experience. We are committed to being “The most amazing place to watch!”.</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w3l-clients-1">
    <!-- /the team -->
    <div class="customer-layout py-5">
      <div class="container py-lg-5 py-md-4" data-aos="fade-up"
     data-aos-anchor-placement="bottom-bottom" data-aos-duration="800">
        <div class="heading text-center mx-0">
          <h6 class="sub-title text-center mx-0">About Us</h6>
          <h3 class="title-w3l">
            THE TEAM</h3>
        </div>
        <!-- /grids -->
        <div class="testimonial-row mt-5">
          <div id="owl-demo1" class="owl-two owl-carousel owl-theme mb-md-3 mb-sm-5 mb-4">
            <div class="item">
              <div class="testimonial-content">
                <div class="testimonial">
                  <div class="test-img"><img src="assets/images/troy.jpg" class="img-fluid" alt="client-img">
                  </div>
                  <blockquote data-aos="flip-left">
                    <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                      laudantium Quas minima sunt natus tempore, maiores aliquid modi felis vitae
                      facere aperiam sequi optio lacinia id ipsum non velit, culpa.
                      voluptate rem ullam dolore nisi est quasi, doloribus tempora.</q>
                  </blockquote>
                  <div class="separatorhny"></div>
                  <div class="testi-des">
                    <div class="peopl align-self">
                      <h3>Troy Angel Reyes</h3>
                      <p class="indentity">Founder - Full Stack Developer</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-content">
                <div class="testimonial">
                  <div class="test-img"><img src="assets/images/cindy.jpg" class="img-fluid" alt="client-img">
                  </div>
                  <blockquote>
                    <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                      laudantium Quas minima sunt natus tempore, maiores aliquid modi felis vitae
                      facere aperiam sequi optio lacinia id ipsum non velit, culpa.
                      voluptate rem ullam dolore nisi est quasi, doloribus tempora.</q>
                  </blockquote>
                  <div class="separatorhny"></div>
                  <div class="testi-des">
                    <div class="peopl align-self">
                      <h3>Cindy Jari Billones</h3>
                      <p class="indentity">Co-Founder - Database Developer</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-content">
                <div class="testimonial">
                  <div class="test-img"><img src="assets/images/legarte.jpg" class="img-fluid" alt="client-img">
                  </div>
                  <blockquote>
                    <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                      laudantium Quas minima sunt natus tempore, maiores aliquid modi felis vitae
                      facere aperiam sequi optio lacinia id ipsum non velit, culpa.
                      voluptate rem ullam dolore nisi est quasi, doloribus tempora.</q>
                  </blockquote>
                  <div class="separatorhny"></div>
                  <div class="testi-des">
                    <div class="peopl align-self">
                      <h3>Vince Legarte</h3>
                      <p class="indentity">Product Manager - Backend Developer</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item" data-aos="zoom-out">
              <div class="testimonial-content">
                <div class="testimonial">
                  <div class="test-img"><img src="assets/images/corbin.jpg" class="img-fluid" alt="client-img">
                  </div>
                  <blockquote>
                    <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                      laudantium Quas minima sunt natus tempore, maiores aliquid modi felis vitae
                      facere aperiam sequi optio lacinia id ipsum non velit, culpa.
                      voluptate rem ullam dolore nisi est quasi, doloribus tempora.</q>
                  </blockquote>
                  <div class="separatorhny"></div>
                  <div class="testi-des">
                    <div class="peopl align-self">
                      <h3>Corbin Fernad</h3>
                      <p class="indentity">Business Analysis - UI/UX Designer</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-content">
                <div class="testimonial">
                  <div class="test-img"><img src="assets/images/sandiego.jpg" class="img-fluid" alt="client-img">
                  </div>
                  <blockquote>
                    <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                      laudantium Quas minima sunt natus tempore, maiores aliquid modi felis vitae
                      facere aperiam sequi optio lacinia id ipsum non velit, culpa.
                      voluptate rem ullam dolore nisi est quasi, doloribus tempora.</q>
                  </blockquote>
                  <div class="separatorhny"></div>
                  <div class="testi-des">
                    <div class="peopl align-self">
                      <h3>Marc San Diego</h3>
                      <p class="indentity">Scrum Master - Full Stack Developer</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /grids -->
    </div>
    <!-- //grids -->
  </section>
  <!-- //about us -->
 <!-- //about us end-->
<?php 
  include ('footer.php');
  include ('scripts.php');
 ?>
</body>
</html>