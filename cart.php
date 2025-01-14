<?php
include 'db.php';
session_start();

// Add to Cart Logic
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    // Add the product to the cart if it's not already added
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
    }
    header("Location: cart.php");
    exit();
}

// Remove from Cart Logic
if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    if (isset($_SESSION['cart'])) {
        // Remove the product ID from the cart
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($id) use ($product_id) {
            return $id != $product_id;
        });
    }
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container my-5">
    <h2 class="text-center">Shopping Cart</h2>
    <a href="product.php" class="btn btn-secondary mb-3">Back to Products</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($_SESSION['cart'])) {
            $ids = implode(',', $_SESSION['cart']);
            $result = $conn->query("SELECT * FROM products WHERE id IN ($ids)");
            $total = 0;

            while ($row = $result->fetch_assoc()) {
                $total += (float) $row['price']; // Ensure price is treated as a float
                echo '<tr>';
                echo '<td><img src="uploads/' . $row['image'] . '" alt="' . $row['name'] . '" style="width: 50px; height: 50px; object-fit: cover;"></td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>$' . $row['price'] . '</td>';
                echo '<td><a href="cart.php?remove=' . $row['id'] . '" class="btn btn-danger btn-sm">Remove</a></td>';
                echo '</tr>';
            }

            echo '<tr>';
            echo '<td colspan="2" class="text-end fw-bold">Total:</td>';
            echo '<td colspan="2" class="fw-bold">$' . $total . '</td>';
            echo '</tr>';
        } else {
            echo '<tr><td colspan="4" class="text-center">Your cart is empty.</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
