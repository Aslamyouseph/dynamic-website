<?php
include 'contact_connect.php';

if (isset($_GET['deleteid'])) {
  $sino = intval($_GET['deleteid']); // Ensure $sino is an integer
  $sql = "DELETE FROM contactuser WHERE sino = $sino";
  $result = mysqli_query($connection, $sql);

  if ($result) {
    header('Location: admin_user_contact.php');
    exit();
  } else {
    die("Data not deleted: " . mysqli_error($connection));
  }
}
?>
