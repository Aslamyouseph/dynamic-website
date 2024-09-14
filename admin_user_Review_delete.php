<?php
include 'Review_connection.php';

if (isset($_GET['deleteid'])) {
  $sino = intval($_GET['deleteid']); // Ensure $sino is an integer
  $sql = "DELETE FROM reviewcustomer WHERE sino = $sino";
  $result = mysqli_query($connection, $sql);

  if ($result) {
    header('Location: admin_user_Review.php');
    exit();
  } else {
    die("Data not deleted: " . mysqli_error($connection));
  }
}
?>
