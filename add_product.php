<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2 class="text-center">Add Product</h2>
    <form action="add_product.php" method="POST" enctype="multipart/form-data">
    <label for="name">Product Name:</label>
    <input type="text" name="name" id="name" class="form-control" required>

    <label for="categories">Category:</label>
    <input type="text" name="categories" id="categories" class="form-control" required>

    <label for="usage">Usage:</label>
    <textarea name="usage" id="usage" class="form-control" required></textarea>

    <label for="benefits">Benefits:</label>
    <textarea name="benefits" id="benefits" class="form-control" required></textarea>

    <label for="ingredients">Ingredients:</label>
    <textarea name="ingredients" id="ingredients" class="form-control" required></textarea>

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" class="form-control" step="0.01" required>

    <label for="image">Image:</label>
    <input type="file" name="image" id="image" class="form-control" required>

    <button type="submit" class="btn btn-primary mt-3">Add Product</button>
</form>
</div>
</body>
</html>
