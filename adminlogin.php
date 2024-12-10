
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/adminlogin.css">
        <title>Log in form</title>
        <script src="javascript/adminlogin.js"></script>
    </head>
<body>
    <div class="form">
            <h1>Admin login</h1>

            <div class="input-box">
            <input type="text" placeholder="Username" id="username" required>
            </div>

            <div class="input-box">
            <input type="password" placeholder="password" id="password" required>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password</a>
            </div>

            <button type="submit" class="btn" id="adminLogin">Login</button>

            <!-- <div class="back">
                <a href="login.php">Back</a></p>
            </div>  -->
    </div>
</body>
</html>