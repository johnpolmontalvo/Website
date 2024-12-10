
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Log in form</title>
</head>
<body>
    <div class="form">
        <h1>Login</h1>

        <div class="input-box">
            <input type="text" name="username" id="username" placeholder="Username" required>
            <i class='bx bxs-user'></i>
        </div>

        <div class="input-box">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>

        <div class="remember-forgot">
            <label><input type="checkbox"> Remember me</label>
            <a href="#">Forgot Password</a>
        </div>

        <button type="button" class="btn" id="loginbtn">Login</button>

        <div class="register-link">
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>

        <!-- <div class="register-link2">
            <a href="adminlogin.php">Go To Admin Log in</a>
        </div> -->
        <div class="back">
                <a href="index.php">Back</a></p>
            </div> 
    </div>
    <script src="javascript/login.js"></script>

</body>
</html>
