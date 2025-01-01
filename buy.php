<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'teachify');

// Get the form data
$product_id = $_GET['id'];
//$quantity = $_POST['quantity'];
$user_id = $_SESSION['user_id']; // Assume the user is logged in

// Fetch product details
$product = $conn->query("SELECT * FROM products WHERE id = $product_id")->fetch_assoc();

if ($product['stock'] >= $quantity) {
    // Calculate total price
  $total_price = $product['price'] * $quantity;

    // Deduct stock
   // $new_stock = $product['stock'] - $quantity;
    //$conn->query("UPDATE products SET stock = $new_stock WHERE id = $product_id");

    // Insert into orders table
    $conn->query("INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `total_price`, `created_at`) VALUES (NULL, $user_id, $product_id, '1', $total_price, current_timestamp());");
   

    // Confirmation message
    echo "Purchase successful! You bought $quantity of {$product['name']} for $total_price.";
} else {
    echo "Sorry, not enough stock available.";
}
?>
