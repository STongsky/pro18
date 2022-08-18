<?php
@ob_start();
session_start();

if (isset($_SESSION['login']) == false){
       $_SESSION['login'] = 0;
       $_SESSION['user'] = "";
       
       
    }else{
        $_SESSION['login'] =  $_SESSION['login']; 
        $_SESSION['user'] =  $_SESSION['user'];
    }

?>
<?php
include 'database.php';
?>