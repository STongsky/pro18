<?php 
require_once('session.php');
 
 print_r($_POST);
 
 $number = count($_POST["name"]);  
 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST["name"][$i] != ''))  
           {  
                $sql = "INSERT INTO Topic(b_title,topic) VALUES('$booktitle','".$_POST["name"][$i]."')";  
                mysqli_query($conn, $sql);  
           }  
      }  
      echo "Data Inserted";  
 }  
 else  
 {  
      echo "Please Enter Name";  
 }  
 ?> 
