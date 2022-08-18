<?php
$servername = "localhost";
$dbname = "id4657924_doujintrade";
$username = "id4657924_admin";
$password = "admin";



// Create connection
$conn =  mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 




?>





