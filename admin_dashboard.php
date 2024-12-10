<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page if not logged in
    header('Location: adminlogin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <script src="javascript/admin_hamburger.js"></script> -->
    <!-- <script src="javascript/admin_logout.js"></script> -->
    <script src="javascript/total_registered.js"></script>
    <script src="javascript/total_rented.js"></script>
    <script src="javascript/total_available.js"></script>
    <script src="javascript/date_registered.js"></script>
    <!-- <script src="javascript/darkmode.js"></script> -->
    <script src="javascript/donutChart.js"></script>
    <script src="javascript/recentRegistered.js"></script>
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Admin Dashboard</title>
</head>
<body>
    <!--     START OF NAVBAR -->
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
        
        <!-- <button class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </button> -->
    </div>
    <!--     END OF NAVBAR -->
    <!--                MAIN                        -->
    <div class="dashboard">
        <h1>Dashboard
        <!-- <label class="switch">
            <input type="checkbox" id="darkModeToggle">
            <span class="slider"></span>
        </label> -->
        </h1>

        <div class="card-container">
            <!-- Total Rentals Section -->
            <div class="card">
                <div class="card-header-primary">
                    <h5><i id="iconreg" class="fa-solid fa-list fa-fade" style="color: #0a64ff;"></i>Total Registered</h5>
                </div>
                <div class="card-body text-center">
                    <h2 id="totalRent" class="display-4"></h2> <!-- Display total rentals here -->
                    <p class="lead">Total Registered</p>
                </div>
            </div>

            <!-- Motor Rented Section -->
            <div class="card">
                <div class="card-header-success">
                    <h5><i id="icon" class="fa-solid fa-motorcycle fa-fade" style="color: #30fd52;"></i>Motor Rented</h5>
                </div>
                <div class="card-body text-center">
                    <h2 id="motorRented" class="display-4"></h2> <!-- Display total motor rented here -->
                    <p class="lead">Total Rented</p>
                </div>
            </div>
            
            <!-- Motor Available Section -->
            <div class="card">
                <div class="card-header-success">
                    <h5><i id="iconavail" class="fa-solid fa-motorcycle fa-fade" style="color: #ff0000;"></i>Motor Available</h5>
                </div>
                <div class="card-body text-center">
                    <h2 id="motorAvailable" class="display-4"></h2> <!-- Display total motor rented here -->
                    <p class="lead">Total Available</p>
                </div>
            </div>

            <!-- Date Box Section -->
            <div class="card">
                <div class="card-header-info">
                    <h5><i id="icondate" class="fa-solid fa-calendar-days fa-fade" style="color: #4aaad3;"></i>Date Rented</h5>
                    <input type="date" class="form-control" id="dateInput" />
                </div>
                <div class="card-body text-center">
                    <h2 id="regDate" class="display-4"></h2> <!-- Display the rented date here -->
                    <p class="lead">Date of Registered</p>
                </div>
            </div>
        </div>

        <!-- Donut Chart Section -->
        <div class="cardDon">
            <div class="card-info">
                <h5>Rental Data</h5>
            </div>
            <div class="card-body text-center">
                <canvas id="rentalChart"></canvas> <!-- Donut Chart here -->
                <p class="leadrent">Rental Data</p>
            </div>
        </div> 
        
        <div class="recent">
        <div class="table-wrapper">
        <table id="bookingsTable">
            <h1 class="recentreg">Recent Registered</h1>
            <thead>
                <tr>
                    <th>Model</th>
                    <th>BodyNumber</th>
                    <th>License Plate</th>
                    <th>Registration Date</th>
                    <!-- <th>Status</th> -->
                </tr>
            </thead>
            <tbody>
                <!-- Data will be inserted here -->
            </tbody>
        </table>
        </div>

        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
