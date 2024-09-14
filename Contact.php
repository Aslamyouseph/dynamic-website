<?php
include 'contact_connect.php';

$name = $_POST["name"];  
$email = $_POST["email"];
$phone = $_POST["phone"];
$feedback = $_POST["feedback"];
  // Check if any field is empty
  if (empty($name) || empty($email)|| empty($email) || empty($feedback)){
    echo "<script>alert('Please fill in all the required fields.');</script>";
    exit();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {// check if email is valid  or not this is a built in php function
    echo "<script>alert('Invalid email address. Please enter a valid email address.');</script>";
    exit();
}

// Validate email address
// $email_regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
// if (!preg_match($email_regex, $email)) {
//     echo "<script>alert('Invalid email address. Please enter a valid email address.');</script>";
//     exit();
// }
// // Check if email domain is valid
// $domain = explode('@', $email);
// if (!checkdnsrr($domain[1], 'MX')) {
//     echo "<script>alert('Invalid email address. Please enter a valid email address with a valid domain.');</script>";
//     exit();
// }



$sql = "INSERT INTO contactuser (name, email,phone, feedback) VALUES (?,?,?,?)"; 
$stmt = $connection->prepare($sql);

// Bind parameters and execute the statement
if ($stmt) {
    $stmt->bind_param("ssss", $name, $email,$phone, $feedback);
    if ($stmt->execute()) {
        // echo "<script>alert('Data stored successfully.');</script>";
        include('popup_tick_submittion.php');
    } else {
        echo "<script>alert('Error occurred while storing data.');</script>";
    }
    $stmt->close();
} else {
    echo "<script>alert('Error preparing the statement: " . $connection->error . "');</script>";
}

// Close the database connection
mysqli_close($connection);
?>
