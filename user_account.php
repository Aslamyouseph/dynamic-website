<?php
include('home_connection_contactForm.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Account</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="user_account.css">
    </head>
    <body>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php
                    $select_query = "SELECT * FROM `formuser` ORDER BY 	sino DESC LIMIT 1";
                    $result=mysqli_query($connection,$select_query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $sino=$row['sino'];
                        $firstname=$row['firstname'];
                        $lastname=$row['lastname'];
                        $address=$row['address'];
                        $country=$row['country'];
                        $phone=$row['phone'];
                        $email=$row['email'];
                        $user_photo=$row['user_photo'];
                        //inserting the fetched data to main page
                        echo "<div class='profile-img'>
                        <img class='rounded-circle mt-5' src='admin_product_images/$user_photo' alt='User Image'>
                        </div>
                        <div class='profile-info mt-3'>
                            <h4><span class='label'>First Name: </span>$firstname</h4>
                            <h4><span class='label'>Last Name: </span>$lastname</h4>
                            <h4><span class='label'>Address: </span>$address</h4>
                            <h4><span class='label'>Country: </span>$country</h4>
                            <h4><span class='label'>Phone Number: </span>$phone</h4>
                            <h4><span class='label'>Email: </span>$email</h4>
                        </div>";
                    }
                    ?>
                    <div class="mt-5 text-center">
                        <a href="update_user_account.php?updateid=<?php echo $sino; ?>">
                            <button class="btn btn-primary profile-button" type="button">Edit Profile</button>
                        </a>
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
