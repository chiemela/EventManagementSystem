<?php
if ($page === "INDEX") {
    echo '
        <header>
        <!-- header inner -->
        <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                    <div class="center-desk">
                        <div class="logo">
                            <a href="index.php"><img src="images/logo2.png" alt="#" style="height:42px;"/></a>
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
                                <a class="nav-link" href="services.php">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact us</a>
                            </li>
                        </ul>';
                        // Check if the user is already logged in, if yes then display the Sign out button
                        if(isset($_SESSION["loggedin"])){
                            $first_name = $_SESSION["first_name"];
                            echo"
                                <a href='./booking.php'>
                                <div class='nav-link' style='margin-left:50px; margin-right:-50px; color:white;'>$first_name&nbsp;<i class='fa fa-shopping-cart' aria-hidden='true'></i></i><span class='badge badge-danger badge-counter'>".$cart_items_count."</span></div></a>
                                <div class='sign_btn'><a href='logout.php'>Logout&nbsp;<i class='fa fa-sign-out' aria-hidden='true'></i></a></div>
                            ";
                        } else {
                            echo"
                                <div class='sign_btn'><a href='./auth/sign-in.php'>Sign in</a></div>
                            ";
                        }echo'
                    </div>
                    </nav>
                </div>
            </div>
        </div>
        </div>
        </header>
    ';
} elseif ($page === "OTHER") {
    echo '
        <header>
            <!-- header inner -->
            <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="index.php"><img src="images/logo2.png" alt="#" style="height:42px;"/></a>
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
                                    <a class="nav-link" href="services.php" style="color: #fd7e14;">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php#about" style="color: #fd7e14;">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php#contact" style="color: #fd7e14;">Contact us</a>
                                </li>
                            </ul>';
                            try {
                                // Check if the user is already logged in, if yes then display the Sign out button
                                if(isset($_SESSION["loggedin"])){
                                    $first_name = $_SESSION["first_name"];
                                    echo"
                                    <a href='./booking.php'>
                                    <div class='nav-link' style='margin-left:50px; margin-right:-50px;'>$first_name&nbsp;<i class='fa fa-shopping-cart' aria-hidden='true'></i><span class='badge badge-danger badge-counter'>".$cart_items_count."</span></div></a>
                                    <div class='sign_btn'><a href='logout.php'>Logout&nbsp;<i class='fa fa-sign-out' aria-hidden='true'></i></a></div>
                                    ";
                                } else {
                                    echo"
                                    <div class='sign_btn'><a href='./auth/sign-in.php'>Sign in</a></div>
                                    ";
                                }
                            } catch (Exception $e) {
                                    // do nothing
                            }echo'
                        </div>
                        </nav>
                    </div>
                </div>
            </div>
            </div>
            <br><br>
            <hr class="nav-horizontal-line">
        </header>
    ';
} elseif ($page === "AUTH") {
    echo '
        <header>
            <!-- header inner -->
            <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="../index.php"><img src="../images/logo2.png" alt="#" style="padding:5px; height:42px;"/></a>
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
    ';
}
?>