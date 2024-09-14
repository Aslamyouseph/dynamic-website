<?php
include('adminpage_connection.php');
if (isset($_GET['deleteid'])) {
    $product_id = intval($_GET['deleteid']); // Ensure $product_id is an integer
    $sql = "DELETE FROM products5 WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);
  
    if ($result) {
      header('Location: admin_deleting_product5.php');
      exit();
    } else {
        echo "<script>alert('Data not deleted')</script>";
    }
  }
?>
