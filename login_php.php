<?php
session_start();
if (isset($_POST['uname']) && isset($_POST['password'])) {
    include 'db_conn.php';
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    // Check if admin credentials
    if ($uname === 'iamadmin' && $password === '123123') {
        header("Location: admin.php");
        exit();
    }

    // Rest of your user login code
    $data = "uname=" . $uname;

    if (empty($uname)) {
        $em = "User name is required";
        header("Location: login.php?error=$em&$data");
        exit;
    } else if (empty($password)) {
        $em = "Password is required";
        header("Location: login.php?error=$em&$data");
        exit;
    } else {
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);
        
        if($stmt->rowCount() === 1) {
            $user = $stmt->fetch();
            $username = $user['username'];
            $hashed_password = $user['password'];
            $fname = $user['fname'];
            $id = $user['id'];
            
            if($username === $uname && password_verify($password, $hashed_password)) {
                $_SESSION['id'] = $id;
                $_SESSION['fname'] = $fname;
                header("Location: home.html");
                exit();
            } else {
                $em = "Incorrect Username or Password";
                header("Location: login.php?error=$em&$data");
                exit();
            }
        } else {
            $em = "Incorrect Username or Password";
            header("Location: login.php?error=$em&$data");
            exit();
        }
    }
} else {
    header("Location: login.php?error=error");
    exit();
}
?>
