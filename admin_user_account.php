<?php
include 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Account Fetching</title>
    <link rel="stylesheet" href="admin_user_account.css">
</head>
<body>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Official Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Operations</th>
    </tr>
    <?php
    $sql = "SELECT * FROM user";
    $stmt = $conn->query($sql); // Use PDO's query method
    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $fname = $row['fname'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            ?>
            <tr>
                <td><?php echo htmlspecialchars($id); ?></td>
                <td><?php echo htmlspecialchars($fname); ?></td>
                <td><?php echo htmlspecialchars($username); ?></td>
                <td><?php echo htmlspecialchars($email); ?></td>
                <td><?php echo htmlspecialchars($password); ?></td>
                <td>
                    <button><a href="admin_user_account_delete.php?deleteid=<?php echo $id; ?>">Delete</a></button>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "Error fetching records: " . $conn->errorInfo()[2];
    }
    ?>
</table>
</body>
</html>
