<?php
require_once('session.php');
require_once('header.php');
?>

<?php
$upload_user = $_SESSION['user'];
?>


<?php 

 
  

if (isset($_POST['check']) == true ) {
 
  
   
   $del_sql = "update `Book` set remove = 1 where bid ='".$_POST['del_id']."'";
   
   
    if (mysqli_query($conn, $del_sql)){
            //echo "Registration Success!"."<br>";
          //  echo("<script type='text/javascript'> 
                       // window.location = 'index.php'
                       echo "<script type='text/javascript'>alert('The Book is remove')</script>";
                       unset($_POST);
                       
                  
        } else {
            echo "Error delete record: " . mysqli_error($conn)."<br>";
        }
    

}
?>

<div class="container">
  <div class="row">


    <div id="eg2" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        
        <br>
        
        <h3>Edit Index</h3>
        
        <br>	
     
          <?php
           $sql_upbook_all = "SELECT * FROM `Book` WHERE upload_author='$upload_user' AND remove = 0 order by bid DESC";
    
  $result_upbook_all = mysqli_query($conn, $sql_upbook_all);
 ?>
  <div class="row">


   <?php
  while ($record_all_upload = mysqli_fetch_assoc($result_upbook_all)) {  ?>

    
    <!-- div open-->
  
     <div id="eg21" align="center" class="col-lg-4 col-md-6 col-sm-12 col-xs-12" >
      <a href="book_edit.php?id=<?php echo $record_all_upload['bid']?>"><img style="width:100%;" src="<?php echo $record_all_upload['b_cover']?>">
       <div> <?php echo $record_all_upload['b_title']?></div>
    </a>
    
   <br />
     <form action="" method="POST">
     <input id="del_id" name="del_id" type="hidden" value="<?php echo $record_all_upload['bid'] ?>">
     <input id="check" name="check" type="hidden" value="check">
     <input type ="button" class="btn btn-danger" id="delete" name="delete" value="Delete" onclick="confirmdel(this.form)"></button>
     </form>
    </div>

   
      <!-- div close-->
      <?php
     
}
?>
        </div>
                    <br><br>
                    <br><br><br>
        </div>
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 order-lg-first
      order-md-first order-sm-first">

      <tr>
        <?php include 'book_update.php'?>
      </tr>
    </div>
    
      
  </div>
</div>
<script>
function confirmdel(form) {
    var txt;
    if (confirm("confirm to delete?")) {
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