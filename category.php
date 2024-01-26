<!DOCTYPE html>
<html>
<head>
    <title>Category Management</title>
    <link rel="stylesheet" href="category.css">
</head>
<body>
    <h2>Category Management</h2>

   
    <form action="process_category.php" method="post">
        <label for="category">Category:</label>
        <input type="text" name="category" required>

        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" required>

        <form action="process_category.php" method="post">
        <input type="submit" value="Add Category and Product">
    </form>

    <table >
        <thead>
            <tr>
                <th>Category</th>
                <th>Product Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
           
            include 'connection.php';

            $selectQuery = "SELECT * FROM category"; 
            $result = mysqli_query($connect, $selectQuery);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['category']}</td>";
                    echo "<td>{$row['product_name']}</td>";
                    echo "</tr>";
                }
                mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($connect);
            }

            mysqli_close($connect);
            ?>
        </tbody>
    </table>
</body>
</html>
