<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = mysqli_real_escape_string($connect, $_POST["category"]);
    $product_name = mysqli_real_escape_string($connect, $_POST["product_name"]);

    $insertQuery = "INSERT INTO category (category, product_name) VALUES ('$category', '$product_name')"; 

    if (mysqli_query($connect, $insertQuery)) {
        echo "Category and Product added successfully.";
    } else {
        echo "Error adding data: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>
