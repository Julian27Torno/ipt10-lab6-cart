<?php
session_start();
require 'products.php'; // Load the products

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if (!empty($cart)) {
    // Generate a unique order code
    $order_code = uniqid();
    
    // Initialize order details
    $total = 0;
    $order_summary = "Order Code: $order_code\nProducts:\n";
    
    // Loop through the cart and summarize the order
    foreach ($cart as $item) {
        $order_summary .= "{$item['name']} - {$item['price']} PHP\n";
        $total += $item['price'];
    }
    $order_summary .= "Total: $total PHP\n";

    // Save the order to a file named orders-[ORDER_CODE].txt
    $file_name = "orders-$order_code.txt";
    file_put_contents($file_name, $order_summary);

    // Clear the cart after placing the order
    $_SESSION['cart'] = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Place Order</title>
</head>
<body>
    <h1>Order Confirmation</h1>
    <p>Thank you for your order!</p>
    <pre><?php echo nl2br($order_summary); ?></pre>
</body>
</html>
