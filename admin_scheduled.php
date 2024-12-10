<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/admin_scheduled.css">
        <title>Setting</title>
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
            <div class="recent">
                <table id="bookingsTable">
                    <h1 class="recentreg">Schedule Manager</h1>
                    <thead>
                        <tr>
                            <th>Owner</th>
                            <th>Model</th>
                            <th>License Plate</th>
                            <th>Registration Date</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be inserted here -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal HTML -->
        <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Full Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body scrollable-modal">
                        <div class="image-container">
                            <!-- <img src="" alt="owner" id="modalOwner" class="modal-img"> -->
                            <img src="" alt="tricycle" id="modalTricycle" class="modal-img">
                        </div>
                        <div class="info-container">
                            <p><strong>Full Name:</strong> <span id="modalFullName"></span></p>
                            <p><strong>Age:</strong> <span id="modalAge"></span></p>
                            <p><strong>Gender:</strong> <span id="modalGender"></span></p>
                            <p><strong>Contact No.:</strong> <span id="modalContactNo"></span></p>
                            <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                            <p><strong>Address:</strong> <span id="modalAddress"></span></p>
                            <p><strong>Model:</strong> <span id="modalModel"></span></p>
                            <p><strong>License Plate:</strong> <span id="modalLicensePlate"></span></p>
                            <p><strong>Body Number:</strong> <span id="modalBodyNumber"></span></p>
                            <p><strong>ORCR:</strong> <span id="modalORCR"></span></p>
                            <p><strong>Registration Motor:</strong> <span id="modalregistereddate"></span></p>
                            <p><strong>Price Boundary:</strong> <span id="modalprice"></span></p>

                        </div>

                        <form id="scheduleForm">
                            <div class="date-picker-container">
                                <div class="form-group">
                                    <label for="dateFrom">From:</label>
                                    <input type="date" id="dateFrom" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="dateTo">To:</label>
                                    <input type="date" id="dateTo" class="form-control" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" id="saveSchedule">Save</button>
                    </div>
                </div>
            </div>
        </div>


        <!--     END OF NAVBAR -->
        <script src="javascript/admin_pendingSchedule.js"></script> 
    </body>
</html>