<?php
session_start();
require 'products.php'; // Load the products

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    
    // Find the product by ID and add to the session cart
    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            // Add product to the cart (Session variable)
            $_SESSION['cart'][] = $product;
            break;
        }
    }
}

// Redirect to the cart page
header("Location: cart.php");
exit;
?>
