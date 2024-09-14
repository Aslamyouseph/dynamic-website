<?php
include('adminpage_connection.php');
//accesing the values form form
if(isset($_POST['insert_news']))
{
    $news_title = mysqli_real_escape_string($conn, $_POST['news_title']);//mysqli_real_escape_string($conn,  "this is used if we give any special charecters(',",`,) in out data(data inserting by through form) then it help to store in our database . if we didnot give then error will occure"
    $news_discription = mysqli_real_escape_string($conn, $_POST['news_discription']);
    $news_link = mysqli_real_escape_string($conn, $_POST['news_link']);// Retrieve the News link
    
    //assising the images to the database or table
    $news_photo=$_FILES['news_photo']['name'];
    //assising the temparary name of the images to the database or table
    $temp_image=$_FILES['news_photo']['tmp_name'];


    //checking the condition for all the atributes are entered correctly or not
    if($news_title=='' or $news_discription==''or $news_photo=='' or  $temp_image=='' or $news_link=='')
    {
        echo "<script>alert('please fill all the available feilds')</script>";
        exit();
    }
    else{
        //this way the image is storing to "admin_product_images" folder
        move_uploaded_file($temp_image,"./admin_product_images/$news_photo");

        //insert Qury 
        $insert_productes = "INSERT INTO `news_details` (
            news_title,
            news_discription,
            news_link,
            news_photo,
            date
        ) VALUES (
            '$news_title',
            '$news_discription',
            '$news_link',
            '$news_photo',
            NOW()
        )";
        $result = mysqli_query($conn, $insert_productes);
        
        if($result)
        {
            echo "<script>alert('Successfully inserted the product')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert latest news By Admin</title>
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="admin_insert_product.css">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <h1 class="text-center head1">Insert Latest News</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data"><!--"enctype="multipart/form-data " this is very importent when we trying to insert the images or any folders-->
            <!-- news Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="news_title" class="form-label">News Title:</label>
                <input type="text" name="news_title" id="news_title" class="form-control"
                    placeholder="Enter the News title" autocomplete="off" required>
            </div>
            <!-- news Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="news_discription" class="form-label">News Description:</label>
                <textarea name="news_discription" id="news_discription" class="form-control"
                    placeholder="Enter the News description" autocomplete="off" rows="4" required></textarea>
            </div>
            <!-- News Link -->
                <div class="form-outline mb-4 w-50 m-auto">
                <label for="news_link" class="form-label">News Link:</label>
                <input type="url" name="news_link" id="news_link" class="form-control" placeholder="Enter the News link" autocomplete="off" required>
            </div>
            <!-- News Image -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="news_photo" class="form-label">News Image:</label>
                <input type="file" name="news_photo" id="news_photo" class="form-control" required>
            </div>
            <!-- Submit Button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_news" id="insert_news" class="btn btn-info mb-3 px-3"
                    value="Insert News">
            </div>
        </form>
    </div>
    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
