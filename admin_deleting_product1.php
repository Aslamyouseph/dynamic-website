<?php
include('adminpage_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Managing Gaming Laptops</title>
    <link rel="stylesheet" href="admin_delete_section_style.css">
</head>
<body>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Keyword 1</th>
                <th>Keyword 2</th>
                <th>Keyword 3</th>
                <th>Keyword 4</th>
                <th>Keyword 5</th>
                <th>Image</th>
                <th>Amazon Link</th>
                <th>Details Link</th>
                <th>Original Price</th>
                <th>Discount Price</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM `products`";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $Product_Title = $row['Product_Title'];
                $Product_Description = $row['Product_Description'];
                $Product_Keywords1 = $row['Product_Keywords1'];
                $Product_Keywords2 = $row['Product_Keywords2'];
                $Product_Keywords3 = $row['Product_Keywords3'];
                $Product_Keywords4 = $row['Product_Keywords4'];
                $Product_Keywords5 = $row['Product_Keywords5'];
                $Product_Image = $row['Product_Image'];
                $amazon_link = $row['amazon_link'];
                $details_link = $row['details_link'];
                $Original_Price = $row['Original_Price'];
                $Discount_Price = $row['Discount_Price'];
                ?>
                <tr>
                    <td><?php echo $product_id; ?></td>
                    <td><?php echo $Product_Title; ?></td>
                    <td><?php echo $Product_Description; ?></td>
                    <td><?php echo $Product_Keywords1; ?></td>
                    <td><?php echo $Product_Keywords2; ?></td>
                    <td><?php echo $Product_Keywords3; ?></td>
                    <td><?php echo $Product_Keywords4; ?></td>
                    <td><?php echo $Product_Keywords5; ?></td>
                    <td><img src="admin_product_images/<?php echo $Product_Image; ?>" alt="Product Image"></td>
                    <td><a href="<?php echo $amazon_link; ?>" target="_blank">Amazon</a></td>
                    <td><a href="<?php echo $details_link; ?>" target="_blank">Details</a></td>
                    <td><?php echo $Original_Price; ?></td>
                    <td><?php echo $Discount_Price; ?></td>
                    <td>
                        <button><a href="admin_delete1.php?deleteid=<?php echo $product_id; ?>">Delete</a></button>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<script>alert('Error fetching records')</script>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
