<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Grocery Store</title>
    <link rel="stylesheet" href="login css.css">
</head>

<body>



    <div class="login-container">
        <h2>Login to Grocery Store</h2>
        <form action="login.php" method="POST">
            
            <div class="input-box">
                <input type="text" name="username" placeholder="username" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="password" required>
            </div>
            <div class="input-box">
                <button type="submit">Log in now</button>
            </div>
        </form>
        <div class="signup-link">
            Don't have an account? <a href="registration.html">Sign up</a>
        </div>
    </div>
</body>
</html>
