<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
<a href="product.php" class="btn btn-secondary mb-3">Back to Products</a>

    <?php
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $result = $conn->query("SELECT * FROM products WHERE id = $product_id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <div class="row">
                <!-- Product Image -->
                <div class="col-md-6">
                    <img src="uploads/<?php echo $row['image']; ?>" class="img-fluid" alt="<?php echo $row['name']; ?>">
                </div>
                <!-- Product Details -->
                <div class="col-md-6">
                    <h3><?php echo $row['name']; ?></h3>
                    <p class="fw-bold">Category: <?php echo $row['categories']; ?></p>
                    <p class="fw-bold text-success">$<?php echo $row['price']; ?></p>
                    <h5>Usage</h5>
                    <p><?php echo $row['usage']; ?></p>
                    <h5>Benefits</h5>
                    <p><?php echo $row['benefits']; ?></p>
                    <h5>Ingredients</h5>
                    <p><?php echo $row['ingredients']; ?></p>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
            <?php
        } else {
            echo '<p class="text-center">Product not found.</p>';
        }
    } else {
        echo '<p class="text-center">Invalid product ID.</p>';
    }
    ?>
</div>
</body>
</html>
