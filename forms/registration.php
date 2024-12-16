<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Sign up</title>

    <!-- CSS -->
    <link href="../css/jquery-ui.min.css" rel="stylesheet" >
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/regis.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <!-- cdn icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    

    
	
	<style>
            body{
                background-image:url(../images/bgregis.jpg) ;
            }
    </style>
</head>

<body>
    <h1>Registration Form</h1>
    <p>Please fill out this form with the necessary information</p>
    <div id="error"></div>
    <form id="signupformValidation" action="../system/dao/addaccount.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <label for="username">Username:</label>
                    <div class="input-group">
                        <input type="text" id="username" name="username" placeholder="Enter Username" />
						<span></span> 
                        <i class="bi bi-person"></i>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <label for="password">Password:</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Enter Password" />
						<span></span>
                        <i class="bi bi-lock"></i>
                    </div>
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <label for="confirmpassword">Confirm Password:</label>
                    <div class="input-group">
                        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" />
						<span></span>
                        <i class="bi bi-lock-fill"></i>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <label for="firstName">First name:</label>
                    <div class="input-group">
                        <input type="text" id="firstname" name="firstname" placeholder="Enter First Name" />
						<span></span>
                        <i class="bi bi-person-badge"></i>
                    </div>
                </div>
				
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="middleName">Middle name (Optional):</label>
                    <div class="input-group">
                        <input type="text" id="middlename" name="middlename" placeholder="Enter Middle Name" />
						<span></span>
                        <i class="bi bi-person-lines-fill"></i>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <label for="lastName">Last name:</label>
                    <div class="input-group">
                        <input type="text" id="lastname" name="lastname" placeholder="Enter Last Name" />
						<span></span>
                        <i class="bi bi-person-video"></i>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="address">Complete Address:</label>
                    <div class="input-group">
                        <input type="text" id="address" name="address" placeholder="Enter Address" />
						<span></span>
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <label for="mobile">Mobile no.:</label>
                    <div class="input-group">
                        <input type="text" id="mobile" name="mobilenumber" placeholder="Enter mobile number" />
                        <i class="bi bi-telephone"></i>
						<span></span>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="birthdate">Birthdate:</label>
                    <div class="input-group">
                        <input type="text" id="birthdate" name="birthday" placeholder="MM-DD-YYYY" />
						<span></span>
                        <i class="bi bi-calendar"></i>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" id="role" name="role" />
                </div>
            </div>

            <input type="submit" value="Submit" name='insert'/>
            <p class="text-center">Already have an account? <a href="../forms/login.php">Log in
                    here</a></p>
        </div>
    </form>
    <!-- scripts -->
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/createAccvalidation.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/date.js"></script>
    

    
</body>
</html>