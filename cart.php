<?php
session_start();
include ('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Your Cart</title>

    <!-- Add the provided CSS for the "Remove from Cart" button -->
    <style>
        .remove-from-cart-btn {
            background-color: #ff0000;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .remove-from-cart-btn:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>

<?php

// Your existing database connection code goes here

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['productID'])) {
    // Get the product ID and username
    $productID = $_POST['productID'];
    $username = $_SESSION['username']; // Assuming you have the username in a session variable

    // Insert the data into the cart table (adjust the table and column names as needed)
    $insertQuery = "INSERT INTO cart (productID, username) VALUES ('$productID', '$username')";

    if (mysqli_query($connect, $insertQuery)) {
        echo "Product added to cart successfully!";
    } else {
        echo "Error adding product to cart: " . mysqli_error($connect);
    }
}
// Check if the form is submitted (for removing products from the cart)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['removeProductID'])) {
    $removeProductID = $_POST['removeProductID'];
    $username = $_SESSION['username'];

    // Remove the product from the cart
    $removeQuery = "DELETE FROM cart WHERE productID = '$removeProductID' AND username = '$username'";

    if (mysqli_query($connect, $removeQuery)) {
        echo "Product removed from cart successfully!";
    } else {
        echo "Error removing product from cart: " . mysqli_error($connect);
    }
}

// Fetch products from the cart table for the current user
$username = $_SESSION['username']; // Assuming you have the username in a session variable
$cartQuery = "SELECT products.*, quantity AS cart_quantity FROM products INNER JOIN cart ON products.productID = cart.productID WHERE cart.username = '$username'";
$cartResult = mysqli_query($connect, $cartQuery);

// Display cart items
if ($cartResult) {
    while ($row = mysqli_fetch_assoc($cartResult)) {
        $productID = $row['productID'];
        $productName = $row['productName'];
        $productPrice = $row['productPrice'];
        $quantity = $row['quantity'];
        $image = $row['image'];
        $cartQuantity = $row['cart_quantity'];

        // Display product information
        echo "<div class='cart-item'>";
        echo "<img src='$image' alt='$productName'>";
        echo "<p>ID: $productID</p>";
        echo "<p>Name: $productName</p>";
        echo "<p>Price: $productPrice</p>";
        echo "<p>Quantity: <input type='number' name='quantity' value='$cartQuantity'></p>";

        // Add the "Remove from Cart" button
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='removeProductID' value='$productID'>";
        echo "<input type='submit' class='remove-from-cart-btn' value='Remove from Cart'>";
        echo "</form>";

        

        echo "</div>";
    }
} else {
    echo "Error retrieving cart items: " . mysqli_error($connect);
}


// Close the database connection
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>

    <!-- Add CSS for the submit button -->
    <style>
        .submit-btn {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<!-- Add the submit button -->
<form action="final.php" method="post">
    <input type="submit" class="submit-btn" value="Update Cart">
</form>

<!-- ... Your existing HTML content ... -->

</body>
</html>