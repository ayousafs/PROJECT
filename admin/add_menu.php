<?php
ob_start(); // Start output buffering

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $title = htmlspecialchars($_POST['title']);
    $image = htmlspecialchars($_POST['image']);
    $price = htmlspecialchars($_POST['price']);
    $description = htmlspecialchars($_POST['full_desc']);
    $category_class = htmlspecialchars($_POST['category_name']); // Fixed typo

    // Prepare SQL statement to insert a new product into the database
    $stmt = $conn->prepare("INSERT INTO menu (image, title, price, full_desc, category_name) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $image, $title, $price, $description, $category_class);

    if ($stmt->execute()) {
        // Redirect to index.php with a success message
        header('Location: index.php?add=success');
        exit();
    } else {
        echo "Error adding product: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

ob_end_flush(); // End output buffering and flush the output
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <title>Admin - Add Product</title>
</head>
<body>
<a href="index.php" class="btn btn-secondary">Back to Index</a>
    <div class="container mt-4">
        <h3>Add New Product</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="text" class="form-control" id="image" name="image" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Product Description</label>
                <textarea class="form-control" id="full_desc" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="category_name" class="form-label">Product Category</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</body>
</html>
