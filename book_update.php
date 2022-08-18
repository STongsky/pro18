<div id="eg2">
    <h1>Doujinshi update</h1>
<?php include 'database.php';

?>

  

<?php
    if(isset($_SESSION['confirm18']) == true){
    $sql_upbook = "SELECT * FROM `Book` where remove = 0 order by bid DESC LIMIT 5";
    }else{
     $sql_upbook = "SELECT * FROM `Book` where remove = 0 AND type !='R18' order by bid DESC LIMIT 5";
    }
  $result_upbook = mysqli_query($conn, $sql_upbook);
  // $record_all = mysqli_fetch_assoc($result_upbook);	
   
  while ($record_all = mysqli_fetch_assoc($result_upbook)) {
      
      ?>
    <div id="eg21">  
    
                      <a href="book_view.php?id=<?php echo $record_all['bid']?>"><img style="width:100%;" src="<?php echo $record_all['b_cover']?>" ><br><center><?php echo $record_all['b_title']?></a></center>

    
    
    

    </div>
    <br>
      
<?php
   //echo "<pre>";
   //print_r($record_all['b_cover']);
   //echo "</pre>";
     
}
?>
</div>

<!--
<div>
    <img style="width:100%;" src="image/<?php// echo "未命名.jpg"?>">
    <div align="center">echo happy;</div>
</div>
    <br />
    <div>
    <img style="width:100%;hegiht:100%;" src="image/<?php //echo "未命名.jpg"?>">
    <div align="center">echo happy;</div>
</div>
-->
    
    


