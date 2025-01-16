<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="../css/log-in-style.css">
        <link rel="stylesheet" href="../css/validationlogin.css">
        <style>
            body{
                background: url(../images/background.png);
            }
            
        </style>
    </head>
    <body>
        <main>
            <div class="box">
                <div class="inner-box">
                    <div class="forms-wrap">
                        <form action="../system/dao/sessionstart.php" method="post">
                            <div class="logo">
                                <img src="../images/homelogo.png"/>
                                <h4><a style="color: #e91d30;">Tail</a>Treats</h4>
                            </div>

                            <div class="heading">
                                <h2>Welcome Back</h2>
                                <h6>Not registered yet?</h6>
                                <a href="../forms/registration.php" class="toggle">Sign up</a>
                            </div>

                            <div class="actual-form">
                                <div class="input-wrap">
                                    <input 
                                    type="text"
                                    class="input-field"
                                    name="username"
                                    minlength="4"
                                    placeholder=""
                                    required>
                                    <label>Username</label>
                                </div>

                                <div class="input-wrap">
                                    <input 
                                    type="password" 
                                    class="input-field" 
                                    name="password"
                                    minlength="8"
                                    placeholder=""
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&+=]).{8,}"
                                    title="Password must be 8-20 characters long, include at least one uppercase letter, one lowercase letter, one number, and one special character."
                                    required>
                                    <label>Password</label>
                                </div>
                                

                                <div class="">
                                    <input type="hidden" class="" name="role">
                                </div>

                                <input type="submit" value="Sign In" class="sign-btn" name="insert" />
                                
                                <p class="text">
                                    Forgotten your password? <br>
                                    <a href="">Change Password</a>
                                </p>
                            </div>
                        </form>
                    </div>

                    <div class="carousel">
                        <div class="images-wrapper">
                            <img src="../images/image1.png" class="image img-1 show" alt="" />
                            <img src="../images/image2.png" class="image img-2" alt="" />
                            <img src="../images/image3.png" class="image img-3" alt="" />
                        </div>

                        <div class="text-slider">
                            <div class="text-wrap">
                                <div class="text-group">

                                </div>
                            </div>

                            <div class="bullets">
                                <span class="active" data-value="1"></span>
                                <span data-value="2"></span>
                                <span data-value="3"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Javascript file -->

        <script src="../js/app.js"></script>
    </body>
</html>
