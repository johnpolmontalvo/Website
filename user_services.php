<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user_services.css">
    <script src="javascript/user_motorStatus.js"></script>
    <script src="javascript/user_setting.js"></script>
    <title>Status</title>
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
                    <li><a href="#services">Status of Motor</a></li>
                    <!-- <li><a href="user_payment.php">Payment</a></li> -->
                    <li><a href="user_transaction.php">Transaction</a></li>
                    <li><a href="user_account.php">Account</a></li>
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

    <div class="container">
    <div class="status">
        <h1 class="recentStatus">Tricycle Status</h1>
        <input type="text" id="searchInput" placeholder="Search by Body Number" />
        <div class="table-responsive">
            <table id="table">
                <thead>
                    <tr>
                        <th>Body Number</th>
                        <th>License Plate</th>
                        <th>Schedule From</th>
                        <th>Schedule To</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be inserted here -->
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>