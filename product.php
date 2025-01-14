<?php
include 'db.php'; // Include database connection
session_start();

// Fetch products from the database
$query = "SELECT * FROM products";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2 class="text-center">Product Listing</h2>
    <a href="cart.php" class="btn btn-primary mb-3">View Cart</a>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<img src="uploads/' . $row['image'] . '" class="card-img-top" alt="' . $row['name'] . '" style="height: 200px; object-fit: cover;">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                echo '<p class="card-text"><strong>Price:</strong> $' . $row['price'] . '</p>';
                echo '<form action="cart.php" method="POST" class="d-inline">';
                echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                echo '<button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>';
                echo '</form> ';
                echo '<form action="buy_now.php" method="POST" class="d-inline">';
                echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                echo '<button type="submit" class="btn btn-success">Buy Now</button>';
                echo '</form> ';
                echo '<a href="product_details.php?id=' . $row['id'] . '" class="btn btn-info">View Details</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-center">No products available.</p>';
        }
        ?>
    </div>
</div>
</body>
</html>
