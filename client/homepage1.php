 <!-- Large modal -->
          <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div id="mov" class="modal-dialog modal-lg">
              <div class="modal-content" style="background-color: #1c1c1c">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload();">
                          <span aria-hidden="true" style="color:white;">&times;</span>
                        </button></div>
                        <?php
                        if(isset($_POST['modal'])){
                          $ids = $_SESSION['id'];
                        $query = "SELECT * FROM `movies` WHERE `user_id` = '$ids'";
                        $res = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_array($res)){
                        echo "<video controls src = '../admin/trailer/$row[trailer]'>";
                        } 
                      }
                    ?>
                       
                  <div class="moviedef">
                                      <h6>Date and Time</h6>
                                      <h2>Avengers End Game (2020)</h2>
                                      <h6 style="font-size: .8em">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam tenetur impedit, autem dignissimos saepe doloribus harum incidunt inventore magni doloremque nemo cupiditate delectus fugiat cumque labore at ipsam fuga voluptatem?</h6>
                                      <h6>Directed by: Director</h6>
                                      <div class="w3l-ban-icons d-flex mt-4">
                                        <span class="divider-separator">
                                        </span>
                                      </div>
                    
                   
                  </div>
                  <div class="movie-seats">
                    <ul class="showcase">
                    <li>
                      <div class="seat"></div>
                      <small>N/A</small>
                    </li>
                    <li>
                      <div class="seat selected"></div>
                      <small>Selected</small>
                    </li>
                    <li>
                      <div class="seat occupied"></div>
                      <small>Occupied</small>
                    </li>
                  </ul>
                  <div class="container">
                    <div class="screen"></div>
                    <div class="allseats">
                    <div class="row">
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                    </div>

                    <div class="row">
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat occupied"></div>
                      <div class="seat occupied"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                    </div>

                    <div class="row">
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat occupied"></div>
                      <div class="seat occupied"></div>
                    </div>

                    <div class="row">
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                    </div>

                    <div class="row">
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat occupied"></div>
                      <div class="seat occupied"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                    </div>

                    <div class="row">
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat"></div>
                      <div class="seat occupied"></div>
                      <div class="seat occupied"></div>
                      <div class="seat occupied"></div>
                      <div class="seat"></div>
                      </div>
                    </div>
                  </div>
                
                     <a>
                       <button type="button" class="btn btn-style btn-border" style="padding:10px 50px; margin-right: 50px; float: right; font-size: 1em;" data-toggle="modal" data-target=".bd-example-modal-lg">Buy Ticket</button>
                      </a>
              </div>
            </div>
          </div>
        </div>