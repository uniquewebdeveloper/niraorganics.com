<?php
session_start();

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Remove product from cart
    unset($_SESSION['cart'][$product_id]);

    echo "Product removed from cart!";
}
?>
