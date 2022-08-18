
<?php
error_reporting(E_ERROR | E_PARSE);
?>
<!--
<html lang="en">
<head>
  <title>Male</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
-->

  <div class="container">
    <h2>Latest Male only Doujinshi</h2>
      <div id="maCarousel" class="carousel slide multi-item-carousel" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#maCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#maCarousel" data-slide-to="1"></li>
          <li data-target="#maCarousel" data-slide-to="2"></li>
        </ol>

        <?php
        $all_male = "SELECT * FROM `Book` WHERE type ='Male' AND remove = 0 order by  bid DESC LIMIT 9";

        //S version             $all_male = "SELECT * FROM `Book` WHERE upload_author='".$_SESSION['user']."' AND type ='Male' AND remove = 0 order by  bid DESC LIMIT 9";

        $result_all_male = mysqli_query($conn, $all_male);
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
            while ($record_all_male[] = mysqli_fetch_assoc($result_all_male)) {
              if($i <= 2){
                ?>


                <div class="col-xs-4"><center>
                  <a href="book_view.php?id=<?php echo $record_all_male[$i]['bid']?>"><img style="width:100%;" src="<?php echo $record_all_male[$i]['b_cover']?>" ><br><?php echo $record_all_male[$i]['b_title']?></a><center>

                  </div>
                  <?php
                  $i++;
                }
              }
              ?>
            </div>

            <div class="item">
              <?php
              while ($ii <=5) {
                ?>
                <div class="col-xs-4"><center>
                  <a href="book_view.php?id=<?php echo $record_all_male[$ii]['bid']?>"><img style="width:100%;" src="<?php echo $record_all_male[$ii]['b_cover']?>" ><br><?php echo $record_all_male[$ii]['b_title']?></a><center>
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
                    <a href="book_view.php?id=<?php echo $record_all_male[$iii]['bid']?>"><img style="width:100%;" src="<?php echo $record_all_male[$iii]['b_cover']?>" ><br><?php echo $record_all_male[$iii]['b_title']?></a><center>
                    </div>
                    <?php
                    $iii ++;
                  }
                  ?>
                </div>
              </div>

              <!-- Wrapper for slides -->
              <!--
              <div class="carousel-inner">
              <div class="item active">
              <div class="col-xs-4"><center><img src="https://i.imgur.com/rKxi1lk.jpg" style="width:100%;"><br>car<center></div>

              <div class="col-xs-4"><center><img src="https://i.imgur.com/rKxi1lk.jpg" style="width:100%;"><br>car</center></div>

              <div class="col-xs-4"><center><img src="https://i.imgur.com/rKxi1lk.jpg" style="width:100%;"><br>car</center></div>
            </div>

            <div class="item">
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
    <a class="left carousel-control" href="#maCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#maCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>
