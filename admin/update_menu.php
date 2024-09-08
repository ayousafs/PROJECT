<link href="css/admin.css" rel="stylesheet" />
<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];

    // Retrieve and sanitize form data
    $title = htmlspecialchars($_POST['title']);
    $image = htmlspecialchars($_POST['image']);
    $price = htmlspecialchars($_POST['price']);
    $category_name = htmlspecialchars($_POST['category_name']);
    $description = htmlspecialchars($_POST['description']);

    // Prepare the SQL statement to avoid SQL injection
    $stmt = $conn->prepare("UPDATE `menu` SET 
        title = ?, 
        image = ?, 
        price = ?, 
        category_name = ?, 
        full_desc = ? 
        WHERE id = ?");
    $stmt->bind_param("sssssi", $title, $image, $price, $category_name, $description, $id);

    if ($stmt->execute()) {
        // Redirect to index.php with a success message
        header('Location: index.php?update=success');
        exit();
    } else {
        echo "Error in updating record: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
} else {
    // Fetch existing data to pre-populate the form
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM `menu` WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $menu = $result->fetch_assoc();

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <title>Admin - Menu Management</title>
</head>
<body>
    <div class="container mt-4">
        <h3>Edit Menu</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($menu['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="text" class="form-control" id="image" name="image" value="<?php echo htmlspecialchars($menu['image']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($menu['price']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="category_name" class="form-label">Product Category</label>
                <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo htmlspecialchars($menu['category_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Product Description</label>
                <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($menu['full_desc']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</body>
</html>
