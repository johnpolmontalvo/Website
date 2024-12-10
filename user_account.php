<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user_account.css">
    <script src="javascript/user_Account.js"></script>
    <script src="javascript/user_setting.js"></script>
    <title>Account</title>
</head>

<body>

    <!---------------        START OF NAVBAR       --------------->

    <div class="nav-container">
        <div class="logo">
            <a href="#home"><img src="images/logo.jpg" alt=""></a>
        </div>
        <div class="navbar-wrapper">
            <nav>
                <ul class="navbar">
                    <li><a href="user_dashboard.php">Home</a></li>
                    <li><a href="user_services.php">Status of Motor</a></li>
                    <!-- <li><a href="user_payment.php">Payment</a></li> -->
                    <li><a href="user_transaction.php">Transaction</a></li>
                    <li><a href="#">Account</a></li>
                    <li><a href="#" id="openLogoutModal">Settings</a></li>
                </ul>
            </nav>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

     <!------------------------END OF NAVBAR---------------------->   

    <!-- Account Details Section -->
    <div class="account-details">
        <h2>Account Details</h2>
        <div id="accountInfo" class="account-box">
            <p><strong>Firstname:</strong> <span id="Firstname"></span></p>
            <p><strong>Lastname:</strong> <span id="Lastname"></span></p>
            <p><strong>Email:</strong> <span id="Email"></span></p>
            <p><strong>Phonenumber:</strong> <span id="Phonenumber"></span></p>
            <p><strong>Gender:</strong> <span id="Gender"></span></p>
            <!-- Add more fields as needed -->
        </div>
    </div>

      <!--------------------START OF LOG OUT MODAL-------------------------->

                <div id="logoutModal" class="modal">
                    <div class="modal-content">
                        <span class="close-logout">&times;</span>
                        <h2>Confirm Logout</h2>
                        <p>Are you sure you want to log out?</p>
                        <div class="button-container">
                            <button class="close-logout">Cancel</button>
                            <button id="confirmLogout">Yes, Logout</button>
                        </div>
                    </div>
                </div>

        <!-------------------END OF LOG OUT MODAL---------------->
     
</body>
</html>
