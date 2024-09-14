<?php
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "index";

try {
    // Create a PDO instance (connect to the database)
    $conn = new PDO("mysql:host=$sName;dbname=$db_name;charset=utf8", $uName, $pass);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Uncomment the line below for debugging
    // echo "Connected successfully"; 
} catch (PDOException $e) {
    // If the connection fails, show an error message
    die("Connection failed: " . $e->getMessage());
}
?>
