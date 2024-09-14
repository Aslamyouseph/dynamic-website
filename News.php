<?php
include('adminpage_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>News</title>
    <link rel="stylesheet" href="News.css" />
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
  </head>
  <body>
    <h1 class="news">Latest News.</h1>
    <br />
    <h3 class="sub_news">
      Get the latest technology news and in-depth analysis from the expert
      analysts at <b>LapTopia</b>.
    </h3>
    <br />
    <hr style="height: 1px; color: black" />
    <hr />
    <br />
    <!-- Sticky Icon-->
    <div class="sticky-icon">
      <a href="https://www.instagram.com/?hl=en" class="Instagram">  Instagram <i class="fab fa-instagram"></i></a>
      <a href="https://www.facebook.com/" class="Facebook"> Facebook <i class="fab fa-facebook-f"> </i> </a>
      <a href="https://aboutme.google.com/u/0/?referer=gplus" class="Google"> Google + <i class="fab fa-google-plus-g"> </i></a>
      <a href="https://www.youtube.com/" class="Youtube"> Youtube <i class="fab fa-youtube"></i></a>
      <a href="https://twitter.com/login" class="Twitter"> Twitter <i class="fab fa-twitter"> </i> </a>
    </div>
    <!--image card1-->
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <!--fething the News details and displaying this detailes as an dynamic formate-->
      <?php
        $select_query="select * from `news_details`";
        $result=mysqli_query($conn,$select_query);
        while($row=mysqli_fetch_assoc($result))
        {
          $news_title=$row['news_title'];
          $news_discription=$row['news_discription'];
          $news_photo=$row['news_photo'];
          $news_link=$row['news_link'];
          $date=$row['date'];
          //inserting the fetched data to main page
          echo "<div class='col'>
          <div class='card h-100'>
          <a
            href='$news_link'
            ><img
              src='admin_product_images/$news_photo'
              class='card-img-top'
          /></a>
          <div class='card-body'>
            <h5 class='card-title'>
              $news_title
            </h5>
            <p class='card-text'>
              $news_discription
            </p>
          </div>
          <div class='card-footer'>
            <small class='text-body-secondary'>Last updated $date ago</small>
          </div>
          </div>
         </div>";
        }
      ?>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
