<?php
include 'Review_connection.php';
if (isset($_POST['submit'])) {
    $name = $_POST["name"];  
    $feedback = $_POST["feedback"];

    $sql = "INSERT INTO reviewcustomer (name, feedback) VALUES ('$name','$feedback')"; 

    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Details not stored to database: " . mysqli_error($connection)) ;
    }
    else {
        header('location:Review.php');
    }
    mysqli_close($connection); 
}
?>
