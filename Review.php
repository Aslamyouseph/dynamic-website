<?php
  // Include the database connection file
  include 'db_conn.php';

  // Prepare the query to select the last user's name
  $select_query = "SELECT fname FROM `user` ORDER BY id DESC LIMIT 1";
  $stmt = $conn->prepare($select_query);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $name = $result['fname']; // Fetch the name from the result
  $stmt->closeCursor(); // Close the cursor after fetching
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Review</title>
    <link rel="stylesheet" href="Review.css" />
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
  </head>
  <body>
    <!-- Sticky Icon-->
    <div class="sticky-icon">
      <a href="https://www.instagram.com/?hl=en" class="Instagram">
        Instagram <i class="fab fa-instagram"></i>
      </a>
      <a href="https://www.facebook.com/" class="Facebook">
        Facebook <i class="fab fa-facebook-f"> </i>
      </a>
      <a href="https://aboutme.google.com/u/0/?referer=gplus" class="Google">
        Google + <i class="fab fa-google-plus-g"> </i>
      </a>
      <a href="https://www.youtube.com/" class="Youtube">
        Youtube <i class="fab fa-youtube"></i>
      </a>
      <a href="https://twitter.com/login" class="Twitter">
        Twitter <i class="fab fa-twitter"> </i>
      </a>
    </div>
    <h1 class="Review1">
      <center>User Reviews and Ratings:</center>
      <center>Share Your Experience on LapTopia</center>
    </h1>
    <hr style="height: 0.01px" ; color="black" />
    <hr />
    <img src="photoes/service.png" width="100%" />
    <h3 class="Review2">
      <center>
        See What Others Are Saying and Help Fellow Shoppers Choose Wisely
      </center>
    </h3>
    <div class="paragraph">
      <p>
        Welcome to <strong>LapTopia's</strong> User Reviews and Ratings section,
        where our community shares their experiences with the laptops featured
        on our site. At LapTopia, we strive to provide an unparalleled browsing
        and selection experience, offering comprehensive details,
        specifications, and expert insights on each laptop. Our goal is to make
        finding the perfect laptop easy and informative, whether you're looking
        for a powerful gaming machine, a reliable business companion, or a
        budget-friendly option. We value transparency and user feedback, as it
        helps us continuously improve our services and assist other shoppers in
        making informed decisions. Share your thoughts, rate the laptops you've
        explored, and contribute to a community that values honest and helpful
        reviews. Your input not only guides future buyers but also enhances the
        overall quality and trustworthiness of the LapTopia platform.
      </p>
    </div>
    <!--review section-->
    <form action="Review_creation.php" method="post" id="reviewform">
      <div class="container">
        <div class="wrapper">
          <p class="text">Enter your review &ensp;(Click any one emoji)</p>
          <div class="emoji">
            <div>😣</div>
            <div>😐</div>
            <div>🙂</div>
            <div>😃</div>
            <div>😍</div>
          </div>
        </div>
        <input
          type="text"
          class="name-field"
          placeholder="Enter your name"
          name="name"
          value="<?php echo $name; ?>"
          readonly
        />
        <textarea
          class="textarea"
          cols="30"
          rows="3"
          placeholder="Write your review"
          name="feedback"
        ></textarea>
        <input class="btn" type="submit" value="Submit" name="submit" />
      </div>
    </form>
    <br>
    <!--displaying the review section-->
    <?php
     include 'Review_connection.php';
     ?>
    <div class="table-container">
      <table class="styled-table">
        <thead>
          <tr>
            <th>SI No</th>
            <th>Name</th>
            <th>Feedback</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM reviewcustomer";
          $result = mysqli_query($connection, $sql);
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $sino = $row['sino'];
              $name = $row['name'];
              $feedback = $row['feedback'];
              ?>
              <tr>
                <td><?php echo $sino; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $feedback; ?></td>
              </tr>
              <?php
            }
          } else {
            echo "<tr><td colspan='3'>Error fetching records: " . mysqli_error($connection) . "</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="Review.js"></script>
  </body>
</html>
