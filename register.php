<?php
include 'session.php';
include 'header.php';
?>

<?php

$username= $password = $confirm = $authoryn = $email = $authorc = $usernameErr= $passwordErr = $confirmErr = $authorynErr = $emailErr = $authorcErr= ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $sql ="select uname from `User` where uname = '".$_POST['username']."'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$sql_email ="select uemail from `User` where uemail = '".$_POST["email"]."'";

$result_email = mysqli_query($conn, $sql_email);
$row_email = mysqli_fetch_assoc($result_email);






    if (empty($_POST["username"])) { 
        $usernameErr = "<p id='red'>Please enter username</p> ";
      
    } else if(!preg_match("/^[0-9a-zA-Z ]*$/",$_POST["username"])){
        $usernameErr = "Only 0-9,A-Z and a-z are allowed";
       
    } else if( $row["uname"] == $_POST["username"] ){
        $usernameErr = "<p id='red'>Duplicated username</p>"; 
      
    } else { 
     
       // $username = test_input($_POST["username"]); 
       $usernameErr = "";
       
    }
 
 
 
    if (empty($_POST["password"])) { 
        $passwordErr = "<p id='red'>Please enter password</p> ";
         
    } else { 
           
        //$password = test_input($_POST["password"]); 
         $passwordErr = "";
    }

    if (empty($_POST["confirm"])) { 
        $confirmErr = "<p id='red'>Please enter confirm password</p>";
         
    } else if($_POST["password"] != $_POST["confirm"]) {
         
        $confirmErr = "<p id='red'>The password is not the same</p>";
    } else {
       
       // $confirm = test_input($_POST["confirm"]); 
        $confirmErr = "";
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

    if (empty($_POST["email"])) { 
        $emailErr = "<p id='red'>Please enter email</p>"; 
          
    }   else if($row_email["uemail"] == $_POST["email"]){
        $emailErr = "<p id='red'>Duplicated email</p>"; 
      
    }  else { 
        $email = test_input($_POST["email"]); 
       		 $emailErr = "";
       		 
       		
       		 
	//	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		 if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {   
		    $emailErr = "Invalid email format"; 
		}
    }
    if($_POST['authoryn1'] == 1){
    if (empty($_POST["authorc"])) { 
        $authorcErr = "<p id='red'>Please input creator's circle</p>"; 
         $authorynErr = "<p id='red'>Please input creator's circle</p>"; 
    } 
    //else if(!preg_match("/^[0-9]{8}$/",$_POST["authorc"])){
      //  $authorcErr = "Only 0-9 are allowed and 8 digits";
   // } else { 
   //     $authorc = test_input($_POST["authorc"]); 
   // }
    
    }
    
    
    
    
    	
    
    
   
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
    

?>

<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-3"> </div>
                <div class="col-md-6 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Register</h3>
                            <p>Fill in the form below to register:</p>
                        </div>

                    </div>
                             <div class="panel panel-default">
                                 <div class="panel-body">
                    <div class="form-bottom">
                         <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="registration-form">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" value="<?php echo $username ?>"><span class="error"><?php echo $usernameErr ?></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="<?php echo $password ?>"><span class="error"><?php echo $passwordErr ?></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="confirm" value="<?php echo $confirm ?>"><span class="error"><?php echo $confirmErr ?></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="<?php echo $email ?>"><span class="error"><?php echo $emailErr ?></span>
                            </div>
                            
                            
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Are you creator?</label>
                                
                                <br>
                                
                               
                                
                                <select name="authoryn1" id="authoryn1" onchange="authoryn12(this.value)">
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>
                                                        </select>
                                                        <span class="error"><?php echo $authorynErr ?></span>
                                
                                
                            </div>
                            
                         
                            <div class="form-group" id="Acircle" style="display:none" >
                                <label for="exampleInputEmail1">Creator's Circle</label>
                                <input type="text" class="form-control"  placeholder="The Creator's Circle Name" name="authorc" value="<?php echo $authorc ?>"><span class="error"><?php echo $authorcErr ?></span>
                           
                            </div>
                            
                            
                            
                            
                            <p><button type="submit" class="btn btn-primary">Submit</button></p>
                        </form>
                        <a href="index.php"><button type="submit" class="btn btn-primary">Back</button></a>
                    </div>
                    
                    
                </div>
                <div class="col-md-3"> </div>
            </div>
        </div>
    </div>
</div>
</div></div>


<?php

 if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        
         
         
     if($usernameErr == "" && $passwordErr == "" && $confirmErr == "" &&  $emailErr == "" && $authorcErr == "" ){
         
         
      
       
        
         
        $sql =  "INSERT INTO User(uname,upw,uemail,author_yn,author_circle) VALUES ('".$_POST['username']."','".$_POST['password']."','".$_POST['email']."','".$_POST['authoryn1']."','".$_POST['authorc']."')";
        
      
        
        
        if (mysqli_query($conn, $sql)){
            //echo "Registration Success!"."<br>";
            echo("<script type='text/javascript'> 
                        window.location = 'reg_success.php'
                  </script>" );
        } else {
            echo "Error inserting record: " . mysqli_error($conn)."<br>";
        }
    }
    }



?>


<script type="text/javascript">

    function authoryn12(v)
{
        if (v == 1)
        {
            document.getElementById("Acircle").style.display = "";
            
            
            }else{
             document.getElementById("Acircle").style.display = "none";
            
            }
            
            }
            </script>

<br><br><br><br><br><br>
    <?php include 'footer.php'?>
</body>
</html>