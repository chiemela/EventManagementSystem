<?php
// start session
session_start();
// Include config file
require_once "../config.php";

// Check if the user is already logged in, if yes then redirect him to services page
if(isset($_SESSION["loggedin"])){
    header("location: ../services.php");
    exit;
}
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate first_name
    if(empty(trim($_POST["first_name"]))){
        $first_name_err = "Please enter your First name.";
    } else {
        $first_name = trim($_POST["first_name"]);
    }

    // Validate last_name
    if(empty(trim($_POST["last_name"]))){
        $last_name_err = "Please enter your Last name.";
    } else {
        $last_name = trim($_POST["last_name"]);
    }

    // Validate phone
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter a phone number.";
    } else {
        $phone = trim($_POST["phone"]);
    }

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later. $sql. " . mysqli_error($link);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate address
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter an address.";
    } else {
        $address = trim($_POST["address"]);
    }

    // Validate location
    if(empty(trim($_POST["location"]))){
        $location_err = "Please enter a location.";
    } else {
        $location = trim($_POST["location"]);
    }

    // Check input errors before inserting in database
    if(empty($first_name_err) && empty($last_name_err) && empty($phone_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($address_err) && empty($location_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (first_name, last_name, phone, email, password, address, location) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_first_name, $param_last_name, $param_phone, $param_email, $param_password, $param_address, $param_location);
            
            // Set parameters
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_phone = $phone;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_address = $address;
            $param_location = $location;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // If registration is successfull then Initialize the session
                session_start();
                $_SESSION["loggedin"] = "YES";
                $URL_redirect = "../services.php";
                // Redirect to service page
                header("location: $URL_redirect");
            } else{
                echo "Something went wrong. Please try again later. $sql. " . mysqli_error($link);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    } else {
        // Destroying session
        session_destroy();
    }
    
    // Close connection
    mysqli_close($link);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up | Better Than At Home</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- favicon -->
    <link rel="icon" href="../images/logo-white.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                    <div class="center-desk">
                        <div class="logo">
                            <a href="index.php"><img src="../images/logo-black.png" alt="#" style="padding: 5px;"/></a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../services.php" style="color: #fd7e14;">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php#about" style="color: #fd7e14;">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php#contact" style="color: #fd7e14;">Contact us</a>
                            </li>
                        </ul>
                        <div class="sign_btn"><a href="sign-in.php">Sign in</a></div>
                    </div>
                    </nav>
                </div>
            </div>
        </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="first_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <?php
                                    if(!empty($first_name_err)){
                                        echo "
                                            <span style='color: red;'>$first_name_err<span>
                                        ";
                                    }
                                ?>
                                <input type="text" name="first_name" id="name" placeholder="First Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="last_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <?php
                                    if(!empty($last_name_err)){
                                        echo "
                                            <span style='color: red;'>$last_name_err<span>
                                        ";
                                    }
                                ?>
                                <input type="text" name="last_name" id="name" placeholder="Last Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                                <?php
                                    if(!empty($phone_err)){
                                        echo "
                                            <span style='color: red;'>$phone_err<span>
                                        ";
                                    }
                                ?>
                                <input type="tel" name="phone" id="name" placeholder="phone" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <?php
                                    if(!empty($email_err)){
                                        echo "
                                            <span style='color: red;'>$email_err<span>
                                        ";
                                    }
                                ?>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <?php
                                    if(!empty($password_err)){
                                        echo "
                                            <span style='color: red;'>$password_err<span>
                                        ";
                                    }
                                ?>
                                <input type="password" name="password" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re_password"><i class="zmdi zmdi-lock-outline"></i></label>
                                <?php
                                    if(!empty($confirm_password_err)){
                                        echo "
                                            <span style='color: red;'>$confirm_password_err<span>
                                        ";
                                    }
                                ?>
                                <input type="password" name="confirm_password" id="re_pass" placeholder="Repeat your password" required/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-pin-drop material-icons-name"></i></label>
                                <?php
                                    if(!empty($address_err)){
                                        echo "
                                            <span style='color: red;'>$address_err<span>
                                        ";
                                    }
                                ?>
                                <input type="text" name="address" id="name" placeholder="Address" required/>
                            </div>
                            <div class="form-group">
                                <label for="location"><i class="zmdi zmdi-gps-dot material-icons-name"></i></label>
                                <?php
                                    if(!empty($location_err)){
                                        echo "
                                            <span style='color: red;'>$location_err<span>
                                        ";
                                    }
                                ?>
                                <input type="text" name="location" id="name" placeholder="Location" required/>
                            </div>
                            <div class="form-group">
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>By clicking Register you agree to all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="sign-in.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>
    

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
<footer>
    <p class="text-center" style="margin-top: -190px;">Copyright 2022 Better Than At Home. All Right Reserved.</p>
    <br/><br/>
</footer>
</html>