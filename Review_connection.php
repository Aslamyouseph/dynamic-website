<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "review";  

$connection = mysqli_connect($host, $user, $pass, $database); 

if(!$connection) {    
    die("Not connected to database: " . mysqli_connect_errno());
}
?>