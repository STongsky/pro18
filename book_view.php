<?php
require_once('session.php');

require_once('header.php');


//print_r($_SESSION);
//exit;

$id = $_GET['id'];
$now_user = $_SESSION['user'];


if (isset($_POST['yes18']) == true){
   // print_r($_POST);
    //exit;
    
  $_SESSION['confirm18'] =1;
  
 echo "<script type='text/javascript'> location.href ='http://doujintradetest.000webhostapp.com/book_view.php?id=$id';</script>";
    
}

if (isset($_POST['no18']) == true){
   
  
 echo "<script type='text/javascript'> location.href ='http://doujintradetest.000webhostapp.com/index.php';</script>";
    
}


if(isset($_SESSION['user_id']) == true){
    $uid = $_SESSION['user_id'];

$check_id_rating = "select * from Rating where uid = '$uid' AND bid= '$id'";
$check_id_rating_result = mysqli_query($conn, $check_id_rating);
$check_id_rating_row = mysqli_fetch_assoc($check_id_rating_result);

//echo "select * from Rating where uid = '$uid' AND bid= '$id'";
//exit;
}else{   




}



            
           



$view_book = "select * from `Book` where bid ='$id' AND remove = 0";

$view_book_result = mysqli_query($conn, $view_book);
$view_book_row = mysqli_fetch_assoc($view_book_result);

$avg_rating = "SELECT round(AVG(rating),2)as avg_rating FROM Rating WHERE bid = '$id'";
$avg_rating_result = mysqli_query($conn, $avg_rating);
$avg_rating_row = mysqli_fetch_assoc($avg_rating_result);

if($avg_rating_row['avg_rating'] == NULL) {
    $avg_rating_row['avg_rating'] = "This book had not been scored!";
}else{
    
}

 $search_view_Topic = "select * from Topic where b_title ='".$view_book_row['b_title']."'";
 $search_view_Topic_result = mysqli_query($conn,$search_view_Topic);



if($_SESSION['login'] > 0){
$wish_added = "select * from `Wish_List` where bid ='$id' AND uid = '$uid'";
$wish_added_result = mysqli_query($conn, $wish_added);
$wish_added_row = mysqli_fetch_assoc($wish_added_result);

}else{
    
}





$get_comment = //"select * from `Comment` where bid ='$id'";
"SELECT Comment.*,User.uname FROM Comment JOIN User ON Comment.uid=User.uid where bid ='$id'";


$view_preview = "select * from `Preview` where b_title ='".$view_book_row['b_title']."'";
$view_preview_result = mysqli_query($conn, $view_preview);
//$search_preview_row = mysqli_fetch_assoc($search_book_result);
 while ($view_preview_all[] = mysqli_fetch_assoc($view_preview_result)) {
   
   
    
 }
 
 if (isset($_POST['check']) == true ) {
     
     $insert_rating_sql = "INSERT INTO Rating(uid,bid,rating) VALUES ('$uid','$id','".$_POST['rating']."')";
     
    
     
     
     if (mysqli_query($conn, $insert_rating_sql)){
         
            //echo "Registration Success!"."<br>";
          //  echo("<script type='text/javascript'> 
                       // window.location = 'index.php'
                        echo "<script type='text/javascript'>alert('The Rating insert success');location.href ='http://doujintradetest.000webhostapp.com/book_view.php?id=$id';</script>";
                  
        } else {
           // echo "Error inserting rating: " . mysqli_error($conn)."<br>";
             echo "<script type='text/javascript'>alert('Error inserting rating for database connect');</script>";
        }
     
 }
 
 if (isset($_POST['upload_comment']) == true)  {
     if($_POST['comment'] !== "") {
     $insert_comment_sql = "INSERT INTO Comment(comment,uid,bid,c_datetime) VALUES ('".$_POST['comment']."','$uid','$id','$sdate')";
    

   //  print_r ($_POST);
   //  exit;
     
     
     if (mysqli_query($conn, $insert_comment_sql)){
            //echo "Registration Success!"."<br>";
          //  echo("<script type='text/javascript'> 
                       // window.location = 'index.php'
                        echo "<script type='text/javascript'>alert('The Comment insert success ');location.href ='http://doujintradetest.000webhostapp.com/book_view.php?id=$id';
                        </script>";
                        
     }else{
        echo "<script type='text/javascript'>alert('Error inserting comment for database connect');</script>";
     }       
        } else {
            echo "<script type='text/javascript'>alert('The comment can not be null');</script>";
        }
     
 }
 
 if(isset($_POST['check_del']) == true ){
     
     $delete_csql = "DELETE FROM Comment WHERE cid = '".$_POST['delete_comment']."'";
     
        
   
     
     
     
     
      if (mysqli_query($conn,  $delete_csql)){
            //echo "Registration Success!"."<br>";
          //  echo("<script type='text/javascript'> 
                       // window.location = 'index.php'
                        echo "<script type='text/javascript'>alert('The Comment Delete success ');location.href ='http://doujintradetest.000webhostapp.com/book_view.php?id=$id';
                        </script>";
                        
                  
        } else {
           // echo "Error Delete comment: " . mysqli_error($conn)."<br>";
             echo "<script type='text/javascript'>alert('Error Delete comment for database connect');</script>";
        }
     
 }
 
 if(isset($_POST['check_wish']) == true ){ 
     
      $wish_sql = "INSERT INTO Wish_List(uid,bid) VALUES ('$uid','$id')";
      
       if (mysqli_query($conn,   $wish_sql)){
            //echo "Registration Success!"."<br>";
          //  echo("<script type='text/javascript'> 
                       // window.location = 'index.php'
                        echo "<script type='text/javascript'>alert('The Book success add to Wish List ');location.href ='http://doujintradetest.000webhostapp.com/book_view.php?id=$id';
                        </script>";
                        
                  
        } else {
           // echo "Fail to add to Wish List: " . mysqli_error($conn)."<br>";
             echo "<script type='text/javascript'>alert('Error to add to wish list for database connect');</script>";
        }
     
 }

?>








<div class="container">
  <div class="row">


  
            
            
   <?php if(isset($_SESSION['confirm18']) == false && ($view_book_row['type'] == 'R18')) { ?>
   
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row">

        <div id="eg2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
         <div> <h1>Age Verification</h> </div>
         <br>
         <div>  <h4>You must be over 18 and agree to continuing.
Doujin KZN actively cooperates in all instances of suspected illegal use of the service with law enforcement.<h4></div>
<br>
         <div align="center" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
         <form action="" method="POST" id ="yes18form">
            
          <button id="yes18" name="yes18" value="Yes" class="btn btn-primary">Yes</button>
         </form>
         </div>
         <div align="center" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <form action="" method="POST" id ="no18form">
            <button id="no18" name="no18" value="No" class="btn btn-primary">No</button>
         </form>
         </div>
         </div>
         </div>
         </div>
 
 <?php }else{ ?>
            
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="row">

        <div id="eg2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            
            <h1>Doujinshi  rating</h1><br/>
           
           <div> <h3>Average rating:
           <span class="value"><?php echo $avg_rating_row['avg_rating']?></span></h3>
            </div>
           
           
           
            <form action="" method="POST" id ="ratingform">
  <div class="col col-fullwidth">
     
            <div class="star-ratings">

              <div class="stars stars-example-fontawesome-o">
               <?php    if(isset($_SESSION['user_id']) == true && $check_id_rating_row['rid'] == "") { ?>

                       <input id="check" name="check" type="hidden" value="check">
                <div class="br-wrapper br-theme-fontawesome-stars-o"><select id="rate" name="rating" data-current-rating="5.6" autocomplete="off" style="display: none;" onchange="if(confirm('Are you sure to submit the rate for the book?')){this.form.submit()}">
                  <option value=""></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select><div class="br-widget"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected"></a><a href="#" data-rating-value="2" data-rating-text="2" class="br-selected"></a><a href="#" data-rating-value="3" data-rating-text="3" class="br-selected"></a><a href="#" data-rating-value="4" data-rating-text="4" class="br-selected"></a><a href="#" data-rating-value="5" data-rating-text="5" class="br-selected"></a><a href="#" data-rating-value="6" data-rating-text="6" class="br-selected"></a><a href="#" data-rating-value="7" data-rating-text="7" class="br-selected"></a><a href="#" data-rating-value="8" data-rating-text="8" class="br-selected"></a><a href="#" data-rating-value="9" data-rating-text="9" class="br-selected"></a><a href="#" data-rating-value="10" data-rating-text="10" class="br-selected br-current"></a></div></div>
                <span class="title current-rating hidden">
                  Current rating: <span class="value">5.6</span>
                </span>
                <?php }elseif(isset($_SESSION['user_id']) == true && $check_id_rating_row['rid'] !== NULL) {?>
                <span class="title your-rating"> <h4>Your rating:</h4> 
                <span class="value"><?php echo $check_id_rating_row['rating']?></span>
                 <!-- <a href="#" class="clear-rating"><i class="fa fa-times-circle"></i></a>  -->
                </span>
               <?php }else{ ?>
            Please rate after you <a href="../login.php">log in</a> or <a href="../register.php">register<a>. 
          <?php  } ?>
              </div>
              
            </div>
          </div>
 </form>

          
            
        
           
            
        </div>

        <div id="eg2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " >
                  <div class="panel panel-info">
        <div class="panel-heading">  
      <h3>Cover</h3>
        </div>
        <!-- cover insert -->
        <div class="panel-body">          
             <img style="width:100%;" src="<?php echo $view_book_row['b_cover']?>">
            </div>
          </div>
          </div>
          <!--insert preview 1-->
          <div id="eg2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-info">
        <div class="panel-heading">  
              
             <!-- preivew -->
    <h3>Preview</h3>
         </div>

        <div class="panel-body">  
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
       <img style="width:100%;" src="<?php echo $view_preview_all[0]['pre_url']?>" >
       
    </div>

    <div class="item">
       <img style="width:100%;" src="<?php echo $view_preview_all[1]['pre_url']?>" >
    </div>

    <div class="item">
       <img style="width:100%;" src="<?php echo $view_preview_all[2]['pre_url']?>" >
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
  
</div></div>
           </div>
     </div>
    


          
          
          <div id="eg2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-info">
        <div class="panel-heading">  
              <h3>Book information</h3>
            </div>
        <div class="panel-body">  
            <div>Title
            <p>
                
                 
                 <label><?php echo $view_book_row['b_title'] ?></label>
            </div>
           
             <div>Size
             <p>
                
                  <label><?php echo $view_book_row['b_size'] ?></label>
            </div>
             <div>Packing
             <p>
               
                  <label><?php echo $view_book_row['b_packing'] ?></label>
            </div>
            <div>Price
            <p>
                
                  <label><?php echo $view_book_row['b_price'] ?></label>
            </div>
            <div>Release Day
            <p>
                 
                  <label><?php echo $view_book_row['b_re_day'] ?></label>
            </div>
             <div>Page
             <p>
                
                  <label><?php echo $view_book_row['b_page'] ?></label>
            </div>
            <div>Trading Position
            <p>
               
                  <label><?php echo $view_book_row['b_trade_po'] ?></label>
            </div>
             <div>Information
                <!-- <input id="book_info" name="book_info" type="comment" maxlength="300"> -->
                <p>
                
                  <label><?php echo $view_book_row['b_info'] ?></label>
            </div>
           
             <div>Quantity
             <p>
                
                  <label><?php echo $view_book_row['b_quantity'] ?></label>
            </div>
            
            <div>Topic
            <p>
               <?php    $c_topic = 0; ?>
                <?php  while ($search_view_Topic_all[] = mysqli_fetch_assoc($search_view_Topic_result)) { ?>
                    
                      
                    
                    <label><?php echo $search_view_Topic_all[$c_topic]['topic'] ?></label>
                    
                   
             <?php  $c_topic++; ?>
                ,
                <?php }   ?>
                 
               
             
               
                
              <?php  if($search_view_Topic_all[0]['topic'] ==  null ){ ?>
               <label>no topic</label>
              <?php }else{}  ?>
                
                </div>
            
            
            <div>Type
            <p>
           <label><?php echo $view_book_row['type'] ?></label>
            </div>
            <?php
            if($_SESSION['login'] > 0){
            if($wish_added_row['wid'] == NULL) { ?>
              <form action="" method="POST" id ="wish">
                   <input id="check_wish" name="check_wish" type="hidden" value="check">
            <div>
                 <input type ="button" class="btn btn-primary" id="wishbn" name="wishbutton" value="Add to Wish List" onclick="wish_c(this.form)"></button>
            </div>
            </form>
         <?php   }else{ ?>
             <input type ="button" class="btn btn-primary" id="wishal" name="wishalbutton" value="Already add to Wish List" disabled></button>
          <?php  } 
          }else {
          }?>
            
            </div>
            </div>
        
            
          </div>
          
        <div id="eg2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >

            <h1>Comment</h1>
            <br />
          <?php  if(isset($_SESSION['user_id']) == true){?>
              <form action="" method="POST" id ="commentform">
             <textarea class="form-rounded" id="commentbox" value="" name="comment"></textarea>
             <br><br>
             <button id="upload_comment" name="upload_comment" value="upload_comment" class="btn btn-primary">Upload</button>
             </form>
             <br>
          <?php }else{?>
            Please leave a comment after you <a href="../login.php">log in</a> or <a href="../register.php">register<a>.
                <br><br>
              <?php } ?>

             <?php
             $get_comment_result = mysqli_query($conn, $get_comment);
//$search_preview_row = mysqli_fetch_assoc($search_book_result);
            while ($get_comment_all = mysqli_fetch_assoc($get_comment_result)) {
     
     ?>

     <form action="" method="POST" id ="deletec">
            <div class="panel panel-info">
                <div class="panel-heading text-right">
                    <?php echo  $get_comment_all['uname']; ?> at
                    <?php echo  $get_comment_all['c_datetime']; ?>
                    <input name="save_uname" type="hidden" value= <?php echo  $get_comment_all['uname']; ?>>
                    <input id="check_del" name="check_del" type="hidden" value="check">
                    <input id="delete_comment" name="delete_comment" type="hidden" value=<?php echo  $get_comment_all['cid']; ?>>
                    <?php if($now_user == $get_comment_all['uname']) { ?>
                    
                    
                   <!-- <button id="delete_comment"  name="delete_comment" value= <?php //echo  $get_comment_all['cid']; ?> class="btn btn-primary" onclick="delete_c(this.form)" >Delete</button>  -->
                    
                    
                    <input type ="button" class="btn btn-danger" id="delete_button" name="delete_button" value="Delete" onclick="delete_c(this.form)"></button>
                  
                    
                    <?php } ?>
                </div>

                <div class="panel-body">
                    <?php echo  $get_comment_all['comment']; ?>
                </div>
        </div>
        </form>
 <?php }?>
           </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 order-lg-first
      order-md-first order-sm-first">

      <tr>
        <?php include 'book_update.php'?>
      </tr>
    </div>
  </div>
  
</div>
<?php } ?>
</body>
</html>

<!--
<script type="text/javascript">
   $(function() {
    $('#rate').barrating({
      theme: 'fontawesome-stars'
       
    });
  });
</script>
 -->


<script type="text/javascript">
$('#rate').barrating('show', {
  theme: 'fontawesome-stars',
  onSelect: function(value, text, event, form) {
    if (typeof(event) !== 'undefined') {
      // rating was selected by a user
      console.log(event.target);
    } else {
      // rating was selected programmatically
      // by calling `set` method
    }
    // if (confirm("The rate of the book is " + rate.value +" confirm to submit?")) {
  // $('ratingform').submit();
   
   
    // }else{
         
    // }
    
  }
});
</script>

<script>
function rating() {
   
  // form.submit();
    $('ratingform').submit();
}
</script>

<script>
function delete_c(form) {
   
   if (confirm("confirm to delete?")) {
   form.submit();

    } else {
       
      
    }
   
}
</script>

<script>
function wish_c(form) {
   
   if (confirm("confirm add to wishlist?")) {
   form.submit();

    } else {
       
      
    }
   
}
</script>




<!--
<style type="text/css">
	.starRate {position:relative; margin:20px; overflow:hidden; zoom:1;}
	.starRate ul {width:160px; margin:0; padding:0;}
	.starRate li {display:inline; list-style:none;}
	.starRate a, .starRate b {background:url(star_rate.gif) left top repeat-x;}
	.starRate a {float:right; margin:0 80px 0 -144px; width:80px; height:16px; background-position:left 16px; color:#000; text-decoration:none;}
	.starRate a:hover {background-position:left -32px;}
	.starRate b {position:absolute; z-index:-1; width:80px; height:16px; background-position:left -16px;}
	.starRate div b {left:0px; bottom:0px; background-position:left top;}
	.starRate a span {position:absolute; left:-300px;}
	.starRate a:hover span {left:90px; width:100%;}
</style>
-->
<?php 



/*
    <!-- preivew -->
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
       <img style="width:100%;" src="<?php echo $$view_preview_all[0]['pre_url']?>" >
    </div>

    <div class="item">
       <img style="width:100%;" src="<?php echo $$view_preview_all[1]['pre_url']?>" >
    </div>

    <div class="item">
       <img style="width:100%;" src="<?php echo $$view_preview_all[2]['pre_url']?>" >
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

*/

?>
<br><br><br><br><br><br>
    <?php include 'footer.php'?>
</body>
</html>