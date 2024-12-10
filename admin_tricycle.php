<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="javascript/admin_RegTricycle.js"></script>
    <script src="javascript/admin_tricycleInfo.js"></script>
    <link rel="stylesheet" href="css/admin_tricycle.css">
    <title>Tricycle</title>
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
        <h1 class="recentreg">Registered Tricycle</h1>
        <input type="text" id="searchInput" placeholder="Search by Full Name" />
        <table id="bookingsTable">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>License Plate</th>
                    <th>Registration Date</th>
                    <th>Status</th>
                    <th>Info</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be inserted here -->
            </tbody>
        </table>
        <div class="btn">
            <button class="register" id="register"> Register </button>
        </div>
    </div>
</div>

<div id="informationModal" class="modalInformation" style="display: none;">
    <div class="content-modal">
        <span id="closeModal" class="close">&times;</span>
        <h2>Information</h2>

        <div class="info">
            <!-- Driver Image Row -->
            <div class="modal-row">
                <!-- <img id="modalOwner" src="" alt="driver Image"/> -->
                <img id="modalTricycle" src="" alt="motor Image"/>
            </div>
        
            <div class="information">
                <p><strong>Full Name:</strong> <span id="modalFullName"></span></p> 
                <p><strong>Age:</strong> <span id="modalage"></span></p>
                <p><strong>Gender:</strong> <span id="modalGender"></span></p>
                <p><strong>Address:</strong> <span id="modalAddress"></span></p>
                <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                <p><strong>Contact No:</strong> <span id="modalContactNo"></span></p>
                <p><strong>Model:</strong> <span id="modalModel"></span></p>    
                <p><strong>Registered Date motor:</strong> <span id="modalregistereddate"></span></p>        
                <p><strong>License Plate:</strong> <span id="modalLicensePlate"></span></p>
                <p><strong>Body Number:</strong> <span id="modalBodyNumber"></span></p>
                <p><strong>OR/CR:</strong> <span id="modalORCR"></span></p>
                <p><strong>Price:</strong> <span id="modalPrice"></span></p>
                <p><strong>Registration Date:</strong> <span id="modalRegistrationDate"></span></p>
                <p><strong>Status:</strong> <span id="modalStatus"></span></p>
            </div>
        </div>
    </div>
</div>



        <!--------------------START OF REGISTRATION ----------------------->
        <div id="registrationModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Register Your Motor</h2>
                    <!-- Step 1 -->
                <div class="form-step" id="step-1">
                    <div class="form-group">
                        <label for="fullname">Fullname:</label>
                        <input type="text" id="fullname" name="fullname" placeholder="Fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="text" id="age" name="age" placeholder="Age" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <input type="text" id="gender" name="gender" placeholder="Gender" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" placeholder="Address" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="model">Model:</label>
                        <input type="text" id="model" name="model" placeholder="Model" required>
                    </div>
                    <div class="form-group">
                        <label for="contactNo">Contact No:</label>
                        <input type="number" id="contactNo" name="contactNo" placeholder="ContactNo" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="driverImage">Driver Image:</label>
                        <input type="file" id="driverImage" name="driverImage" accept="image/png, image/jpeg, image/gif", required>
                    </div> -->
                </div>
                    <!-- Step 2 -->
                <div class="form-step" id="step-2" style="display:none;">
                <div class="form-group">
                        <label for="licensePlate">Registered Date:</label>
                        <input type="text" id="registereddate" name="registereddate" placeholder="Registered Date" required>
                    </div>
                    <div class="form-group">
                        <label for="licensePlate">License Plate:</label>
                        <input type="text" id="licensePlate" name="licensePlate" placeholder="License Plate" required>
                    </div>
                    <div class="form-group">
                        <label for="bodyNumber">Body Number:</label>
                        <input type="text" id="bodyNumber" name="bodyNumber" placeholder="Body Number" required>
                    </div>
                    <div class="form-group">
                        <label for="orcr">OR/CR:</label>
                        <input type="text" id="orcr" name="orcr" placeholder="OR/CR" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price Boundary:</label>
                        <input type="number" id="price" name="price" placeholder="Price Boundary" required>
                    </div>
                    <div class="form-group">
                        <label for="motorImage">Motor image:</label>
                        <input type="file" id="motorImage" name="motorImage" accept="image/png, image/jpeg, image/gif", required>
                    </div>
                    <div class="button-container1" id="registrationForm">
                        <button class="submit-btn" id="submit-btn-registration">Register</button>
                    </div>
                </div>
                        <!-------------------START OF NAVIGATION BUTTON FOR REGISTER------------------->
                <div class="button-container1">
                    <button class="prev-btn" id="prev-btn" style="display:none;">Previous</button>
                    <button class="next-btn" id="next-btn">Next</button>
                    <button class="next-btn" id="next-btn-step-2" style="display:none;">Next</button>
                </div>
            </div>
        </div>
        <!-------------- END OF NAVIGATION BUTTON FOR REGISTER--------------------->    
        
        <!-------------------END OF REGISTRATION-------------------->           

    <!--     END OF NAVBAR -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
</body>
</html>