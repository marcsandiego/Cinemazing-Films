<!doctype html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="assets/images/icon-cinemazing.png">
  <link href="//fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap"
    rel="stylesheet">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <!-- aos CSS -->
  <link rel="stylesheet" href="assets/css/aos.css">
</head>
<style type="text/css">
.carousel {
}

.carousel-cell {
  width: 260px;
  height: 350px;
  margin: 10px 0px 10px 10px;
  border-radius: 5px;
  counter-increment: gallery-cell;
}

.carousel-cell a:hover{
  cursor: grab;
}


.hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
}

.hovereffect .overlay {
  position: absolute;
  overflow: hidden;
  width: 80%;
  height: 80%;
  left: 10%;
  top: 10%;
  border-bottom: 1px solid #FFF;
  border-top: 1px solid #FFF;
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: scale(0,1);
  -ms-transform: scale(0,1);
  transform: scale(0,1);
}

.hovereffect:hover .overlay {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
  cursor: grab;
}

.hovereffect img {
  display: block;
  position: relative;
  -webkit-transition: all 0.35s;
  transition: all 0.35s;
}

.hovereffect:hover img {
  filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feComponentTransfer color-interpolation-filters="sRGB"><feFuncR type="linear" slope="0.6" /><feFuncG type="linear" slope="0.6" /><feFuncB type="linear" slope="0.6" /></feComponentTransfer></filter></svg>#filter');
  filter: brightness(0.6);
  -webkit-filter: brightness(0.6);
  cursor: grab;
}

.hovereffect h2 {
  text-transform: uppercase;
  text-align: center;
  position: relative;
  font-size: 17px;
  background-color: transparent;
  color: #FFF;
  padding: 1em 0;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(0,-100%,0);
  transform: translate3d(0,-100%,0);
}

.hovereffect a, .hovereffect p {
  color: #FFF;
  padding: 1em 0;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(0,100%,0);
  transform: translate3d(0,100%,0);
}

.hovereffect:hover a, .hovereffect:hover p, .hovereffect:hover h2 {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}

.justify{
  text-align: justify;
  text-justify: inter-word;
}
   
 </style>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<body>
  <!--header-->
  <header id="site-header" class="w3lhny-head fixed-top" >
    <div class="container">
      <nav class="navbar navbar-expand-lg stroke px-0">
          <a class="navbar-brand" href="homepage.php">
            <img style="margin-top: -10px;" src="assets/images/logo-cinemazing.png">
          </a>
        
        <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
          data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
          <span class="navbar-toggler-icon fa icon-close fa-times"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mx-lg-auto">
            <li class="nav-item active">
              <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
            </li>

             <li class="nav-item">
              <a class="nav-link" href="homepage.php#showing">In Cinema</a>
            </li>

             <li class="nav-item dropdown show">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Account
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="my_account.php">My Account</a>
                <a class="dropdown-item" href="account_settings.php">Account Settings</a>
                <a class="dropdown-item" href="add_ccoins.php">Add Cinema Coins</a>
                
              </div>
            </li> 

            <li class="nav-item">
              <a class="nav-link" href="homepage.php#services">Services</a>
            </li>

            <li class="nav-item" >
              <a class="nav-link" href="homepage.php#careers">Careers</a>
            </li>

         	  <li class="nav-item" >
              <a class="nav-link" href="homepage.php#about">About Us</a>
            </li>

            <li class="nav-item" >
              <a class="nav-link"><span id="datetime"></span></a>
            </li>

            <li class="nav-item">
            <a>
              <button type="button" class="btn btn-style btn-border" style="padding:10px 50px; font-size: 1em;" data-toggle="modal" data-target="#exampleModalCenter">Logout</button>
            </a>
        	 </li>

          </ul>
        </div>
        <!-- toggle switch for light and dark theme -->
            <div class="theme-switch-wrapper">

              <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox">
                <div class="mode-container">
                  <i class="gg-sun"></i>
                  <i class="gg-moon"></i>
                </div>
              </label>
            </div>
          </nav>
        </div>

        <!-- //toggle switch for light and dark theme -->
      </nav>
    </div>
  </header>
  <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document" >
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><span style="color:black">Cinemazing Films</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to logout?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="logout.php"><button type="button" class="btn btn-style btn-border">Logout</button></a>
                      </div>
                    </div>
                  </div>
                </div>


  <script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleString();
</script>

