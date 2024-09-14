<?php
include('home_connection_contactForm.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Details Fetching</title>
    <link rel="stylesheet" href="admin_user_account.css">
</head>
<body>
<table border="1">
    <tr>
        <th>sino</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Country</th>
        <th>Phone</th>
        <th>Email</th>
        <th>User Photo</th>
        <th>Feedback</th>
        <th>Operations</th>
    </tr>
    <?php
    $sql = "SELECT * FROM formuser";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sino = $row['sino'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $address = $row['address'];
            $country = $row['country'];
            $phone = $row['phone'];
            $email = $row['email'];
            $user_photo = $row['user_photo'];
            $feedback = $row['feedback'];
            ?>
            <tr>
                <td><?php echo $sino; ?></td>
                <td><?php echo $firstname; ?></td>
                <td><?php echo $lastname; ?></td>
                <td><?php echo $address; ?></td>
                <td><?php echo $country; ?></td>
                <td><?php echo $phone; ?></td>
                <td><?php echo $email; ?></td>
                <td>
                    <img src="admin_product_images/<?php echo $user_photo; ?>" alt="User Image" style="width: 70px; height: auto;">
                </td>
                <td><?php echo $feedback; ?></td>
                <td>
                    <button><a href="admin_user_Details_delete.php?deleteid=<?php echo $sino; ?>">Delete</a></button>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "Error fetching records: " . mysqli_error($connection);
    }
    ?>
</table>
</body>
</html>
