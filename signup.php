<?php
if (isset($_POST['fname']) && isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['password'])) {
    include 'db_conn.php';

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = "fname=" . $fname . "&uname=" . $uname;

    if (empty($fname)) {
        $em = "Full name is required";
        header("Location: index.php?error=$em&$data");
        exit;
    } else if (empty($uname)) {
        $em = "User name is required";
        header("Location: index.php?error=$em&$data");
        exit;
    } else if (empty($email)) {
        $em = "Email ID is required";
        header("Location: index.php?error=$em&$data");
        exit;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {// check if email is valid  or not this is a built in php function
        $em = "Enter a valid email ID";
        header("Location: index.php?error=$em&$data");
        exit;
    } else if (empty($password)) {
        $em = "Password is required";
        header("Location: index.php?error=$em&$data");
        exit;
    } else {
        // Hashing the password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        $sql = "INSERT INTO user (fname, username, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fname, $uname, $email, $password]);

        header("Location: index.php?success=Your account has been created successfully");
        exit;
    }
} else {
    header("Location: index.php?error=error");
    exit;
}
?>
