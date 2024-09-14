<?php
include 'db_conn.php';

if (isset($_GET['deleteid'])) {
    $id = intval($_GET['deleteid']); // Ensure $id is an integer
    $sql = "DELETE FROM user WHERE id = :id"; // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        header('Location: admin_user_account.php');
        exit();
    } else {
        echo "<script>alert('Data not deleted')</script>";
    }
}
?>
