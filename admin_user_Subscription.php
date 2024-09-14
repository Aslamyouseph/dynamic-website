<?php
include 'subcription_popup_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User subcription Fetching</title>
    <link rel="stylesheet" href="admin_user_account.css">
</head>
<body>
<table border="1">
    <tr>
        <th>sino</th>
        <th> Name</th>
        <th>email</th>
        <th>Operations</th>
    </tr>
    <?php
    $sql = "SELECT * FROM usersubcription";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        while ($row =mysqli_fetch_assoc($result)) {
            $sino = $row['sino'];
            $name = $row['name'];
            $email = $row['email'];
            ?>
            <tr>
            <td><?php echo $sino; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $email; ?></td>
    
                <td>
                <button><a href="admin_user_Subscription_delete.php?deleteid=<?php echo $sino; ?>">Delete</a></button>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "Error fetching records: " . mysqli_error($connection);    }
    ?>
</table>
</body>
</html>
