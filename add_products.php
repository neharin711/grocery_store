<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $quantity = $_POST["quantity"];
    $category = $_POST["category"];

    // Handle uploaded image
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["productImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // ... (image validation and upload code)

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is OK, try to upload the file
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["productImage"]["name"])) . " has been uploaded.";

            // Now you can save other form data and the file path to a database
            include 'connection.php';

            // Sanitize input to prevent SQL injection
            $productName = mysqli_real_escape_string($connect, $productName);
            $productPrice = mysqli_real_escape_string($connect, $productPrice);
            $quantity = mysqli_real_escape_string($connect, $quantity);
            $category = mysqli_real_escape_string($connect, $category);
            $imagePath = mysqli_real_escape_string($connect, $targetFile);

            // Insert data into the database
            $insertQuery = "INSERT INTO products (productName, productPrice, quantity, category, image) 
                            VALUES ('$productName', '$productPrice', '$quantity', '$category', '$imagePath')";

            if (mysqli_query($connect, $insertQuery)) {
                echo "Data inserted into the database successfully.";
            } else {
                echo "Error inserting data: " . mysqli_error($connect);
            }

            // Close the database connection
            mysqli_close($connect);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    // ...
}
?>
