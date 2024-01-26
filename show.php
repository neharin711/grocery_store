<?php
include 'connection.php';

// Assuming you've validated and sanitized user input
$user_type=0;    //for customers
$uname = $_GET["username"];
$uemail = $_GET["email"];
$upass = password_hash($_GET["pass"], PASSWORD_DEFAULT); // Hash the password before storing it
$upassw = $_GET["pass"];

//$hashedPassword = password_hash($upass, PASSWORD_DEFAULT);


// Use prepared statements to prevent SQL injection
$query = $connect->prepare("INSERT INTO user_data (Username, email, pswd,user_type) VALUES (?, ?, ?,?)");

// Check if the query preparation was successful
if ($query) {
    $query->bind_param("ssss", $uname, $uemail, $upassw,$user_type);
    //$user_type = 'admin'; // or 'user'
    $result = $query->execute();
    $query->close();

    if ($result) {
        //echo "User registered successfully!";
        ?>
    <head>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    h3 {
        color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        box-sizing: border-box;
    }

    input[type="Submit"] {
        background-color: #4caf50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    input[type="Submit"]:hover {
        background-color: #45a049;
    }

    .text {
        text-align: center;
    }

    .input-box {
        margin-top: 20px;
    }

    .button {
        text-align: center;
    }
</style>
</head>
        <form action="loginmain.php" method="GET">
        
            <div class="text">
                <h3>User registered successfully!</h3>
                <div class="input-box button">
                    <input type="Submit" value="Login Now">
                </div>
            </div>
            </form>
        <?php
        // Redirect to cccccc.html after a short delay (you can adjust the delay as needed)
        //echo '<meta http-equiv="refresh" content="3;url=home.php">';
    } else {
        echo "Registration failed. Please try again.";
    }
} else {
    // Handle the case where the query preparation failed
    echo "Query preparation failed.";
}

// Close the database connection
$connect->close();
?>
