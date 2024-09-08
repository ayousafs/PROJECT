

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="css/admin.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
    <title>Add New Product</title>
</head>

<body>

    

    <div class="container mb-3">
    <h1>ADMIN -Menu Management</h1>    
    <h2>Add New Product</h2>
        <br>
        <form method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Product Name</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="text" name="image" class="form-control" id="image" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" name="price" class="form-control" id="price" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product Category</label>
                <input type="text" name="category_name" class="form-control" id="category_name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Product Description</label>
                <textarea name="description" class="form-control" id="full_desc" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
    <?php
    include('db.php');

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $image = $_POST['image'];
        $price = $_POST['price'];
        $description = $_POST['full_desc'];

        // Insert the new course into the database
        $query = mysqli_query($conn, "INSERT INTO menu(title, image, price, full_desc) VALUES ('$title', '$image', '$price', '$description')");

        if ($query) {
            echo "<script> alert('Product Created Successfully'); </script>";
        } else {
            echo "<script> alert('Something Went Wrong. Check Your Code'); </script>";
        }
    }
?>

</body>
</html>
