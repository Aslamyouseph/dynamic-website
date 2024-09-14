<?php
include('adminpage_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - deleting  news sections</title>
    <link rel="stylesheet" href="admin_delete_section_style.css">
</head>
<body>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>sino</th>
                <th>News Title</th>
                <th>News Description</th>
                <th>News link</th>
                <th>News Photoes</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM `news_details`";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $sino  = $row['sino'];
                $news_title = $row['news_title'];
                $news_discription = $row['news_discription'];
                $news_link = $row['news_link'];
                $news_photo = $row['news_photo'];
            
                ?>
                <tr>
            
                    <td><?php echo $sino; ?></td>
                    <td><?php echo $news_title; ?></td>
                    <td><?php echo $news_discription; ?></td>
                    <td><a href="<?php echo $news_link; ?>" target="_blank">news_link</a></td>
                    <td><img src="admin_product_images/<?php echo $news_photo; ?>" alt="Product Image"></td>
                    <td>
                        <button><a href="admin_delete_news_section.php?deleteid=<?php echo $sino; ?>">Delete</a></button>
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
