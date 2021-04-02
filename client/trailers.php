
<style type="text/css">
/* external css: flickity.css */

* { box-sizing: border-box; }

body { font-family: sans-serif; }

.carousel-cell-trailer {
  width: 100%;
  height: 750px;
  border-radius: 5px; 
}

/* cell number */
.carousel-cell:before {
  display: block;
  text-align: center;}

 .main-content{
 	margin-top: 100px;
 }

 .moviedef{

 	margin: 20px 50px;
 }

 .movie-seats {
  margin: 20px 0;

}

.movie-seats select {
  background-color: #fff;
  border: 0;
  border-radius: 5px;
  font-size: 14px;
  margin-left: 10px;
  padding: 5px 15px 5px 15px;
  appearance: none;
  -moz-appearance: none;
  -webkit-appearance: none;
}

.container {
  perspective: 1000px;
  margin-bottom: 10px;
}

.seat {
  background-color: #444451;
  height: 12px;
  width: 15px;
  margin: 3px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.seat.selected {
  background-color: #6feaf6;
}
.seat.occupied {
  background-color: #fff;
}

.allseats{
	margin-left: 250px;
}

.seat:nth-of-type(2) {
  margin-right: 18px;
}
.seat:nth-last-of-type(2) {
  margin-left: 18px;
}

.seat:not(.occupied):hover {
  cursor: pointer;
  transform: scale(1.2);
}
.showcase.seat:not(.occupied):hover {
  cursor: default;
  transform: scale(1);
}

.showcase {
  background-color: rgba(0, 0, 0, 0.1);
  padding: 5px 10px;
  border-radius: 5px;
  color: #777;
  list-style-type: none;
  display: flex;
  justify-content: space-around;
}
.showcase li {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 10px;
}
.showcase li small {
  margin-left: 2px;
}

.row {
  display: flex;
}

.screen {
  background-color: #fff;
  height: 70px;
  width: 100%;
  margin: 15px 0;
  transform: rotateX(-45deg);
  box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
}

p.text {
  margin: 5px 0;
}

p.text span {
  color: #6faef6;
}

#features{
  margin-top: -50px;
}


</style>
	<section class="w3l-bottom-grids-6 py-5" id="features">
  <div class="carousel" data-flickity='{ "autoPlay": true }'>
  <?php

  $connection = mysqli_connect("localhost","root","","cinemazing");
  $query = "SELECT * FROM `movies` WHERE `delete_movie` = 0 AND `showdate` = CURDATE() ";
  $res = mysqli_query($connection,$query); 
  while($row = mysqli_fetch_array($res)){

    ?>
        <div class="carousel-cell-trailer"> 
            <div style="margin-top: -90px;">
                <?php echo "<video muted autoplay src = '../admin/trailer/$row[trailer]' width=100%>"?>
                
            </div>
        </div>
      <?php
  }

  ?>
    </div>
  </section>

					  
