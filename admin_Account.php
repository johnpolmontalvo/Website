<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="javascript/admin_Account.js"></script>
    <script src="javascript/admin_registration.js"></script>
    <link rel="stylesheet" href="css/admin_Account.css">
    <title>Account</title>
</head>
<body>
    <!-- START OF NAVBAR -->
    <div class="sidebar">
        <h3 class="text"><i id="iconadmin" class="fa-solid fa-user-tie fa-fade" style="color: #1f4c98;"></i>Admin</h3>
        <div class="sider-link" id="sider-link"> <!-- Add id here -->
            <a href="admin_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="admin_tricycle.php"><i class="fas fa-motorcycle"></i> Tricycle</a>
            <a href="admin_scheduled.php"><i class="fas fa-clipboard-list"></i> Schedule Management</a>
            <a href="admin_motorStatus.php"><i class="fa-solid fa-signal"></i> Motor status</a>
            <a href="admin_Account.php"><i class="fas fa-users"></i>Admin Account</a>
            <a href="admin_Payment.php"><i class="fa-solid fa-money-check-dollar"></i>Payment</a>
            <a href="admin_appointment.php"><i class="fa-solid fa-calendar"></i> Appointment</a>
            <a href="admin_DriverInfo.php"><i class="fa-solid fa-id-card"></i> Drivers Info</a>

            <div class="logout">
                <a href="admin_logout.php" class="logout-link"><i class="fas fa-sign-out-alt"></i> Log Out</a> <!-- Updated Log Out -->
            </div>
        </div>
    </div>

    <!-- END OF NAVBAR -->
     
    <!-- Account Details Section -->
    <div class="container">
        <div class="account-details">
            <h2>Account Details</h2>
            <div id="accountInfo" class="account-box">
                <p><strong>Firstname:</strong> <span id="Firstname"></span></p>
                <p><strong>Lastname:</strong> <span id="Lastname"></span></p>
                <p><strong>Email:</strong> <span id="Email"></span></p>
                <p><strong>Phonenumber:</strong> <span id="Phonenumber"></span></p>
                <p><strong>Gender:</strong> <span id="Gender"></span></p>
            </div>  
            <!-- Create Account Button -->
         <button id="createAccountBtn" class="btn">Create Account</button>    
        </div>
    </div>

    <!-- Create Account Modal -->
    <div id="createAccountModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Create New Account</h2>
            <form id="createAccountForm">
                <label for="firstNameInput">Firstname:</label>
                <input type="text" id="firstNameInput" name="firstname" required><br>
                
                <label for="lastNameInput">Lastname:</label>
                <input type="text" id="lastNameInput" name="lastname" required><br>

                <label for="usernameInput">Username:</label>
                <input type="text" id="userNameInput" name="username" required><br>

                <label for="passwordInput">Password:</label>
                <input type="password" id="passwordInput" name="password" required><br>
                
                <label for="emailInput">Email:</label>
                <input type="email" id="emailInput" name="email" required><br>
                
                <label for="phoneInput">PhoneNumber:</label>
                <input type="number" id="phoneInput" name="phonenumber" required><br>

                <label for="addressInput">Address:</label>
                <input type="text" id="addressInput" name="address" required><br>
                
                <label for="genderInput">Gender:</label>
                <select id="genderInput" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select><br>
                
                <button type="submit" id="submit" class="submit1">Submit</button>
            </form>
        </div>
    </div>

</body>
</html>