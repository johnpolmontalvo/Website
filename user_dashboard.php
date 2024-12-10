<?php
session_start();
if (!isset($_SESSION['user_id'])) { // Replace 'user_id' with your session variable
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Now!</title>
    <link rel="stylesheet" href="css/user_dashboard.css">
    <script src="javascript/hamburger.js"></script>
    <script src="javascript/user_setting.js"></script>
    <script src="javascript/user_displayMotor.js"></script>
    <script src="javascript/user_pagination.js"></script>
</head>
<body>
    <!---------------        START OF NAVBAR       --------------->
    <div class="nav-container">
        <div class="logo">
            <a href="#home"><img src="images/logo.jpg" alt="Logo"></a>
        </div>
        <div class="navbar-wrapper" id="navbar-wrapper">
            <nav>
                <ul class="navbar">
                    <li><a href="#home">Home</a></li>
                    <li><a href="user_services.php">Status of Motor</a></li>
                    <!-- <li><a href="user_payment.php">Payment</a></li> -->
                    <li><a href="user_transaction.php">Transaction</a></li>
                    <li><a href="user_account.php">Account</a></li>
                    <li><a href="#" id="openLogoutModal">Settings</a></li>
                </ul>
            </nav>
        </div>
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!------------------------END OF NAVBAR---------------------->   
    <div class="motor-container" id="motor-container">
        <div class="motor-grid" id="motor-grid1"></div>
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
    <!------------------START OF PAGINATION----------------->
    <div id="motor-container"></div>

    <div class="button-container"> 
        <button id="startBtn" class="btn btn-primary" style="float: right; margin-right: 5px;"><<</button>
        <button id="prevBtn" class="btn btn-primary" style="float: right; margin-right: 5px;"><</button>
        <b><span id="pages"></span></b>
        <button id="nextBtn" class="btn btn-primary" style="float: right; margin-right: 5px;">></button>
        <button id="lastBtn" class="btn btn-primary" style="float: right; margin-right: 5px;">>></button>
    </div>
    <!-----------------END OF PAGINATION-----------------------------> 
    <!-----------------  START OF MOTOR DETAILS MODAL    ---------------------->
    <div id="detailsModal" class="modal"> <!-- Ensure it's initially hidden -->
    <div class="modal-content">
        <span class="close-details">&times;</span>
        <h2>Motor Details</h2>
        <div id="motor-details">
            <!-- Motor Details will be populated dynamically -->
        </div>
        <div class="modal-buttons">
            <button class="close-button" id="closeButton">Close</button>
            <button class="rent-now-btn" id="rentNowButton">Rent</button>
        </div>
    </div>
    </div>
    <!---------------------   END OF MOTOR DETAIL MODAL   ---------------------->
<!-- Modal Container -->
<div id="payment-modal" class="modal">
    <div class="payment-content">
        <h1>Payment Form</h1>
        <button class="close-btn" id="close-modal">&times;</button>
        <form id="payment-form" method="POST" action="/create-payment-intent" enctype="multipart/form-data">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" placeholder="Full Name" required><br><br>

            <label for="amount">Amount (PHP):</label>
            <input type="number" id="amount" name="amount" required min="1" placeholder="Amount"><br>

            <button type="submit" class="payment">Proceed to Pay</button><br><br>

            <label for="image">Upload Proof of Payment:</label>
            <input type="file" id="image" name="image" accept="image/*" ><br><br>

            <button type="button" class="done-btn" id="done-btn">Done</button>
        </form>
    </div>
</div>


</body>
</html>