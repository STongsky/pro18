
<?php

error_reporting(E_ERROR | E_PARSE);
?>





  <div class="container">
    <h2>Latest Adult only Doujinshi</h2>
      <div id="rCarousel" class="carousel slide multi-item-carousel" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#rCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#rCarousel" data-slide-to="1"></li>
          <li data-target="#rCarousel" data-slide-to="2"></li>
        </ol>

        <?php
        $all_18 = "SELECT * FROM `Book` WHERE type ='R18' AND remove = 0 order by  bid DESC LIMIT 9";

        //  S version          $all_18 = "SELECT * FROM `Book` WHERE upload_author='".$_SESSION['user']."' AND type ='R18' AND remove = 0 order by  bid DESC LIMIT 9";

        $result_all_18 = mysqli_query($conn, $all_18);
        ?>

        <?php
        $i = 0;
        $ii = 3;
        $iii = 6;
        ?>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <?php
            while ($record_all_18[] = mysqli_fetch_assoc($result_all_18)) {
              if($i <= 2){
                ?>


                <div class="col-xs-4"><center>
                    
                    
                     <?php if(isset($_SESSION['confirm18']) == true) { ?>
                  <a href="book_view.php?id=<?php echo $record_all_18[$i]['bid']?>"><img style="width:100%;" src="<?php echo $record_all_18[$i]['b_cover']?>" ><br><?php echo $record_all_18[$i]['b_title']?></a><center>
                  <?php  }else{ ?>
                       <a href="book_view.php?id=<?php echo $record_all_18[$i]['bid']?>"><br><?php echo $record_all_18[$i]['b_title']?></a><center>
                      
                      
               <?php  } ?>     




                  </div>
                  <?php
                  $i++;
                }
              }
              ?>
            </div>


            <div class="item">

              <?php
              //echo $record_all_18[$ii]['b_title'];

              while ($ii <=5) {
                // print_r($record_all_18);
                ?>
                
                <div class="col-xs-4"><center>
                    
                    
                     <?php if(isset($_SESSION['confirm18']) == true) { ?>
                  <a href="book_view.php?id=<?php echo $record_all_18[$ii]['bid']?>"><img style="width:100%;" src="<?php echo $record_all_18[$ii]['b_cover']?>" ><br><?php echo $record_all_18[$ii]['b_title']?></a><center>
                     <?php }else{ ?>
                      <a href="book_view.php?id=<?php echo $record_all_18[$ii]['bid']?>"><br><?php echo $record_all_18[$ii]['b_title']?></a><center>
                     
                   <?php   } ?>





                  </div>

                  <?php

                  $ii++;

                }



                ?>
              </div>

              <div class="item">
                <?php
                while ($iii <=8) {
                  ?>
                  
                  
                   
                  <div class="col-xs-4"><center>
                      
                       <?php if(isset($_SESSION['confirm18']) == true) { ?>
                    <a href="book_view.php?id=<?php echo $record_all_18[$iii]['bid']?>"><img style="width:100%;" src="<?php echo $record_all_18[$iii]['b_cover']?>" ><br><?php echo $record_all_18[$iii]['b_title']?></a><center>
                       <?php }else{ ?>
                         <a href="book_view.php?id=<?php echo $record_all_18[$iii]['bid']?>"><br><?php echo $record_all_18[$iii]['b_title']?></a><center>
                             
                   <?php     } ?>




                    </div>
                    <?php

                    $iii ++;
                  }

                  ?>
                </div>


              </div>


              <!--<div class="col-xs-4"><center><img src="https://i.imgur.com/rKxi1lk.jpg" style="width:100%;"><br>car<center></div>

              <div class="col-xs-4"><center><img src="https://i.imgur.com/rKxi1lk.jpg" style="width:100%;"><br>car</center></div>

              <div class="col-xs-4"><center><img src="https://i.imgur.com/rKxi1lk.jpg" style="width:100%;"><br>car</center></div>

            </div> -->

            <!-- <div class="item">
            <div class="col-xs-4"><center><img src="https://i.imgur.com/rKxi1lk.jpg" style="width:100%;"><br>car<center></div>

            <div class="col-xs-4"><center><img src="https://i.imgur.com/rKxi1lk.jpg" style="width:100%;"><br>car</center></div>

            <div class="col-xs-4"><center><img src="https://i.imgur.com/rKxi1lk.jpg" style="width:100%;"><br>car</center></div>
          </div>

          <div class="item">
          <div class="col-xs-4"><center><img src="https://i.imgur.com/rKxi1lk.jpg" style="width:100%;"><br>car<center></div>

          <div class="col-xs-4"><center><img src="https://i.imgur.com/rKxi1lk.jpg" style="width:100%;"><br>car</center></div>

          <div class="col-xs-4"><center><img src="https://i.imgur.com/rKxi1lk.jpg" style="width:100%;"><br>car</center></div>
        </div>
      </div>
    -->

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#rCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#rCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>



</body>
</html>
