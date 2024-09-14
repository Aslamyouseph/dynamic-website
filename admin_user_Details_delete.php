<?php
include('home_connection_contactForm.php');

if (isset($_GET['deleteid'])) {
  $sino = intval($_GET['deleteid']); // Ensure $sino is an integer
  $sql = "DELETE FROM formuser WHERE sino = $sino";
  $result = mysqli_query($connection, $sql);

  if ($result) {
    header('Location: admin_user_Details.php');
    exit();
  } else {
    die("Data not deleted: " . mysqli_error($connection));
  }
}
?>
