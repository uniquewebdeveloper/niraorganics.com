<?php
session_start();
include 'db.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $quantity = 1; // You can adjust this based on your form or cart system
    
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
    echo "Product added to cart!";
}
?>
