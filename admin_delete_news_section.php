<?php
include('adminpage_connection.php');
if (isset($_GET['deleteid'])) {
    $sino = intval($_GET['deleteid']); // Ensure $product_id is an integer
    $sql = "DELETE FROM news_details WHERE sino = $sino";
    $result = mysqli_query($conn, $sql);
  
    if ($result) {
      header('Location: admin_delete_news.php');
      exit();
    } else {
        echo "<script>alert('Data not deleted')</script>";
    }
  }
?>
