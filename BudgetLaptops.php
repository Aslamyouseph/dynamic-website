<?php
include('adminpage_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Budget Laptopes</title>
    <link rel="stylesheet" href="GamingLaptops.css" />
    <!--bootstrap link-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!--google fonts link-->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <!--javascipt code for footer-->
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <!--sticky icon link-->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />
    <!-- Bootstrap CSS for the cart section -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <!-- Bootstrap CSS for the cart section(Font Awesome CSS) -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <h1 class="head1">
      <u>Affordable and Efficient: Exploring Budget Laptops</u>
    </h1>
    <p class="para1">
      Budget laptops offer an affordable yet efficient solution for everyday
      computing needs. They are ideal for students, professionals, and casual
      users who require basic functionalities such as web browsing, word
      processing, and multimedia consumption. These laptops often feature
      mid-range processors, adequate RAM, and sufficient storage, making them
      suitable for handling standard tasks without compromising too much on
      performance. While they may not boast the latest cutting-edge technology,
      budget laptops deliver great value for money by focusing on essential
      features and maintaining reasonable build quality. With advancements in
      technology, even budget laptops now offer respectable displays, decent
      battery life, and lightweight designs, making them a practical choice for
      those looking to get the most out of their investment without breaking the
      bank.
    </p>
    <div class="container mt-5 mb-5">
      <div class="d-flex justify-content-center row">
        <div class="col-md-10">
          <!--fething the products details and displaying this detailes as an dynamic formate-->
          <?php
          $select_query="select * from `products2`";
          $result=mysqli_query($conn,$select_query);
          while($row=mysqli_fetch_assoc($result))
          {
            $product_id=$row['product_id'];
            $Product_Title=$row['Product_Title'];
            $Product_Description=$row['Product_Description'];
            $Product_Keywords1=$row['Product_Keywords1'];
            $Product_Keywords2=$row['Product_Keywords2'];
            $Product_Keywords3=$row['Product_Keywords3'];
            $Product_Keywords4=$row['Product_Keywords4'];
            $Product_Keywords5=$row['Product_Keywords5'];
            $Product_Image=$row['Product_Image'];
            $amazon_link = $row['amazon_link'];
            $details_link = $row['details_link'];
            $Original_Price=$row['Original_Price'];
            $Discount_Price=$row['Discount_Price'];
            //inserting the fetched data to main page
            echo " <div class='row p-2 bg-white border rounded'>
            <div class='col-md-3 mt-1'>
              <img
                class='img-fluid img-responsive rounded product-image'
                src='admin_product_images/$Product_Image'
                style='width: 500px; height: 160px'
              />
            </div>
            <div class='col-md-6 mt-1'>
              <h5>$Product_Title</h5>
              <div class='d-flex flex-row'>
                <div class='ratings mr-2'>
                  <i class='fa fa-star'></i><i class='fa fa-star'></i
                  ><i class='fa fa-star'></i><i class='fa fa-star'></i>
                </div>
                <span>410</span>
              </div>
              <div class='mt-1 mb-1 spec-1'>
                <span>$Product_Keywords1</span><span class='dot'></span
                ><span> $Product_Keywords2</span
                ><span class='dot'></span
                ><span> $Product_Keywords3<br /></span>
              </div>
              <div class='mt-1 mb-1 spec-1'>
                <span> $Product_Keywords4</span><span class='dot'></span
                ><span> $Product_Keywords5</span><span class='dot'></span
                ><span> $Product_Keywords3<br /></span>
              </div>
              <p class='text-justify text-truncate para mb-0'>
                $Product_Description<br /><br />
              </p>
            </div>
            <div
              class='align-items-center align-content-center col-md-3 border-left mt-1'
            >
              <div class='d-flex flex-row align-items-center'>
                <h4 class='mr-1'>$Discount_Price</h4>
                <span class='strike-text'>$$Original_Price</span>
              </div>
              <h6 class='text-success'>Free shipping</h6>
              <div class='d-flex flex-column mt-4'>
                <a href='$details_link'>
                  <button class='btn btn-primary btn-sm' type='button'>
                    More Details
                  </button></a
                ><a
                  href=' $amazon_link'
                >
                  <button
                    class='btn btn-outline-primary btn-sm mt-2'
                    type='button'
                  >
                    Buy Now
                  </button>
                </a>
              </div>
            </div>
          </div>";
          }
          ?>
        </div>
      </div>
    </div>
    <!-- jQuery card section -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap JS Bundle (includes Popper.js) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
