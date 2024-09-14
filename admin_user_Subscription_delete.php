<?php
include 'subcription_popup_connection.php';

if (isset($_GET['deleteid'])) {
  $sino = intval($_GET['deleteid']); // Ensure $sino is an integer
  $sql = "DELETE FROM usersubcription WHERE sino = $sino";
  $result = mysqli_query($connection, $sql);

  if ($result) {
    header('Location: admin_user_Subscription.php');
    exit();
  } else {
    die("Data not deleted: " . mysqli_error($connection));
  }
}
?>
