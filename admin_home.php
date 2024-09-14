<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="admin_home.css">
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--font-awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <!-- Heading section -->
    <header>
    
        <h1 class="head1"><i class="fa-solid fa-user-tie"></i>&ensp;&ensp;&ensp;<b>Management Dashboard</b><a href="logout.php"><button class="btn1">Logout</button></a></h1>
        <hr />
    </header>

    <!-- Button sections for admin control -->
    <div class="main section">
        <!--<a href="admin_insert_product.php"><button class="btn2">Insert Products</button></a>-->
        <a href="admin_home2.php"><button class="btn2">Manage Products</button></a>
        <a href="admin_View_Products.php"><button class="btn2">View Products</button></a>
        <a href="admin_news_home.php"><button class="btn2">Manage News</button></a>
        <a href="News.php"><button class="btn2">View News section </button></a>
        <a href="admin_home.php?admin_user_account"><button class="btn2">UserAccount(singup)</button></a>
        <a href="admin_home.php?admin_user_Details"><button class="btn2">User Profile</button></a>
        <a href="admin_home.php?admin_user_Review"><button class="btn2">User Review</button></a>
        <a href="admin_home.php?admin_user_contact"><button class="btn2">User Complaint</button></a>
        <a href="admin_home.php?admin_user_Subscription"><button class="btn2">Subscription Details</button></a>
        <a href="home.html"><button class="btn2">View Website</button></a>
    </div>
    <br>
    <br>
    <!--accesing the user account details by admin in (admin_home.php) file itself-->
    <div class="container my-5">
        <?php
        //user account
         if(isset($_GET['admin_user_account']))
         {
            include('admin_user_account.php');
         }
         //user review
         if(isset($_GET['admin_user_Review']))
         {
            include('admin_user_Review.php');
         }//user details
         if(isset($_GET['admin_user_Details']))
         {
            include('admin_user_Details.php');
         }//user contact
         if(isset($_GET['admin_user_contact']))
         {
            include('admin_user_contact.php');
         }//subscription details
         if(isset($_GET['admin_user_Subscription']))
         {
            include('admin_user_Subscription.php');
         }
        ?>
    </div>
    

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
