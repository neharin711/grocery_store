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
    $sql = "select * from user_data";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
    ?>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>user type</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["Username"] . '</td>';
            echo '<td>' . $row["email"] . '</td>';
            echo '<td>' . $row["password"] . '</td>';
            echo '<td>' . $row["user_type"] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    <?php
    }
    ?>
</body>
</html>
