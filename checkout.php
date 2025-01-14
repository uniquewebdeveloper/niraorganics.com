<?php
session_start();
include 'db.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty.";
    exit;
}

$total = 0;
echo "<h1>Checkout</h1>";
echo "<table>";
echo "<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th></tr>";

foreach ($_SESSION['cart'] as $product_id => $quantity) {
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();

    // Display product details in the checkout page
    echo "<tr>";
    echo "<td><img src='uploads/{$product['image']}' alt='{$product['name']}' width='50'></td>";
    echo "<td>\${$product['price']}</td>";
    echo "<td>$quantity</td>";
    echo "<td>\$" . $product['price'] * $quantity . "</td>";
    echo "</tr>";

    $total += $product['price'] * $quantity;
}

echo "</table>";
echo "<h3>Total: \$$total</h3>";

// Create a form to handle the purchase (for simplicity, this is just a confirmation)
echo "<form method='POST' action='process_order.php'>
        <input type='hidden' name='total' value='$total'>
        <button type='submit' class='buy-now-button'>Complete Purchase</button>
      </form>";

?>
