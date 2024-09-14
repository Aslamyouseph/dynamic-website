<?php
include('adminpage_connection.php');
//accesing the values form form
if(isset($_POST['insert_product']))
{
    $product_title = mysqli_real_escape_string($conn, $_POST['product_title']);//mysqli_real_escape_string($conn,  "this is used if we give any special charecters(',",`,) in out data(data inserting by through form) then it help to store in our database . if we didnot give then error will occure"
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $keyword1 = mysqli_real_escape_string($conn, $_POST['keyword1']);
    $keyword2 = mysqli_real_escape_string($conn, $_POST['keyword2']);
    $keyword3 = mysqli_real_escape_string($conn, $_POST['keyword3']);
    $keyword4 = mysqli_real_escape_string($conn, $_POST['keyword4']);
    $keyword5 = mysqli_real_escape_string($conn, $_POST['keyword5']);
    $product_original_price = mysqli_real_escape_string($conn, $_POST['product_original_price']);
    $product_discount_price = mysqli_real_escape_string($conn, $_POST['product_discount_price']);
    $amazon_link = mysqli_real_escape_string($conn, $_POST['amazon_link']);// Retrieve the Amazon link
    $details_link = mysqli_real_escape_string($conn, $_POST['details_link']);// Retrieve the more details link 
    
    //assising the images to the database or table
    $product_image=$_FILES['product_image']['name'];
    //assising the temparary name of the images to the database or table
    $temp_image=$_FILES['product_image']['tmp_name'];


    //checking the condition for all the atributes are entered correctly or not
    if($product_title=='' or $description=='' or $keyword1=='' or $keyword2=='' or $keyword3=='' or $keyword4=='' or $keyword5=='' or
    $product_original_price=='' or $product_discount_price=='' or $product_image=='' or  $temp_image=='' or $amazon_link=='' or $details_link=='')
    {
        echo "<script>alert('please fill all the available feilds')</script>";
        exit();
    }
    else{
        //this way the image is storing to "admin_product_images" folder
        move_uploaded_file($temp_image,"./admin_product_images/$product_image");

        //insert Qury 
        $insert_productes = "INSERT INTO `products2` (
            Product_Title,
            Product_Description,
            Product_Keywords1,
            Product_Keywords2,
            Product_Keywords3,
            Product_Keywords4,
            Product_Keywords5,
            Product_Image,
            amazon_link,
            details_link,
            Original_Price,
            Discount_Price
        ) VALUES (
            '$product_title',
            '$description',
            '$keyword1',
            '$keyword2',
            '$keyword3',
            '$keyword4',
            '$keyword5',
            '$product_image',
            '$amazon_link',
            '$details_link',
            '$product_original_price',
            '$product_discount_price'
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
    <title>Insert Budget laptop By Admin</title>
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="admin_insert_product.css">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <h1 class="text-center head1">Insert Products</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data"><!--"enctype="multipart/form-data " this is very importent when we trying to insert the images or any folders-->
            <!-- Product Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title:</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    placeholder="Enter the product title" autocomplete="off" required>
            </div>
            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description:</label>
                <textarea name="description" id="description" class="form-control"
                    placeholder="Enter the product description" autocomplete="off" rows="4" required></textarea>
            </div>
            <!-- Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keyword1" class="form-label">Product Keywords (1):</label>
                <input type="text" name="keyword1" id="keyword1" class="form-control"
                    placeholder="Enter the first product keyword" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keyword2" class="form-label">Product Keywords (2):</label>
                <input type="text" name="keyword2" id="keyword2" class="form-control"
                    placeholder="Enter the second product keyword" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keyword3" class="form-label">Product Keywords (3):</label>
                <input type="text" name="keyword3" id="keyword3" class="form-control"
                    placeholder="Enter the third product keyword" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keyword4" class="form-label">Product Keywords (4):</label>
                <input type="text" name="keyword4" id="keyword4" class="form-control"
                    placeholder="Enter the fourth product keyword" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keyword5" class="form-label">Product Keywords (5):</label>
                <input type="text" name="keyword5" id="keyword5" class="form-control"
                    placeholder="Enter the fifth product keyword" autocomplete="off" required>
            </div>
            <!-- Product Image -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Product Image:</label>
                <input type="file" name="product_image" id="product_image" class="form-control" required>
            </div>
            <!-- Amazon Link -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="amazon_link" class="form-label">Amazon Link:</label>
                <input type="url" name="amazon_link" id="amazon_link" class="form-control" placeholder="Enter the Amazon product link" autocomplete="off" required>
            </div>
            <!-- More Details Link -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="details_link" class="form-label">More Details Link:</label>
                <input type="url" name="details_link" id="details_link" class="form-control"placeholder="Enter the product details link (e.g., laptop1.html)" autocomplete="off" required>
            </div>

            <!-- Original Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_original_price" class="form-label">Original Price:</label>
                <input type="text" name="product_original_price" id="product_original_price" class="form-control"
                    placeholder="Enter the original price of the product" autocomplete="off" required>
            </div>
            <!-- Discount Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_discount_price" class="form-label">Discount Price:</label>
                <input type="text" name="product_discount_price" id="product_discount_price" class="form-control"
                    placeholder="Enter the discount price of the product" autocomplete="off" required>
            </div>
            <!-- Submit Button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" id="insert_product" class="btn btn-info mb-3 px-3"
                    value="Insert Product">
            </div>
        </form>
    </div>
    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
