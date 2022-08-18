<?php
require_once('session.php');
require_once('header.php');
?>

<?php
$upload_user = $_SESSION['user'];
?>
      <tr>
<div class="container">
  <div class="row">
    <div id="eg2" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <br>
        
        <h2>Predict order</h2>
        <div class="row">
        <br>	

          <?php
          $sql_bid_wish = "select DISTINCT bid from Wish_List";
           $result_bid_wish = mysqli_query($conn,  $sql_bid_wish);
            while ($result_all_wish = mysqli_fetch_assoc($result_bid_wish)) {
               $sql_bid_count = "select count(bid)as count from Wish_List where bid ='".$result_all_wish['bid']."'";
               $sql_price = "select * from `Book` where bid ='".$result_all_wish['bid']."'";
                $result_bid_count = mysqli_query($conn,$sql_bid_count);
                $result_all_count = mysqli_fetch_assoc($result_bid_count);
                $result_sql_price = mysqli_query($conn,$sql_price);
                $result_all_price = mysqli_fetch_assoc($result_sql_price);
                
                $count_book_price = $result_all_count['count'] * $result_all_price['b_price'];
                
              ?>
               <div id="eg21" align="center" class="col-lg-4 col-md-6 col-sm-12 col-xs-12" >
    
                <img style="width:100%;" src=" <?php echo $result_all_price['b_cover']?>">
                
                <div> <?php echo $result_all_price['b_title']?></div>
                <div>Add Wish list number:<?php echo $result_all_count['count']?></div>
                 <div>Total Sales: $<?php echo $count_book_price?></div>
                  
                   </div>
              <?php  
                  
            }
        ?> 
        </div>
        <?php
          
         /*
          
           $sql_upbook_all = "SELECT * FROM `Book` WHERE upload_author='$upload_user'";
           $result_upbook_all = mysqli_query($conn, $sql_upbook_all);
          ?>
            <div class="row">


   <?php
  while ($record_all_upload = mysqli_fetch_assoc($result_upbook_all)) {  ?>

    
    <!-- div open-->
  
     <div id="eg21" align="center" class="col-lg-4 col-md-6 col-sm-12 col-xs-12" >
    
      <a href="book_edit.php?id=<?php echo $record_all_upload['bid']?>"><img style="width:100%;" src="
      <?php echo $record_all_upload['b_cover']?>
      ">
       <div> <?php echo $record_all_upload['b_title']?></div>
      </a>
    
    </div>

   
      <!-- div close-->
      <?php
     
}

?>

        </div>
        */
        ?>
                    <br><br><br><br><br>
        </div>
              </tr>

 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 order-lg-first
      order-md-first order-sm-first" >
      <tr>
        <?php include 'book_update.php'?>
      </tr>
    </div>
    
      
  </div>
</div>

<br><br><br><br><br><br>
    <?php include 'footer.php'?>
</body>
</html>