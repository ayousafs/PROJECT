<?php
    include('db.php');

    // Fetching the menu item details using the 'id' from URL
    $id = $_GET['id'];

    // Using a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM `menu` WHERE id = ?");
    $stmt->bind_param("i", $id);  // "i" specifies that $id is an integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the row data
    $row = $result->fetch_assoc();
    
    // Handle case if no row is found (optional)
    if (!$row) {
        echo "No record found with ID $id";
        exit;
    }
    if ($stmt->execute()) {
        // Redirect to index.php with a success message
        header('Location: index.php?update=success');
        exit();
    } else {
        echo "Error in updating record: " . $stmt->error;
    }
    // Close the statement
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <title>Edit Menu</title>
</head>

<body>
    <div class="container mb-3">
        <h2>Edit Menu</h2>
        <br>
        <!-- Form starts here, with action pointing to the update script -->
        <form method="POST" action="update_menu.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="form-control" id="id" required>
            <div class="mb-3">
                <label for="title" class="form-label">Product Name</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" class="form-control" id="title" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="text" name="image" value="<?php echo htmlspecialchars($row['image']); ?>" class="form-control" id="image" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" name="price" value="<?php echo htmlspecialchars($row['price']); ?>" class="form-control" id="price" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" value="<?php echo htmlspecialchars($row['full_desc']); ?>" class="form-control" id="full_desc" required>
            </div>
            <div class="mb-3">
                <label for="category_name" class="form-label">Product Category</label>
                <input type="text" name="category_class" value="<?php echo htmlspecialchars($row['category_name']); ?>" class="form-control" id="category_name" required>
            </div>
            <button type="submit" name="update" class="btn btn-dark">Update</button>
        </form>
    </div>
</body>

</html>
