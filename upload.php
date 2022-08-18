<?php
 if(isset($_FILES['cover_file'])){
      $errors= array();
      $file_name = $_FILES['cover_file']['name'];
      $file_size =$_FILES['cover_file']['size'];
      $file_tmp =$_FILES['cover_file']['tmp_name'];
      $file_type=$_FILES['cover_file']['type'];
       $file_ext=strtolower(end(explode('.',$_FILES['cover_file']['name'])));
      
       $expensions= array("jpeg","jpg","png");
      
     
      
     if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
    
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"image/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
    }
    ?>