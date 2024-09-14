<?php
$host="localhost";
$user="root";
$pass="";
$database="subcription";


$connection =  mysqli_connect($host,$user,$pass,$database);

if (!$connection) {
    die("Data base is not connected : please try again  " .mysqli_connect_error());
}
?>