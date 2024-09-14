<?php
// Include the database connection file
include('home_connection_contactForm.php');

// Check if form is submitted and validate inputs
if (isset($_POST["firstname"], $_POST["lastname"], $_POST["address"], $_POST["country"], $_POST["phone"], $_POST["email"], $_FILES["user_photo"], $_POST["feedback"])) {
    
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $feedback = $_POST["feedback"];

    // Assigning the image to the variable
    $user_photo = $_FILES['user_photo']['name'];
    // Assigning the temporary name of the image
    $temp_image = $_FILES['user_photo']['tmp_name'];

    // Check if any field is empty
    if (empty($firstname) || empty($lastname) || empty($address) || empty($country) || empty($phone) || empty($email) || empty($user_photo) || empty($feedback)) {
        echo "<script>alert('Please fill in all the required fields.');</script>";
        exit();
    }
    
    // Move the uploaded image to the desired directory
    $upload_dir = "./admin_product_images/";
    if (!move_uploaded_file($temp_image, $upload_dir . $user_photo)) {
        echo "<script>alert('Failed to upload the image.');</script>";
        exit();
    }

    $email = trim($_POST["email"]);

    // Validate email address
    $email_regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    if (!preg_match($email_regex, $email)) {
        echo "<script>alert('Invalid email address. Please enter a valid email address.');</script>";
        exit();
    }
    

    // Check if email domain is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address. Please enter a valid email address with a valid domain.');</script>";
        exit();
    }

    // SQL query to insert data into the database using prepared statements
    $sql = "INSERT INTO formuser (firstname, lastname, address, country, phone, email, user_photo, feedback) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);

    // Bind parameters and execute the statement
    if ($stmt) {
        $stmt->bind_param("ssssssss", $firstname, $lastname, $address, $country, $phone, $email, $user_photo, $feedback);
        if ($stmt->execute()) {
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
} else {
    echo "<script>alert('Invalid request.');</script>";
    exit();
}
?>
