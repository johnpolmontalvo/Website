<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="javascript/admin_motorStatus.js"></script>
        <link rel="stylesheet" href="css/admin_motorStatus.css">
        <title>Status</title>
    </head>

    <script>

    </script>
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
        </div>

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
