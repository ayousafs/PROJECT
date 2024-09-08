<?php
// Include database connection
include('db.php');

// Fetch menu items from the database
$sql = "SELECT * FROM `menu` ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die('SQL Error: ' . mysqli_error($conn));  // Handle SQL error
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link href="css/admin.css" rel="stylesheet" />
    <title>Admin - Menu Management</title>
</head>

<body>



    <div class="container mt-4">
        <h3 class="mb-4">Menu Management</h3>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="background-color: black; color:white;">Sr.</th>
                    <th style="background-color: black; color:white;">Image</th>
                    <th style="background-color: black; color:white;">Product Name</th>
                    <th style="background-color: black; color:white;">Price</th>
                    <th style="background-color: black; color:white;">Description</th>
                    <th style="background-color: black; color:white;">Category</th>
                    <th style="background-color: black; color:white;">Edit</th>
                    <th style="background-color: black; color:white;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Check if there are any records in the result
                if (mysqli_num_rows($result) > 0) {
                    $sn = 1;  // Serial number for rows
                    while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $sn; ?></td>
                    <td>
                        <img class="rounded" src="<?php echo htmlspecialchars($data['image']); ?>" width="70px" height="40px" alt="Product Image">
                    </td>
                    <td><?php echo htmlspecialchars($data['title']); ?></td>
                    <td><?php echo htmlspecialchars($data['price']); ?></td>
                    <td><?php echo htmlspecialchars($data['full_desc']); ?></td>
                    <td><?php echo htmlspecialchars($data['category_name']); ?></td>
                    <td>
                        <a href="update_menu.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning rounded-pill btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="delete_menu.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-danger rounded-pill btn-sm" onclick="return confirm('Are you sure you want to delete it?');">Delete</a>
                    </td>
                </tr>
                <?php
                        $sn++;
                    }
                } else {
                ?>
                <tr>
                    <td colspan="7" class="text-center">No Data Found...</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <body class="sub_page">

  <div class="hero_area">
    <div class="form">
      
    </div>
    <div class="container mt-4">
        <h1>Admin Dashboard</h1>
        <!-- Add Product Button -->
        <a href="add_menu.php" class="btn btn-primary">Add Product</a>
    </div>
  </div>

</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
