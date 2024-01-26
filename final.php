<?php
session_start();
include('connection.php');

// Your existing database connection code goes here

// Fetch products from the cart table for the current user
$username = $_SESSION['username']; // Assuming you have the username in a session variable
$cartQuery = "SELECT products.*, quantity AS cart_quantity FROM products INNER JOIN cart ON products.productID = cart.productID WHERE cart.username = '$username'";
$cartResult = mysqli_query($connect, $cartQuery);

// Display cart items and calculate sum
$sum = 0;
if ($cartResult) {

    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Your Cart</title>";
    echo "<style>";
    echo "body {";
    echo "    font-family: 'Poppins', sans-serif;";
    echo "    margin: 0;";
    echo "    padding: 0;";
    echo "    background-color: #f4f4f4;";
    echo "}";
    echo ".cart-container {";
    echo "    max-width: 800px;";
    echo "    margin: 50px auto;";
    echo "    background-color: #fff;";
    echo "    padding: 20px;";
    echo "    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);";
    echo "}";
    echo ".cart-item {";
    echo "    border-bottom: 1px solid #ddd;";
    echo "    padding: 15px 0;";
    echo "    display: flex;";
    echo "    align-items: center;";
    echo "}";
    echo ".cart-item img {";
    echo "    max-width: 80px;";
    echo "    margin-right: 20px;";
    echo "}";
    echo ".cart-info {";
    echo "    flex-grow: 1;";
    echo "}";
    echo ".total-sum {";
    echo "    margin-top: 20px;";
    echo "    font-size: 18px;";
    echo "}";
    echo "</style>";
    echo "</head>";
    echo "<body>";

    echo "<div class='cart-container'>";
    while ($row = mysqli_fetch_assoc($cartResult)) {
        $productID = $row['productID'];
        $productName = $row['productName'];
        $productPrice = $row['productPrice'];
        $cartQuantity = $row['cart_quantity'];
        $image = $row['image'];

        // Display product information
        echo "<div class='cart-item'>";
        echo "<img src='$image' alt='$productName'>";
        echo "<div class='cart-info'>";
        echo "<p>Product ID: $productID</p>";
        echo "<p>Product Name: $productName</p>";
        echo "<p>Quantity: $cartQuantity</p>";
        echo "<p>Product Price: $productPrice</p>";
        echo "</div>";
        echo "</div>";
        // Calculate sum
        $sum += ($productPrice * $cartQuantity);
    }

    // Display sum
    echo "<p class='total-sum'>Total Sum: $sum</p>";

    echo "</div>";

    echo "</body>";
    echo "</html>";
} else {
    echo "Error retrieving cart items: " . mysqli_error($connect);
}

// Close the database connection
mysqli_close($connect);
?>