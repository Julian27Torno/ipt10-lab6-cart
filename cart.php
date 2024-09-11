<?php
session_start();
require 'products.php'; // Load the products

// Get the cart from the session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Your Cart</h1>
    <ul>
        <?php if (!empty($cart)): ?>
            <?php foreach ($cart as $item): ?>
                <li><?php echo $item['name']; ?> - <?php echo $item['price']; ?> PHP</li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Your cart is empty</p>
        <?php endif; ?>
    </ul>

    <a href="reset-cart.php">Clear my cart</a>
    <a href="place_order.php">Place the order</a>
</body>
</html>
