<?php
include('home_connection_contactForm.php');

if (isset($_GET["updateid"])) {
    $sino = intval($_GET["updateid"]); // Ensure $sino is an integer
    $sql = "SELECT * FROM formuser WHERE sino = $sino";
    $result = mysqli_query($connection, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $address = $row['address'];
        $country = $row['country'];
        $phone = $row['phone'];
        $email = $row['email'];
        $user_photo = $row['user_photo'];
    } 
    else {
        die("Record not found.");
    }

    if (isset($_POST['submit'])) {
        $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
        $address = mysqli_real_escape_string($connection, $_POST['address']);
        $country = mysqli_real_escape_string($connection, $_POST['country']);
        $phone = mysqli_real_escape_string($connection, $_POST['phone']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);

        // Handling file upload
        $new_photo = $user_photo; // Keep the old photo as default
        if (!empty($_FILES['user_photo']['name'])) {
            $photo_name = $_FILES['user_photo']['name'];
            $photo_tmp = $_FILES['user_photo']['tmp_name'];
            $photo_error = $_FILES['user_photo']['error'];

            if ($photo_error === 0) {
                $photo_ext = pathinfo($photo_name, PATHINFO_EXTENSION);
                $new_photo = 'user_' . uniqid() . '.' . $photo_ext;
                move_uploaded_file($photo_tmp, 'admin_product_images/' . $new_photo);
            }
        }

        // Update the database
        $sql = "UPDATE formuser SET 
            firstname='$firstname', 
            lastname='$lastname', 
            address='$address', 
            country='$country',
            phone='$phone', 
            email='$email', 
            user_photo='$new_photo' 
            WHERE sino = $sino";

        $result = mysqli_query($connection, $sql);

        if ($result) {
            header('Location: user_account.php');
        } else {
            die("Error updating record: " . mysqli_error($connection));
        }
    }
} else {
    die("Invalid request.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
    <link rel="stylesheet" href="update_user_account.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="admin_product_images/<?php echo htmlspecialchars($user_photo); ?>" alt="User Image">
                </div>
            </div>
            <div class="col-md-9 border-right">
                <div class="p-3 py-5">
                    <h4 class="text-right">Edit Your Profile</h4>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>"></div>
                            <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($address); ?>"></div>
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($phone); ?>"></div>
                            <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>"></div>
                            <div class="col-md-12"><label class="labels">Country</label><input type="text" class="form-control" name="country" value="<?php echo htmlspecialchars($country); ?>"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Edit Profile Photo</label><input type="file" class="form-control" name="user_photo"></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
