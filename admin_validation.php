<?php
include 'connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = $connect->prepare("SELECT * FROM user_data WHERE Username = ? AND password = ?");
    $query->bind_param("ss", $username, $password);

    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $user_type = $row['user_type'];
    
        if ($user_type == 'admin') {
            header("Location: admin.html");
            exit;
        } else {
            header("Location: user.html");
            exit;
        }
    }
    } else {
        // Invalid credentials
        echo "Invalid username or password";
    }

    $query->close();
}

$connect->close();
?>
