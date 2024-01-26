<!DOCTYPE html>
<html lang="en">
<?php include 'connection.php'; ?>
<head>
    <link rel="stylesheet" type="text/css" href="registered_users_css.css"/>
    <title>Registered Users</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Registered Users</h1>
    <?php
    // Handle potential connection errors
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Query to fetch user data along with ordered products
    $sql = "SELECT user_data.Username, user_data.email, user_data.user_type, GROUP_CONCAT(cart.productID) AS ordered_products
            FROM user_data
            LEFT JOIN cart ON user_data.Username = cart.username
            GROUP BY user_data.Username";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
    ?>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Ordered Products</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["Username"] . '</td>';
            echo '<td>' . $row["email"] . '</td>';
            echo '<td>' . $row["user_type"] . '</td>';
            echo '<td>' . $row["ordered_products"] . '</td>'; // Display ordered products
            echo '</tr>';
        }
        ?>
    </table>
    <?php
    }
    ?>
</body>
</html>
   