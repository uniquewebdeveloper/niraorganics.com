<?php
session_start();
include 'db.php';

// Check if the cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h1>Your cart is empty.</h1>";
    exit;
}

$total = 0;
$items = [];

// Generate the cart summary and calculate the total amount
foreach ($_SESSION['cart'] as $product_id => $quantity) {
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();

    $subtotal = $product['price'] * $quantity;
    $total += $subtotal;

    $items[] = [
        'name' => $product['name'],
        'price' => $product['price'],
        'quantity' => $quantity,
        'subtotal' => $subtotal
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Buy Now</title>
    <style>
        .payment-methods {
            margin-top: 20px;
        }

        .payment-method {
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            display: inline-block;
        }

        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Buy Now</h1>
    <h3>Order Summary</h3>
    <ul>
        <?php foreach ($items as $item): ?>
            <li>
                <?php echo $item['name']; ?> - ₹<?php echo $item['price']; ?> x <?php echo $item['quantity']; ?>
                = ₹<?php echo $item['subtotal']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <h3>Total: ₹<?php echo $total; ?></h3>

    <div class="payment-methods">
        <h3>Select a Payment Method</h3>

        <!-- Google Pay Payment -->
        <div class="payment-method">
            <h4>Google Pay</h4>
            <?php
            $upi_id = "yourupiid@upi"; // Replace with your UPI ID
            $payment_description = "Cart Payment"; // Description for the payment
            $upi_link = "upi://pay?pa=$upi_id&pn=YourStoreName&am=$total&tn=$payment_description&cu=INR";
            ?>
            <a href="<?php echo $upi_link; ?>" class="btn">Pay with Google Pay</a>
        </div>

        <!-- Other Payment Methods -->
        <!-- You can add more payment methods here -->
    </div>

    <p>After completing the payment, <a href="payment_confirmation.php">click here</a> to confirm your order.</p>
</body>
</html>
