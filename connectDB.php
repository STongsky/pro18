<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!--last update by Wong Yin Laam @21/3-->
</head>

<body>
<?php
$host = "localhost";
$user = "admin";
$password = "pw";
$dbname = "dbname";

$connect = mysqli_connect($host, $user, $password, $dbname);

if ($connect->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "";

?>
</body>
</html>
