<?php
require_once('session.php');
require_once('header.php');
?>



<?php
$upload_user = $_SESSION['user'];
?>



<?php


if(isset($_GET['keyword'])){
    $keyword = $conn->escape_string($_GET['keyword']); 
    
    $query = $conn->query("
    SELECT *  
    FROM Book
    WHERE b_title LIKE '%$keyword%'
    OR b_info LIKE '%$keyword%'
    OR b_trade_po LIKE '%$keyword%'    
    ");
    
    ?>
    
  
    
      <tr>
<div class="container">
  <div class="row">
    <div id="eg2" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <p>
        
        <h2>Search result</h2>
        
        <br>	
        <h4><center>
    <div class="result-count">
        Found 
        <?php 
        echo $query->num_rows; 
        ?> 
        results.
    </div>
            <br>	
    <?php

    if($query->num_rows) {
        while($r= $query->fetch_object()){
           // print_r($r);
           //echo  "select * from topic where b_title = $r->b_title";
           
           $search_search_Topic = "select * from Topic where b_title = '".$r->b_title."'";
           
          // echo  "select * from Topic where b_title = '".$r->b_title."'";
        
           



            $search_search_Topic_result = mysqli_query($conn,$search_search_Topic);
        
            
     
       ?>     
       
      
       
         <div id="eg21" class="result">
            
            
            <!--code neeeded-->
            <a href="book_view.php?id=<?php echo $r->bid;?>">
                 <?php if($r->type !== 'R18') {?>
                <img style="width:50%" src="<?php  echo $r->b_cover; ?>">
                <br>
                <?php }else if(isset($_SESSION['confirm18']) == 1){   ?>
                     <img style="width:50%" src="<?php  echo $r->b_cover; ?>">
               <?php }else{
               }?>
                
                <br>
                Title:
                <?php 
                    echo $r->b_title;
                ?>
                
                <br>
                Price:
                <?php 
                    echo $r->b_price;
                ?>
                 <br>
                Topic: 
                <?php  $cou_topic = 0; ?> 
            <?php    while ($search_search_Topic_all[] = mysqli_fetch_assoc($search_search_Topic_result)) { ?>
                      <?php 
                    
                    echo $search_search_Topic_all[ $cou_topic]['topic'];
                    
                 $cou_topic ++;
                ?>
                ,
                <?php } ?>
                
                 <?php  if($search_search_Topic_all[0]['topic'] ==  null ){ ?>
               no topic
              <?php }else{}  ?>
                
                
                <br>
                Trading Position:
                <?php
                    echo $r->b_trade_po;                    
                ?>
                <a>
         </div> <br>        <?php
        }
        
    }
    
}
    ?>                
        </center></h4>
<br>

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