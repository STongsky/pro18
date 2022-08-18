<?php
include 'session.php';
include 'header.php';

session_destroy();


header('Location:index.php');


?>