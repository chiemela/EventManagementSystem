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
try {
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
                // send confirmation email
                date_default_timezone_set("Europe/London");
                $today = date("F j, Y, g:i a")." local time"; // format is March 10, 2001, 5:16 pm
                // Subject
                $emailSubject = 'Event Management System';
                // Message
                $message_body = '
                <html>
                <head>
                <title>Message body | Event Management System</title>
                </head>
                <body>
                    <div id = "container">
                        <br/>
                        <table>
                            <tr>
                                Hi '.$first_name.',
                                <br/>
                                <br/>
                                Your registration was successful. Please find below your login details.
                                <br/>
                                Email: '.$email.'
                                <br/>
                                Password: '.$password.'
                                <br/>
                                Registration date: '.$today.'
                                <br/>
                                Login URL: https://eliamtechnologies.com/event-management-system/auth/sign-in.php.
                                <br/>
                                <br/>
                                Regairds,
                                <br/>
                                Mrs A. Cook
                                <br/>
                                Owner
                            </tr>
                        </table>
                        <br/>
                    </div>
                </body>
                </html>
                ';
                // prepare the variables for the mail() funtion
                $toEmail = $email;
                $fromEmail = 'BetterThanAtHome@ASE_CW1.com';
                $name = 'Mrs A. Cook';
                $emailSubject = 'New user registration on Better-Than-At-Home';
                $headers = ['From' => $fromEmail, 'Reply-To' => $fromEmail, 'Content-type' => 'text/html; charset=iso-8859-1'];
                $bodyParagraphs = ["Name: {$name}", "Email: {$fromEmail}", "Message:", $message_body];
                $body = join(PHP_EOL, $bodyParagraphs);
                mail($toEmail, $emailSubject, $body, $headers);
                $URL_redirect = "./sign-in.php";
                $_SESSION["registration_success_messge"] = "Registration Successful. Please Sign in.";
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
} catch (Exception $e) {
    // do nothing
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up | Better Than At Home</title>
      
      <?php
         $page = "OTHER";
         include "./css_link_and_meta.php";
      ?>

</head>
<body>

    <!-- header -->
    <?php
        $page = "AUTH";
        include "../header.php";
    ?>
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