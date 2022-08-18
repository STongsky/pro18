<?php
require_once('session.php');
require_once('header.php');
?>

<?php
$upload_user = $_SESSION['user'];
 $uid = $_SESSION['user_id'];
?>


<?php

$password = $confirm = $oldpassword = $passwordErr = $oldpasswordErr = $confirmErr = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $sql_getpw ="select * from `User` where uname = '$upload_user'";

$result_getpw = mysqli_query($conn, $sql_getpw);
$row_getpw = mysqli_fetch_assoc($result_getpw);

    if (empty($_POST["password"])) { 
        $passwordErr = "Please enter password ";
         
    } else { 
           
        //$password = test_input($_POST["password"]); 
         $passwordErr = "";
    }

    if (empty($_POST["confirm"])) { 
        $confirmErr = "Please enter confirm password";
         
    } else if($_POST["password"] != $_POST["confirm"]) {
         
        $confirmErr = "The password is not the same";
    } else {
       
       // $confirm = test_input($_POST["confirm"]); 
        $confirmErr = "";
    }
    
    if($_POST['oldpassword'] !== $row_getpw['upw']){
        $oldpasswordErr = "The old password type wrong";
    }else{
        $oldpasswordErr ="";
        
    }

/*
    if (empty($_POST["name"])) { 
        $nameErr = "Please enter your name <br>"; 
    } else if(!preg_match("/^[0-9a-zA-Z ]*$/",$_POST["name"])){
        $usernameErr = "Only 0-9,A-Z and a-z are allowed";
    } else { 
        $name = test_input($_POST["name"]); 
    } 
    */
  
  
  if($passwordErr =="" &&  $confirmErr == ""&&  $oldpasswordErr == "") {
      $sql_update_pw = "Update `User` SET upw= '".$_POST["password"]."' WHERE uid = '$uid'";
      
      
      
     if (mysqli_query($conn, $sql_update_pw)){
         
            //echo "Registration Success!"."<br>";
          //  echo("<script type='text/javascript'> 
                       // window.location = 'index.php'
                        echo "<script type='text/javascript'>alert('The Password change success');location.href ='http://doujintradetest.000webhostapp.com/editac.php';</script>";
                  
        } else {
            echo "Error for change the Password: " . mysqli_error($conn)."<br>";
        }
      
  }
   
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
    

?>
      <tr>
<div class="container">
  <div class="row">
    <div id="eg2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <br>
        
        <h2><center>Reset Password<center></h2>
        
         <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"
        <div class="form-group">
             
                                <label for="exampleInputPassword1">Old Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Old Password" name="oldpassword" value="<?php echo $password ?>"><span class="error"><?php echo $oldpasswordErr ?></span>
                                <br />
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="<?php echo $password ?>"><span class="error"><?php echo $passwordErr ?></span>
                         <br />
                                <label for="exampleInputPassword1">Confirm New Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="confirm" value="<?php echo $confirm ?>"><span class="error"><?php echo $confirmErr ?></span>
                                <br />
                                  <p><button type="submit" class="btn btn-primary">Submit</button></p>
                                 </div>
                               
                                </form>
        
        <br>	
            </div>
        </div>
  </div>
    <?php include 'footer.php'?>
</body>
</html>