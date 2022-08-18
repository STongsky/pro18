<?php
include 'session.php';
include 'header.php';
$username= $password = $usernameErr= $passwordErr= ""; 
?>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

   $sql = "SELECT * FROM `User` WHERE uname = '".$_POST['username']."'";
   
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);	
   
 
   

    if (empty($_POST["username"])) { 
        $usernameErr = "Please enter username ";
    }else if($row["uname"] !== $_POST['username']){
        $usernameErr = "The username is not existed";
    }else{
        // $username = test_input($_POST["username"]); 
    }

    $sql = "SELECT * FROM `User` WHERE uname = '".$_POST['username']."'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

 // print_r($row);   test fetch row result
 // exit;
    
   // echo "SELECT * FROM `User` WHERE uname = '".$_POST['username']."'";
    //exit;
    
    
    if (empty($_POST["password"])) { 
        $passwordErr = "Please enter password ";
    }else if($row["uname"] == $_POST["username"] && $row["upw"] !== $_POST["password"] ){
        $passwordErr = "The username and password is not matched";	
    }else { 
        
    }
    
        if($usernameErr == "" && $passwordErr == "")  {
           
        if($row['author_yn'] == 1) {
            
            session_unset(); 
            
           
            $_SESSION['login'] = 2;
            $_SESSION['user'] = $row['uname'];
             $_SESSION['user_id'] = $row['uid'];
            
            //book insert page
            header('Location: http://doujintradetest.000webhostapp.com/book_insert.php');

            
            
        }else if($row['author_yn'] == 0){
          session_unset(); 
            $_SESSION['login'] = 1;
            $_SESSION['user'] = $row['uname'];
            $_SESSION['user_id'] = $row['uid'];
            //index page
           header('Location: http://doujintradetest.000webhostapp.com/index.php');

        }
       // $password = test_input($_POST["password"]); 
    
}else{
  
}
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

 
                    
            <div class="row">
                <div class="col-md-3"> </div>
                <div class="col-md-6 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login</h3>
                            <h5>Fill in the form below to login:</h5>
                        </div>

                    </div>
                    
                                                 <div class="panel panel-default">
                                 <div class="panel-body">
                    <div class="form-bottom">
			        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="registration-form">
			        	<div class="form-group">
			                <label class="sr-only" for="form-first-name">Username</label>
			                <input type="text" name="username" placeholder="Username..." class="form-first-name form-control" id="form-first-name" value="<?php echo $username ?>"><span class="error"><?php echo $usernameErr ?></span>
			            </div>

                        <div class="form-group">
			                <label class="sr-only" for="form-first-name">Password</label>
			                <input type="password" name="password" placeholder="Password..." class="form-first-name form-control" id="form-first-name" value="<?php echo $password ?>"><span class="error"><?php echo $passwordErr ?></span>
			            </div>
                                    
			            <p><button type="submit" class="btn btn-primary">Sign me in!</button></p>
			        </form>
                    <p><a href="register.php"><button type="submit" class="btn btn-primary">Register</button></a></p>
                    
                    
		        	</div>
            	</div>
</div></div>
                <div class="col-md-3"> </div>
            </div>
        </div>
        

    <?php include 'footer.php'?>
</body>
</html>