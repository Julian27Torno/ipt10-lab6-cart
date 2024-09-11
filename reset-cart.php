<?php
session_start();
$_SESSION['cart'] = []; // Clear the cart
// Redirect back to the cart page
header("Location: cart.php");
exit;
?>
