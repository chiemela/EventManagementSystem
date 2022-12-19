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
    
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($password_err) || empty($email_err) ){
        // Prepare a select statement
        $sql = "SELECT id, email, first_name, role, password FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $first_name, $role, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){                   
                            session_start();      
                            // Store data in session variables
                            $_SESSION["loggedin"] = "YES";
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["first_name"] = $first_name;
                            $_SESSION["logged_message"] = "Login Successful";
                            if(empty($role)){
                                $URL_redirect = "../services.php";
                            }else{
                                $_SESSION["role"] = $role;
                                $URL_redirect = "../admin/index.php";
                            }
                            
                            // Redirect user to welcome page
                            header("location: ".$URL_redirect);
                        } else{
                            // Display an error message if password is not valid
                            $login_credentials_err = "Incorrect Email or Password";
                        }
                    }
                } else{
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later. $sql. " . mysqli_error($link);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
} catch (Exception $e) {
    // do nothing
}
if(!empty($_SESSION["registration_success_messge"])){
    $sign_up_message = $_SESSION["registration_success_messge"];
    $_SESSION["registration_success_messge"] = "";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign in | Better Than At Home</title>
      
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

        <p class="text-center" style="color: #2EBB0B;">
            <?php 
                if(!empty($sign_up_message)){
                    echo $sign_up_message;
                }
            ?>
        </p>
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="sign-up.php" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <?php
                                    if(!empty($email_err)){
                                        echo "
                                            <span style='color: red;'>$email_err<span>
                                        ";
                                    } elseif (!empty($login_credentials_err)){
                                        echo "
                                            <span style='color: red;'>$login_credentials_err<span>
                                        ";
                                    }
                                ?>
                                <input type="email" name="email" id="email" placeholder="Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <?php
                                    if(!empty($password_err)){
                                        echo "
                                            <span style='color: red;'>$password_err<span>
                                        ";
                                    }
                                ?>
                                <input type="password" name="password" id="your_pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
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
    <p class="text-center" style="margin-top: -60px;">Copyright 2022 Better Than At Home. All Right Reserved.</p><br/><br/>
</footer>
</html>