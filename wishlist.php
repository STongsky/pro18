<?php
require_once('session.php');
require_once('header.php');
?>

<?php
$upload_user = $_SESSION['user'];
$uid =  $_SESSION['user_id'];




if (isset($_POST['checkw']) == true ) {
 
  
   
   $delw_sql = "Delete from Wish_List where uid ='$uid' AND bid='".$_POST['delw_id']."'";
   
  
   
   
    if (mysqli_query($conn, $delw_sql)){
            //echo "Registration Success!"."<br>";
          //  echo("<script type='text/javascript'> 
                       // window.location = 'index.php'
                       echo "<script type='text/javascript'>alert('The Book is remove from Wish List')</script>";
                       unset($_POST);
                       
                  
        } else {
            echo "Error delete record: " . mysqli_error($conn)."<br>";
        }
    

}


?>
      <tr>
<div class="container">
  <div class="row">
    <div id="eg2" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <br>
        
        <h2>Wish List</h2>
        
        <br>	

          <?php
           $sql_wish_all = "SELECT * FROM `Wish_List`,`Book` WHERE Wish_List.bid = Book.bid AND uid='$uid'";
           $result_wish_all = mysqli_query($conn, $sql_wish_all);
          ?>
            <div class="row">


   <?php
  while ($record_all_wish = mysqli_fetch_assoc($result_wish_all)) {  ?>

    
    <!-- div open-->
  
     <div id="eg21" align="center" class="col-lg-4 col-md-6 col-sm-12 col-xs-12" >
    
      <a href="book_view.php?id=<?php echo $record_all_wish['bid']?>"><img style="width:100%;" src="
      <?php echo $record_all_wish['b_cover']?>">
       <div>Title: <?php echo $record_all_wish['b_title']?></div>
       <div>Trade_po: <?php echo $record_all_wish['b_trade_po']?></div>
       </a>
          <form action="" method="POST">
     <input id="delw_id" name="delw_id" type="hidden" value="<?php echo $record_all_wish['bid'] ?>">
     <input id="checkw" name="checkw" type="hidden" value="checkw">
     <input type ="button" class="btn btn-danger" id="delete_w" name="delete_w" value="Delete" onclick="confirmdelw(this.form)"></button>
     </form>
      
    
    </div>

   
      <!-- div close-->
      <?php
     
}
?>

        </div>
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

<script>
function confirmdelw(form) {
   
    if (confirm("confirm to remvoe from Wish List?")) {
   form.submit();

    } else {
        
      
    }
   // document.getElementById("check").innerHTML = txt;
}
</script>

<br><br><br><br><br><br>
    <?php include 'footer.php'?>
</body>
</html>