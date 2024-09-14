<?php
$host="localhost";
$user="root";
$pass="";
$db_name = "adminpage";
$conn = mysqli_connect($host,$user,$pass,$db_name);
if(!$conn)
{
    die("data base is not connected ".mysqli_connect_error());
}
?>