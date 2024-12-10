<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/register.css">
        <title>Registration</title>
    </head>
    <body>
        <div class="container">
            <h1 class="form-title">Registration</h1>
            <form action="#" id="registrationForm">
                <div class="main-user-info">
                    <div class="user-input-box">
                        <label for="firstname">First Name</label>
                        <input type="text" required="required"
                         id="firstname"
                         name="firstname" 
                         oninput="allowOnlyLetters(this)"
                         placeholder="Enter First Name"/>
                    </div>
                    <div class="user-input-box">
                        <label for="lastname">Last Name</label>
                        <input type="text" required="required"
                         id="lastname"
                         name="lasttname"
                         oninput="allowOnlyLetters(this)"
                         placeholder="Enter Last Name"/>
                    </div>
                        <div class="user-input-box">
                            <label for="username">Username</label>
                            <input type="text" required="required"
                            id="username"
                            name="username"
                            placeholder="Enter Username"/>
                        </div>
                        <div class="user-input-box">
                            <label for="password">Password</label>
                            <input type="password"  required="required"
                            id="password"
                            name="password"
                            maxlength="10"
                            placeholder="Enter Password"/>
                        </div>
                        <div class="user-input-box">
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" required="required"
                            id="confirmpassword"
                            name="confirmpassword"
                            placeholder="Confirm Password"/>
                        </div>    
                        <div class="user-input-box">
                            <label for="email">Email</label>
                            <input type="email" required="required"
                            id="email"
                            name="email"
                            placeholder="Enter Email"/>
                        </div>
                        <div class="user-input-box">
                            <label for="phonenumber">Phone Number</label>
                            <input type="number" required="required"
                            id="phonenumber"
                            name="phonenumber"
                            placeholder="Enter Phone Number"
                            maxlength="11"/>
                        </div>
                        <div class="user-input-box">
                            <label for="emergencyname">Emergency Contact Name</label>
                            <input type="text" required="required"
                            id="emergencyname"
                            name="emergencyname" 
                            oninput="allowOnlyLetters(this)"
                            placeholder="Enter Emergency Name"/>
                        </div>
                        <div class="user-input-box">
                            <label for="emergencynumber">Emergency Contact Number</label>
                            <input type="number" required="required"
                            id="emergencynumber"
                            name="emergencynumber"
                            placeholder="Emergency Contact Number"
                            maxlength="11"/>
                        </div>
                        <div class="user-input-box">
                            <label for="address">Address</label>
                            <input type="text" required="required"
                            id="address"
                            name="address"
                            placeholder="Enter Address"/>
                        </div>
                        <div class="user-input-box">
                            <label for="civilstatus">Civil Status</label>
                            <input type="text" required="required"
                            id="civilstatus"
                            name="civilstatus"
                            oninput="allowOnlyLetters(this)"
                            placeholder="Enter Civil Status"/>
                        </div>      
                        <div class="user-input-box">
                            <label for="nationality">Nationality</label>
                            <input type="text" required="required"
                            id="nationality"
                            name="nationality"
                            oninput="allowOnlyLetters(this)"
                            placeholder="Enter Nationality"/>
                        </div>
                        <div class="user-input-box">
                            <label for="birthday">Birthday</label>
                        <input type="date" 
                            id="birthday" 
                            name="birthday" 
                            required="required" 
                            placeholder="Select your birthday" />
                         </div>                                
                </div>
                <div class="gender-details-box">
                    <span class="gender-title">Gender</span>
                    <div class="gender-category">
                        <input type="radio" name="gender" id="male" value="Male" required>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="female" value="Female" required>
                        <label for="female">Female</label>
                        <input type="radio" name="gender" id="other" value="Other" required>
                        <label for="other">Other</label>
                    </div>
                </div>
                    <div class="submit-btn">
                        <input type="submit" value="Register" id="registerbtn">
                    </div>
                <div class="register-link">
                    <a href="login.php">Back</a></p>
                </div> 
            </form>
        </div>
        <script src="javascript/register.js"></script>
    </body>
</html>