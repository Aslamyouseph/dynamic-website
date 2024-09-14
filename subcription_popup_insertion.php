<?php
include 'subcription_popup_connection.php';


$name=$_POST["name"];
$email=$_POST["email"];

$sql = "INSERT INTO usersubcription (name,email) values ('$name','$email')";  

$result=mysqli_query($connection,$sql);
if (!$result) {
    die("Values are not inserted to the database: please try again " . mysqli_connect_error());
}

mysqli_close($connection);
?>