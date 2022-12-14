<?php
// start session
session_start();
$cart_items_count = 3;
try {
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
   date_default_timezone_set("Europe/London");
   $today = date("F j, Y, g:i a")." local time"; // March 10, 2001, 5:16 pm
   
   $full_name ="";
   $email = "";
   $phone = "";
   $message = "";
   $name = "Mrs A. Cook";
   // Check if full_name is empty
   if(empty(trim($_POST["full_name"]))){
      $full_name_err = "Please enter your full name.";
   } else{
         $full_name = trim($_POST["full_name"]);
   }
   
   // Check if full_name is empty
   if(empty(trim($_POST["email"]))){
      $email_err = "Please enter an email.";
   } else{
         $email = trim($_POST["email"]);
   }
   
   // Check if phone is empty
   if(empty(trim($_POST["phone"]))){
      $phone_err = "Please enter a phone number.";
   } else{
         $phone = trim($_POST["phone"]);
   }
   
   // Check if full_name is empty
   if(empty(trim($_POST["message"]))){
      $message_err = "Please enter your message.";
   } else{
         $message = trim($_POST["message"]);
   }

   if(empty($full_name_err) || empty($email_err) || empty($phone_err) || empty($message_err) ){

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
                     Sender full name: '.$full_name.',
                     <br/>
                     Sender email: '.$email.',
                     <br/>
                     Sender phone number: '.$phone.',
                     <br/>
                     Send date: '.$today.',
                     <br/>
                     <br/>
                     Message body: '.$message.'.
                     <br/>
                  </tr>
            </table>
            <br/>
         </div>
      </body>
      </html>
      ';

      // To send HTML mail, the Content-type header must be set
      $toEmail = $email;
      $fromEmail = 'BetterThanAtHome@ase.uk';
      $name = 'Mrs A. Cook';
      $emailSubject = 'New email from your Better-Than-At-Home contant form';
      $headers = ['From' => $fromEmail, 'Reply-To' => $fromEmail, 'Content-type' => 'text/html; charset=iso-8859-1'];
      $bodyParagraphs = ["Name: {$name}", "Email: {$fromEmail}", "Message:", $message_body];
      $body = join(PHP_EOL, $bodyParagraphs);
      if (mail($toEmail, $emailSubject, $body, $headers)) {
         header("location: index.php#contact");
      }
   }
}
} catch (Exception $e) {
   // do nothing
}
?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Better Than At Home</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- favicon -->
      <link rel="icon" href="images/logo2.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <link href="css/sb-admin-2.css" rel="stylesheet">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- end loader -->
      <!-- header -->
      <?php
         $page = "INDEX";
         include "./header.php";
      ?>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="text-bg">
                     <div class="padding_lert">
                        <h1>WELCOME TO Better-Than-At-Home </h1>
                        <p>Get the best catering services for your weddings, birthdays, or luncheons</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- form_lebal -->
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <form class="form_book" style="padding-bottom: 90px;">
                  </form>
               </div>
            </div>
         </div>
      </section>
      <!-- end form_lebal -->
      <!-- choose  section -->
      <div class="choose">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="choose_box">
                     <div class="titlepage">
                        <h2><span class="text_norlam">Choose The Perfect</span> <br>Meal</h2>
                     </div>
                     <p>It's easy to assume that a vegan weight loss plan is restrictive, however there is no motive why a vegan dish can't be as pleasant as any other dish. Get inspired by our tasty vegan recipes, including plant-based dishes, meal ideas, desserts and drink recipes. Browse this vibrant series of vegan recipes for some culinary inspiration, whether or not you're planning for a quick lunch, birthday, wedding or sumptuous dinner dish.</p>
                     <a class="read_more" href="./services.php">See More</a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="img_box">
                           <figure><img src="./images/img5.jpg" alt="img5"/></figure>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="img_box">
                           <figure><img src="./images/img6.jpg" alt="img6"/></figure>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="img_box">
                           <figure><img src="./images/img7.jpg" alt="img7"/></figure>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end choose  section -->
      <!-- our  section -->
      <div class="our">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="img_box">
                     <figure><img src="./images/img4.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="our_box">
                     <div class="titlepage">
                        <h2><span class="text_norlam">Our Best Vegan </span> <br>Breakfast</h2>
                     </div>
                     <p>Our vegan breakfast is truly delicious and will satisfy even the most discerning palate. The oatmeal is creamy and hearty, with just the right amount of sweetness from the maple syrup and fresh berries. The scrambled tofu is expertly seasoned with herbs and spices, adding a savory element to the dish. The combination of flavors and textures is simply mouthwatering. Plus, you can enjoy this delicious meal knowing that it is completely plant-based and cruelty-free. It's the perfect way to start your day on a satisfying and healthy note. </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end our  section -->
      <!-- about -->
      <div id="about" class="about">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="about_text">
                     <div class="titlepage">
                        <h2>About Us</h2>
                        <p>Better-Than-At-Home is a small, family-owned business that specializes in catering delicious and beautifully presented meals for a variety of business and social occasions. Founded by a team of experienced chefs and event planners, we are dedicated to providing exceptional service and high-quality food that will impress your guests and make your event a success. Our menus are carefully curated to cater to a variety of dietary preferences, including vegan options. Whether you are planning a business luncheon, a wedding reception, or a banquet, we can provide the perfect spread of dishes to suit your needs. Contact us today to discuss your catering needs and let us help make your event a memorable one. </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="about_img">
                     <figure><img src="./images/img8.jpg" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      <!-- testimonial -->
      <div class="testimonial">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Testimonial</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div id="myCarousel" class="carousel slide testimonial_Carousel " data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container">
                              <div class="carousel-caption ">
                                 <div class="row">
                                    <div class="col-md-6 margin_boot">
                                       <div class="test_box">
                                          <h4>Mark jonson</h4>
                                          <i><img src="images/te1.png" alt="#"/></i>
                                          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="test_box">
                                          <h4>Mac Du</h4>
                                          <i><img src="images/te1.png" alt="#"/></i>
                                          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption">
                                 <div class="row">
                                    <div class="col-md-6 margin_boot">
                                       <div class="test_box">
                                          <h4>Mark jonson</h4>
                                          <i><img src="images/te1.png" alt="#"/></i>
                                          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="test_box">
                                          <h4>Mac Du</h4>
                                          <i><img src="images/te1.png" alt="#"/></i>
                                          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption">
                                 <div class="row">
                                    <div class="col-md-6 margin_boot">
                                       <div class="test_box">
                                          <h4>Mark jonson</h4>
                                          <i><img src="images/te1.png" alt="#"/></i>
                                          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="test_box">
                                          <h4>Mac Du</h4>
                                          <i><img src="images/te1.png" alt="#"/></i>
                                          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end testimonial -->
      <!--  footer -->
      <footer id="contact">
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="titlepage">
                        <h2>Contact Us</h2>
                     </div>
                     <div class="cont">
                        <h3>Reach out to our staff</h3>
                        <p>It usually takes five working days to respond to emails due to the high volume of emails we receive everyday.</p>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="request" class="main_form">
                        <div class="row">
                           <div class="col-md-12 ">
                              <?php
                                 if(!empty($full_name_err)){
                                       echo "
                                          <span style='color: pink;'>$full_name_err<span>
                                       ";
                                 }
                              ?>
                              <input class="contactus" placeholder="Full Name" type="type" name="full_name"> 
                           </div>
                           <div class="col-md-12">
                              <?php
                                 if(!empty($email_err)){
                                       echo "
                                          <span style='color: pink;'>$email_err<span>
                                       ";
                                 }
                              ?>
                              <input class="contactus" placeholder="Email" type="type" name="email"> 
                           </div>
                           <div class="col-md-12">
                              <?php
                                 if(!empty($phone_err)){
                                       echo "
                                          <span style='color: pink;'>$phone_err<span>
                                       ";
                                 }
                              ?>
                              <input class="contactus" placeholder="Phone Number" type="type" name="phone">                          
                           </div>
                           <div class="col-md-12">
                              <?php
                                 if(!empty($message_err)){
                                       echo "
                                          <span style='color: pink;'>$message_err<span>
                                       ";
                                 }
                              ?>
                              <textarea class="textarea" placeholder="Message" type="text" name="message">Message </textarea>
                           </div>
                           <div class="col-sm-12">
                              <button type="submit" class="send_btn">Send</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>Copyright 2022 Better Than At Home. All Right Reserved.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>

