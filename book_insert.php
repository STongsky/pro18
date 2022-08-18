<?php
require_once('session.php');


if (isset($_POST['upload']) == true ) {
    
  //print_r($_POST);
  //if(preg_match('/(jpe?g|png)$/', $_POST['textimgurl'])) {
       //echo $_POST["name"][$i];
       

     
    // exit;
     
 

       
       
  
$upload =1;
//print_r($_POST);
//print_r($_SESSION);
    
  //exit;
  
  if($_POST['uploadtypesubmit'] == 1) {
  if(isset($_FILES['cover_file'])){
    $errors= array();
    $file_name = $_FILES['cover_file']['name'];
    $file_size =$_FILES['cover_file']['size'];
    $file_tmp =$_FILES['cover_file']['tmp_name'];
    $file_type=$_FILES['cover_file']['type'];
    // $file_ext= strtolower(end(explode('.',$_FILES['cover_file']['name'])));
    $file_ext=explode('.',$_FILES['cover_file']['name']);
    $file_ext2= strtolower(end($file_ext));

   
    
    

    $expensions= array("jpeg","jpg","png");

    if(in_array($file_ext2,$expensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      $upload = 0;
      
    }

    if(empty($errors)==true){
      move_uploaded_file($file_tmp,"image/cover/".$file_name);
     // echo "Success";
      
      $book_file = "image/cover/".$file_name;
      $upload_author = $_SESSION['user'];
      
       //echo $book_file;
   // exit;
      
    }else{
      
        $upload= 0;
        
        echo "<script type='text/javascript'>alert('$errors[0]')</script>";
        
    }
  } // end of isset cover file 
  
  }else if($_POST['uploadtypesubmit'] == 2) {// end of upload type 
  if(preg_match('/(jpe?g|png|JPE?G|PNG)$/', $_POST['textimgurl'])) {
    $book_file = $_POST['textimgurl'];
     $upload_author = $_SESSION['user'];
   // echo $book_file;
    //exit;
  }else{
       echo "<script type='text/javascript'>alert('The cover is not PNG,JPG,JPEG!')</script>";
       $upload = 0;
       
  }
  }
  
  // preview 1
   $preview1_file ="";
   $preview1_page = 1;
  if($_POST['uploadpretype1'] == 1){
      if(isset($_FILES['pre_file1'])){
    $errors= array();
    $file_name_pre1 = $_FILES['pre_file1']['name'];
    $file_size_pre1 =$_FILES['pre_file1']['size'];
    $file_tmp_pre1 =$_FILES['pre_file1']['tmp_name'];
    $file_type_pre1 =$_FILES['pre_file1']['type'];
    // $file_ext= strtolower(end(explode('.',$_FILES['pre1_file']['name'])));
    $file_ext_pre1=explode('.',$_FILES['pre_file1']['name']);
    $file_ext2_pre1= strtolower(end($file_ext_pre1));

    
    $expensions= array("jpeg","jpg","png");
    
  
    
    
     if($_FILES['pre_file1']['error'] == 4){
         $preview1_file = "";
        
    }else if(in_array($file_ext2_pre1,$expensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      
     
    }
    
     if($_FILES['pre_file1']['error'] == 4){
          $preview1_file = "";
     }
     else if(empty($errors)==true){
      move_uploaded_file($file_tmp_pre1,"image/preview/".$file_name_pre1);
     // echo "Success";
      
      $preview1_file = "image/preview/".$file_name_pre1;
     
    }else{
    echo "<script type='text/javascript'>alert('$errors[0]')</script>";
       $upload = 0;
    }
    
  }
  }else{// end of upload type 
    if($_POST['textimgpreurl'] !== ""){
        if(preg_match('/(jpe?g|png|JPE?G|PNG)$/', $_POST['textimgpreurl'])) {
    $preview1_file = $_POST['textimgpreurl'];
        
        }else{
             echo "<script type='text/javascript'>alert('The preview1 is not PNG,JPG,JPEG!')</script>";
       $upload = 0;
        }
    }else{
        $preview1_file = $_POST['textimgpreurl'];
    }
  }
  
  $preview1_sql = "INSERT INTO Preview(b_title,preview_page,pre_url) VALUES ('".$_POST['book_title']."','$preview1_page','$preview1_file')";
  
 
  
  
  //preview 2
    $preview2_file ="";
   $preview2_page = 2;
   if($_POST['uploadpretype2'] == 1){
      if(isset($_FILES['pre_file2'])){
    $errors= array();
    $file_name_pre2 = $_FILES['pre_file2']['name'];
    $file_size_pre2 =$_FILES['pre_file2']['size'];
    $file_tmp_pre2 =$_FILES['pre_file2']['tmp_name'];
    $file_type_pre2 =$_FILES['pre_file2']['type'];
    // $file_ext= strtolower(end(explode('.',$_FILES['cover_file']['name'])));
    $file_ext_pre2=explode('.',$_FILES['pre_file2']['name']);
    $file_ext2_pre2= strtolower(end($file_ext_pre2));

   
    
    

    $expensions= array("jpeg","jpg","png");


     if($_FILES['pre_file2']['error'] == 4){
         $preview2_file = "";
        
    }else if(in_array($file_ext2_pre2,$expensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
     if($_FILES['pre_file2']['error'] == 4){
     }
     else if(empty($errors)==true){
      move_uploaded_file($file_tmp_pre2,"image/preview/".$file_name_pre2);
     // echo "Success";
      
      $preview2_file = "image/preview/".$file_name_pre2;
      
     
  
      
    }else{
    echo "<script type='text/javascript'>alert('$errors[0]')</script>";
       $upload = 0;
    }
  }
  
  }else if($_POST['uploadpretype2'] == 2) {// end of upload type 
   if($_POST['textimgpreurl2'] !== ""){
        if(preg_match('/(jpe?g|png|JPE?G|PNG)$/', $_POST['textimgpreurl2'])) {
    $preview2_file = $_POST['textimgpreurl2'];
        
        }else{
             echo "<script type='text/javascript'>alert('The preview2 is not PNG,JPG,JPEG!')</script>";
       $upload = 0;
        }
    }else{
        $preview2_file = $_POST['textimgpreurl2'];
    }
   
  
  }
  
   $preview2_sql = "INSERT INTO Preview(b_title,preview_page,pre_url) VALUES ('".$_POST['book_title']."','$preview2_page','$preview2_file')";
  
  
  
   //preview 3
    $preview3_file ="";
   $preview3_page = 3;
   if($_POST['uploadpretype3'] == 1){
       
      
   
      if(isset($_FILES['pre_file3'])){
    $errors= array();
    $file_name_pre3 = $_FILES['pre_file3']['name'];
    $file_size_pre3 =$_FILES['pre_file3']['size'];
    $file_tmp_pre3 =$_FILES['pre_file3']['tmp_name'];
    $file_type_pre3 =$_FILES['pre_file3']['type'];
    // $file_ext= strtolower(end(explode('.',$_FILES['cover_file']['name'])));
    $file_ext_pre3=explode('.',$_FILES['pre_file3']['name']);
    $file_ext2_pre3= strtolower(end($file_ext_pre3));

   
    
    

    $expensions= array("jpeg","jpg","png");
    if($_FILES['pre_file3']['error'] == 4){
         $preview3_file = "";
        
    }else if(in_array($file_ext2_pre3,$expensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

     if($_FILES['pre_file3']['error'] == 4){
     
         
         
     }else if(empty($errors)==true){
      move_uploaded_file($file_tmp_pre3,"image/preview/".$file_name_pre3);
     // echo "Success";
      
      $preview3_file = "image/preview/".$file_name_pre3;
     
    }else{
    echo "<script type='text/javascript'>alert('$errors[0]')</script>";
       $upload = 0;
    }
  }
  
  }else if($_POST['uploadpretype3'] == 2) {// end of upload type 
   if($_POST['textimgpreurl3'] !== ""){
        if(preg_match('/(jpe?g|png|JPE?G|PNG)$/', $_POST['textimgpreurl3'])) {
    $preview3_file = $_POST['textimgpreurl3'];
        
        }else{
             echo "<script type='text/javascript'>alert('The preview3 is not PNG,JPG,JPEG!')</script>";
       $upload = 0;
        }
    }else{
        $preview3_file = $_POST['textimgpreurl3'];
    }
   
  
  }
  
  $preview3_sql = "INSERT INTO Preview(b_title,preview_page,pre_url) VALUES ('".$_POST['book_title']."','$preview3_page','$preview3_file')";
  
 
 
 
  //check book title
  $check_title = "select b_title from `Book` where b_title = '".$_POST['book_title']."' ";
   
  // echo "select b_title from `ook` where b_title = '".$_POST['book_title']."' ";
   //exit;
   
    $check_title_result = mysqli_query($conn, $check_title);
$check_title_row = mysqli_fetch_assoc($check_title_result);
    
  //sql for insert cover
  
  if($check_title_row['b_title'] != ""){
      echo "<script type='text/javascript'>alert('The Book name is exist')</script>";
  }else if($check_title_row['b_title'] == ""){
      
      
      
     // exit;
  
    $sql_cover =  "INSERT INTO Book(b_title,b_size,b_packing,b_cover,b_price,b_re_day,b_page,b_trade_po,b_info,b_quantity,upload_author,type,remove) VALUES ('".$_POST['book_title']."','".$_POST['book_size']."','".$_POST['book_packing']."','$book_file','".$_POST['book_price']."','".$_POST['book_reday']."','".$_POST['book_page']."','".$_POST['book_tradepo']."','".$_POST['book_info']."','".$_POST['book_quantity']."','$upload_author','".$_POST['oldType']."',0)";
    
   
        
      
        if($upload == 0){
           echo "<script type='text/javascript'>alert('The file is not upload');location.href ='http://doujintradetest.000webhostapp.com/book_insert.php';</script>";
           
        }else{
        
        if (mysqli_query($conn, $sql_cover)){
            //echo "Registration Success!"."<br>";
          //  echo("<script type='text/javascript'> 
                       // window.location = 'index.php'
                       echo "<script type='text/javascript'>alert('The Book success insert')</script>";
                  
        } else {
           // echo "Error inserting record: " . mysqli_error($conn)."<br>";
             echo "<script type='text/javascript'>alert('Error inserting record')</script>";   
        }
         if (mysqli_query($conn, $preview1_sql)){
            //echo "Registration Success!"."<br>";
          //  echo("<script type='text/javascript'> 
                       // window.location = 'index.php'
                       echo "<script type='text/javascript'>alert('The Preview1 success insert')</script>";
                  
        } else {
           // echo "Error inserting record: " . mysqli_error($conn)."<br>";
             echo "<script type='text/javascript'>alert('Error inserting record')</script>";   
        }
         if (mysqli_query($conn, $preview2_sql)){
            //echo "Registration Success!"."<br>";
          //  echo("<script type='text/javascript'> 
                       // window.location = 'index.php'
                       echo "<script type='text/javascript'>alert('The Preview2 success insert')</script>";
                  
        } else {
           // echo "Error inserting record: " . mysqli_error($conn)."<br>";
             echo "<script type='text/javascript'>alert('Error inserting record')</script>";   
        }
         if (mysqli_query($conn, $preview3_sql)){
            //echo "Registration Success!"."<br>";
          //  echo("<script type='text/javascript'> 
                       // window.location = 'index.php'
                       echo "<script type='text/javascript'>alert('The Preview3 success insert')</script>";
                  
        } else {
           // echo "Error inserting record: " . mysqli_error($conn)."<br>";
             echo "<script type='text/javascript'>alert('Error inserting record')</script>";   
        }
        
         $maxtime = 1;
     $itime = 0;
     while ($maxtime <= $_POST['upboxid']) {
         
             if(isset($_POST["topicbox".$itime]) == true){
                 
                $insert_topicbox = "INSERT INTO Topic(b_title,topic) VALUES ('".$_POST['book_title']."','".$_POST['topicbox'.$itime]."')";
                
               
                
                
                if (mysqli_query($conn, $insert_topicbox)){
            //echo "Registration Success!"."<br>";
          //  echo("<script type='text/javascript'> 
                       // window.location = 'index.php'
                       echo "<script type='text/javascript'>alert('The Topic.$maxtime insert')</script>";
                  
        } else {
            
           // echo "Error for the topic.$maxtime: " . mysqli_error($conn)."<br>";
             echo "<script type='text/javascript'>alert('Error inserting record')</script>";   
        } //topic insert else
                
                
             } //check topic here
          $maxtime ++;
          $itime++;
         
     } //topic uplaod end
        
     
     
     
     // The other topic
     $number = count($_POST["topicother"]);  
        
       // echo $number;
        
        
 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
           if(($_POST["topicother"][$i] != ''))  
           {  
                $sql = "INSERT INTO Topic(b_title,topic) VALUES('".$_POST["book_title"]."','".$_POST["topicother"][$i]."')";  
                mysqli_query($conn, $sql);  
           }// insert sql for other topic  
      } // for loop 
      echo "<script type='text/javascript'>alert('The Other Topic success insert')</script>";
 }  // success up other topic
  
  
  
  
  
  
        } //upload = 1
  
  
 
}// check b_title

//}else{
 //     echo "<script type='text/javascript'>alert('The cover is not PNG,JPG,JPEG!')</script>";
 //}
 }else if(isset($_POST['upload']) == false ){

}





            
 
 

require_once('header.php');
$get_default_topic5 = "SELECT * from d_topic";
 $result_get_default_topic5 = mysqli_query($conn,$get_default_topic5);
$get_hit_topic5 = "SELECT topic , count(topic) from `Topic` GROUP BY topic order by count(topic) desc LIMIT 5";
  $result_get_hit_topic5 = mysqli_query($conn,$get_hit_topic5);
?>

<div class="container">
  <div class="row">
 

    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="row">
           <form action=""  method="POST" enctype="multipart/form-data">  <!-- 正常放係上面個row下面-->
                
        <div id="eg2" class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
        <h2>Cover insert</h2>
        <!-- cover insert -->
        <span class="glyphicon glyphicon-import"></span>
          <select name="uploadtype" id="uploadtype" onchange="uploadtypec1(this.value)">
            <option value="1">File</option>
            <option value="2">URL</option>
          </select>


         

            <input type="hidden" name="uploadtypesubmit" id="uploadtypesubmit" value="1">

            <div id="cover_div">
                
              <input type ="file" style="width:100%" id="cover_file" name="cover_file" onchange="loadCover(this.files[0])">
              
               <!-- <input type="hidden" name="file_upload" id="file_upload" value=""> -->
              

              <img style="width:100%" id='coverview'>
            </div>

            <div style="display:none" id="loadurl">

              <input style="width:100%" id="textimgurl" type="text" name="textimgurl">
              
              <input type="button" value="Load" onclick="loadImg($('#textimgurl').val())">


 
              <img style="width:100%" id='coverview2' >
            </div>

           

          </div>
          <!--insert preview 1-->
          <div id="eg2" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

              <h2>Preview insert</h2>
              <p>
                      <span class="glyphicon glyphicon-import"></span>
                  preview insert1
            <select name="uploadpretype1" id="uploadpretype1" onchange="uploadpre(this.value)">
            <option value="1" selected="selected">File</option>
            <option value="2">URL</option>
          </select>
           
          <div>
        <!--<input type="hidden" name="uploadpretypesubmit" id="uploadpretypesubmit" value="1"> -->
        
            <div id="pre_div1">
              <input style="width:60%" id="pre_file1" name="pre_file1" type ="file" onchange="loadPreview1(this.files[0])">

              <img style="width:30%" id='preview1' >
            </div>

            <div style="display:none" id="loadpreurl">

              <input style="width:30%" id="textimgpreurl" name="textimgpreurl" type="text">
              <input type="button" value="Load" onclick="loadpreImg($('#textimgpreurl').val())">
              
               

              <img style="width:30%" id='preview11' >
            </div>

          </div>

          <!--insert preview2-->
<br>          
           <div>        <span class="glyphicon glyphicon-import"></span>
preview insert2
           <select name="uploadpretype2" id="uploadpretype2" onchange="uploadpre2(this.value)">
            <option value="1" selected="selected">File</option>
            <option value="2">URL</option>
          </select>
           
            <div id="pre_div2">
              <input style="width:60%" id="pre_file2" name="pre_file2" type ="file" onchange="loadPreview2(this.files[0])">

              <img style="width:30%" id='preview2' >
            </div>

            <div style="display:none" id="loadpreurl2">

              <input style="width:30%" id="textimgpreurl2" name="textimgpreurl2" type="text">
              <input type="button" value="Load" onclick="loadpreImg2($('#textimgpreurl2').val())">

              <img style="width:30%" id='preview22' >
            </div>
          </div>

          
          


           <!--insert preview3-->
<br>
           <div>        <span class="glyphicon glyphicon-import"></span>
preview insert3
            <select name="uploadpretype3" id="uploadpretype3" onchange="uploadpre3(this.value)">
            <option value="1" selected="selected">File</option>
            <option value="2">URL</option>
          </select>
            <div id="pre_div3">
              <input style="width:60%" id="pre_file3" name="pre_file3" type ="file" onchange="loadPreview3(this.files[0])">

              <img style="width:30%" id='preview3' >
            </div>

            <div style="display:none" id="loadpreurl3">

              <input style="width:30%" id="textimgpreurl3" name="textimgpreurl3" type="text">
              <input type="button" value="Load" onclick="loadpreImg3($('#textimgpreurl3').val())">

              <img style="width:30%" id='preview33' >
            </div>
          
          </div>
          </div>


          
          
          <div id="eg2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ><h2>Doujinshi information insert</h2>
          <p>
            
            <div>Doujinshi Title
            <p>
                 <input id="book_title" name="book_title" type="text" maxlength="100" required>
            </div>
           
             <div>Doujinshi Size
             <p>
                 <input id="book_size" name="book_size" type="text" maxlength="4">
            </div>
             <div>Doujinshi Packing
             <p>
                 <input id="book_packing" name="book_packing" type="text" maxlength="100">
            </div>
            <div>Doujinshi Price
            <p>
                 <input id="book_price" name="book_price" type="text" maxlength="10" required>
            </div>
            <div>Doujinshi Release Day
            <p>
                 <input id="book_reday" name="book_reday" type="date">
            </div>
             <div>Doujinshi Page
             <p>
                 <input id="book_page" name="book_page" type="text" maxlength="10" required>
            </div>
            <div>Doujinshi Trading Position
            <p>
                 <input id="book_tradepo" name="book_tradepo" type="text" maxlength="20">
            </div>
             <div>Doujinshi Other Information
                <!-- <input id="book_info" name="book_info" type="comment" maxlength="300"> -->
                <p>
                 <textarea style="width:100%" rows="4" cols="50" id="book_info" name="book_info"></textarea>
            </div>
           
             <div>Doujinshi Quantity
             <p>
                 <input id="book_quantity" name="book_quantity" type="text" >
            </div>
            
             <div>Doujinshi Topic
             <p>
                 <!--<input id="book_topic" name="book_topic" type="text" > -->
                 <?php
                 $ihot = 0;
            while ($result_get_hit_topic5_all = mysqli_fetch_assoc($result_get_hit_topic5)) {
                
            
                ?>
                 <input type="hidden" name="upboxid" id="upboxid" value="<?php echo $ihot ?>">
                
                <input type="checkbox" 
                       name ="<?php echo "topicbox$ihot"?>" 
                       id="<?php echo "topicbox$ihot"?>" 
                       value="<?php echo $result_get_hit_topic5_all['topic']?>"> 
                <?php echo $result_get_hit_topic5_all['topic']?>
                
               
                
          <?php  $ihot++;
          }?>
                <div class="form-group">
                <input type="hidden" name="count" value="1" />
                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="image">
                </label>
                <div class="col-md-12 col-sm-12 col-xs-12">
        <input type="hidden" name="icount" value="1" />
        <div id="i_field" class="form-group">
            <input class="form-control" id="ifield1" name="topicother[]" type="text" style="width: 89%">
            <button id="b1" class="btn btn-info i_add_more" type="button" >Add More</button>
        </div>
    </div>
</div>

                              

            </div>
            
            
            
            
         <br><br><br><br><br>   
         <div>Doujinshi Type
            <p>
              
                
          <select name="oldType" id="oldType" >
            <option value="Male">Male only</option>
            <option value="Female">Female only</option>
             <option value="R18">Adult only</option>
          </select>
            
            
            
            </div>
            
            
            
           <button class="btn btn-primary" id="upload" name="upload" value="upload" onclick="uploadForms()">Upload</button>
            <br>
            <br>
          
          </div>
          
        </div>
    
      </div>
    
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 order-lg-first
      order-md-first order-sm-first" >

      <tr>
        <?php include 'book_update.php'?>
      </tr>
      
    </div>
      </form>
  </div>
</div>



<!-- cover file -->
<script type="text/javascript">
function loadCover(file) {
  var preview = document.getElementById('coverview');
  var reader = new FileReader();
  $('#error').text('Loading');

  preview.onload = function () {
    //console.log(reader.result);
    try {
      var msg = steganography.decode(reader.result);

      console.log(msg.length);
    } catch (e) {
      $('#error').text('Error, data may be corrupted');
      return;
    }
    loadCode();
    //$('#error').text('');
  };

  reader.onloadend = function (e) {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
    

}

function loadCover2(file) {
  var preview = document.getElementById('coverview2');
  var reader = new FileReader();
  $('#error').text('Loading');

  preview.onload = function () {
    //console.log(reader.result);
    try {
      var msg = steganography.decode(reader.result);

      console.log(msg.length);
    } catch (e) {
      $('#error').text('Error, data may be corrupted');
      return;
    }
    loadCode();
    //$('#error').text('');
  };

  reader.onloadend = function (e) {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}


function loadImg(url) {
     var imgurl_value = document.getElementById("textimgurl").value;
     
     
      //if (imgurl_value.match(/\.png$|\.jpg$|\.jpeg$/)) {
      if (imgurl_value.match(/\.(jpe?g|png|JPE?G|PNG)$/)) { 
  



  if (url.indexOf('crossorigin') == -1) url =  url;
 
  var preview = document.getElementById('coverview2');
  
  
  
  var xhr = new XMLHttpRequest();
  xhr.responseType = 'blob';
  $('#error').text('Waiting for response...');
  xhr.onload = function () {
    loadCover2(xhr.response);
  }
  xhr.onerror = function (e) {
    $('#error').text('Invalid URL');
    console.log(e);
  }
  

 // if((\.png$|\.jpg$|\.jpeg$])\imgurl_value){
      
 // }else{
 //      $('#error').text('The picture not PNG,JPG or JPEG');
 // }
  
  
  xhr.open('GET', url);
  xhr.send();
      }
      else{
            alert("The picture is not .JPG/.PNG/.JPEG type");
      }
 
}
</script>

<!-- preview1 file -->
<script type="text/javascript">
function loadPreview1(file) {
  var preview = document.getElementById('preview1');
  var reader = new FileReader();
  $('#error').text('Loading');

  preview.onload = function () {
    //console.log(reader.result);
    try {
      var msg = steganography.decode(reader.result);

      console.log(msg.length);
    } catch (e) {
      $('#error').text('Error, data may be corrupted');
      return;
    }
    loadCode();
    //$('#error').text('');
  };

  reader.onloadend = function (e) {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}

function loadpre11(file) {
  var preview = document.getElementById('preview11');
  var reader = new FileReader();
  $('#error').text('Loading');

  preview.onload = function () {
    //console.log(reader.result);
    try {
      var msg = steganography.decode(reader.result);

      console.log(msg.length);
    } catch (e) {
      $('#error').text('Error, data may be corrupted');
      return;
    }
    loadCode();
    //$('#error').text('');
  };

  reader.onloadend = function (e) {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}


function loadpreImg(url) {
  if (url.indexOf('crossorigin') == -1) url =  url;
  var preview = document.getElementById('preview11');
  var xhr = new XMLHttpRequest();
  xhr.responseType = 'blob';
  $('#error').text('Waiting for response...');
  xhr.onload = function () {
    loadpre11(xhr.response);
  }
  xhr.onerror = function (e) {
    $('#error').text('Invalid URL');
    console.log(e);
  }
  xhr.open('GET', url);
  xhr.send();
}
</script>



<!-- preview2 file -->
<script type="text/javascript">
function loadPreview2(file) {
  var preview = document.getElementById('preview2');
  var reader = new FileReader();
  $('#error').text('Loading');

  preview.onload = function () {
    //console.log(reader.result);
    try {
      var msg = steganography.decode(reader.result);

      console.log(msg.length);
    } catch (e) {
      $('#error').text('Error, data may be corrupted');
      return;
    }
    loadCode();
    //$('#error').text('');
  };

  reader.onloadend = function (e) {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}

function loadpre22(file) {
  var preview = document.getElementById('preview22');
  var reader = new FileReader();
  $('#error').text('Loading');

  preview.onload = function () {
    //console.log(reader.result);
    try {
      var msg = steganography.decode(reader.result);

      console.log(msg.length);
    } catch (e) {
      $('#error').text('Error, data may be corrupted');
      return;
    }
    loadCode();
    //$('#error').text('');
  };

  reader.onloadend = function (e) {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}


function loadpreImg2(url) {
  if (url.indexOf('crossorigin') == -1) url =  url;
  var preview = document.getElementById('preview22');
  var xhr = new XMLHttpRequest();
  xhr.responseType = 'blob';
  $('#error').text('Waiting for response...');
  xhr.onload = function () {
    loadpre22(xhr.response);
  }
  xhr.onerror = function (e) {
    $('#error').text('Invalid URL');
    console.log(e);
  }
  xhr.open('GET', url);
  xhr.send();
}
</script>


<!-- preview3 file -->
<script type="text/javascript">
function loadPreview3(file) {
  var preview = document.getElementById('preview3');
  var reader = new FileReader();
  $('#error').text('Loading');

  preview.onload = function () {
    //console.log(reader.result);
    try {
      var msg = steganography.decode(reader.result);

      console.log(msg.length);
    } catch (e) {
      $('#error').text('Error, data may be corrupted');
      return;
    }
    loadCode();
    //$('#error').text('');
  };

  reader.onloadend = function (e) {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}

function loadpre33(file) {
  var preview = document.getElementById('preview33');
  var reader = new FileReader();
  $('#error').text('Loading');

  preview.onload = function () {
    //console.log(reader.result);
    try {
      var msg = steganography.decode(reader.result);

      console.log(msg.length);
    } catch (e) {
      $('#error').text('Error, data may be corrupted');
      return;
    }
    loadCode();
    //$('#error').text('');
  };

  reader.onloadend = function (e) {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}


function loadpreImg3(url) {
  if (url.indexOf('crossorigin') == -1) url =  url;
  var preview = document.getElementById('preview33');
  var xhr = new XMLHttpRequest();
  xhr.responseType = 'blob';
  $('#error').text('Waiting for response...');
  xhr.onload = function () {
    loadpre33(xhr.response);
  }
  xhr.onerror = function (e) {
    $('#error').text('Invalid URL');
    console.log(e);
  }
  xhr.open('GET', url);
  xhr.send();
}

</script>







<script type="text/javascript">
// upload cover
function uploadtypec1(v)
{
  if (v == 2)
  {
    document.getElementById("loadurl").style.display = "";
    document.getElementById("cover_div").style.display = "none";
    var x = document.getElementById("uploadtype").value;
    document.getElementById("uploadtypesubmit").value = x;

  }else if (v == 1) {
    document.getElementById("cover_div").style.display = "";
    document.getElementById("loadurl").style.display = "none";
    var x = document.getElementById("uploadtype").value;
    document.getElementById("uploadtypesubmit").value = x;

  }


}
</script>


<script type="text/javascript">
// upload preview1
function uploadpre(v)
{
  if (v == 2)
  {
    document.getElementById("loadpreurl").style.display = "";
    document.getElementById("pre_div1").style.display = "none";
   // var y = document.getElementById("uploadpretype1").value;
    //document.getElementById("uploadpretypesubmit").value = y;

  }else if (v == 1) {
    document.getElementById("pre_div1").style.display = "";
    document.getElementById("loadpreurl").style.display = "none";
    //var y = document.getElementById("uploadpretype1").value;
    //document.getElementById("uploadpretypesubmit").value = y;

  }


}
</script>


<script type="text/javascript">
// upload preview2
function uploadpre2(v)
{
  if (v == 2)
  {
    document.getElementById("loadpreurl2").style.display = "";
    document.getElementById("pre_div2").style.display = "none";
   // var y = document.getElementById("uploadpretype1").value;
    //document.getElementById("uploadpretypesubmit").value = y;

  }else if (v == 1) {
    document.getElementById("pre_div2").style.display = "";
    document.getElementById("loadpreurl2").style.display = "none";
    //var y = document.getElementById("uploadpretype1").value;
    //document.getElementById("uploadpretypesubmit").value = y;

  }


}
</script>


<script type="text/javascript">
// upload preview3
function uploadpre3(v)
{
  if (v == 2)
  {
    document.getElementById("loadpreurl3").style.display = "";
    document.getElementById("pre_div3").style.display = "none";
   // var y = document.getElementById("uploadpretype1").value;
    //document.getElementById("uploadpretypesubmit").value = y;

  }else if (v == 1) {
    document.getElementById("pre_div3").style.display = "";
    document.getElementById("loadpreurl3").style.display = "none";
    //var y = document.getElementById("uploadpretype1").value;
    //document.getElementById("uploadpretypesubmit").value = y;

  }


}
</script>

<script>
var inext = 1;
$("body").on('click','.i_add_more',function(e){
    // e.preventDefault();
    console.log(inext);
    var iaddto = "#ifield" + inext;
    var iaddRemove = "#ifield" + (inext);
    inext = inext + 1;
    var inewIn = '<input type="text" class="form-control" id="ifield' + inext + '" name="topicother[]" style="width: 89%">';
    var inewInput = $(inewIn);
    var iremoveBtn = '<button id="iremove' + (inext) + '" class="btn btn-danger i_remove_me pull-right" >-</button>';
    var iremoveButton = $(iremoveBtn);
    $(iaddto).after(inewInput);
    $(iaddRemove).after(iremoveButton);

    $("#icount").val(inext);

    $('body').on('click','.i_remove_me',function(e){
        e.preventDefault();
        var ifieldNum = this.id.charAt(this.id.length-1);
        var ifieldID = "#ifield" + ifieldNum;
        console.log(ifieldID);
        if(inext > 1 ) {
          inext =  inext - 1;
        }else {
          inext = 1;
        }

        console.log(this);
        $(this).remove();
        $(ifieldID).remove();
    });
});
</script>

<br><br><br><br><br><br>
    <?php include 'footer.php'?>
</body>
</html>