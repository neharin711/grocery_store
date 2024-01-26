<?php
session_start();
include 'connection.php';
//$_SESSION['user'] = $_POST["username"];
//echo $_SESSION['username'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    //$pass = $_POST["password"];
    $pass=$_POST["password"];
    //$user_type = $_POST["usertype"];

    // Your SQL query and execution - modify this based on your actual implementation
       
    $sql= "SELECT * FROM user_data WHERE Username = '$username' AND pswd= '$pass'";
    $result = mysqli_query($connect,$sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['Username'];  // Set the session variable for the username
        $usertype = $row['user_type'];  // Corrected the field name to 'usertype'

        if ($usertype == 'admin') {
            header("Location: admindashboard.php");
            exit;
        } else {
            header("Location: home.php");
            exit;
        }
    } else {
        // Invalid credentials
        echo "Invalid username or password";
    }

    //$query->close();
}

//$connect->close();
?>
