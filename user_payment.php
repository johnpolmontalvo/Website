<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="css/user_dashboard.css">
    <link rel="stylesheet" href="css/user_payment.css">
    <script src="javascript/hamburger.js"></script>
    <script src="javascript/user_setting.js"></script>
    <script src="javascript/main.js"></script>


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
                    <li><a href="user_dashboard.php">Home</a></li>
                    <li><a href="user_services.php">Status of Motor</a></li>
                    <li><a href="user_payment.php">Payment</a></li>
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
    <h1>Payment Form</h1>
    <form id="payment-form" method="POST" action="/create-payment-intent" enctype="multipart/form-data">
    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" placeholder="Full Name"><br><br>

    <label for="amount">Amount (PHP):</label>
    <input type="number" id="amount" name="amount" required min="1" placeholder="Amount"><br>

    <button type="submit" class="payment">Proceed to Pay</button><br>

    <label for="image">Upload Proof of Payment:</label>
    <input type="file" id="image" name="image" accept="image/*"><br><br>

    <button type="button" class="done-btn">Done</button>
</form>

    <!-- <script>
        document.getElementById('payButton').addEventListener('click', async () => {
            const amount = 10000; // 100 PHP in centavos
            const response = await fetch('http://localhost/backendtoda/test.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ amount })
            });

            const data = await response.json();

            if (data.data && data.data.attributes) {
                const intentId = data.data.id;
                const clientKey = data.data.attributes.client_key;

                // Redirect to PayMongo checkout URL
                const checkoutUrl = `https://pm.link/toda-management/test/f7PhoHk`;
                window.location.href = checkoutUrl;
            } else {
                alert('Payment failed!');
                console.error(data);
            }
        });
    </script> -->

</body>
</html>