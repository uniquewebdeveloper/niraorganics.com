<?php
session_start();

// Check if the cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty.";
    exit;
}

// Process the order (in this case, just clearing the cart)
unset($_SESSION['cart']); // Clear the cart after purchase

// Display confirmation message
echo "<h1>Thank you for your purchase!</h1>";
echo "<p>Your order has been processed successfully.</p>";

// You can redirect to a confirmation page or order history page here
// header("Location: order_confirmation.php"); 
?>
