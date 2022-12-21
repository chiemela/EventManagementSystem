<?php
// start session
session_start();
$cart_items_count = 0;
// get cart item
if(!empty($_SESSION["cart_items"])){
   $cart_items = $_SESSION["cart_items"];
   $cart_items = explode(",", $cart_items);
   array_pop($cart_items);
   $cart_items_count = count($cart_items);
}
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
   function console_log($e, $with_script_tags = true) {
      $js_code = 'console.log(' . json_encode($e, JSON_HEX_TAG) . ');';
      if ($with_script_tags) {
          $js_code = '<script>' . $js_code . '</script>';
      }
      echo $js_code;
  }
  console_log($e);
}
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Better Than At Home</title>
      
      <?php
         $page = "OTHER";
         include "./css_link_and_meta.php";
      ?>

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
                                          <h4>Chiemela N.</h4>
                                          <i><img src="images/te1.png" alt="#"/></i>
                                          <p>Better-Than-At-Home provided excellent service and professionalism at short notice to cater for a business lunch. Friendly and great food, with a wide selection to cater for different dietary requirements. Would be very happy to work with Better-Than-At-Home foods again,</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="test_box">
                                          <h4>Diogo P.</h4>
                                          <i><img src="images/te1.png" alt="#"/></i>
                                          <p> just wanted to say thank you for the lunch organised through Better-Than-At_Home Food; the sandwiches and wraps were perfectly fresh, drinks served refreshingly cold – all of which were delivered on time in full..The lunch was very well received by all – so thank you,</p>
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
                                          <h4>Muyiwa A.</h4>
                                          <i><img src="images/te1.png" alt="#"/></i>
                                          <p>Better-Than-At_Home deliver a super quality, reliable catering to fit any budget. Ordering is simple and the team ensure your event attendees go away happy that they’ve been well looked after. If you need a dependable caterer for any size event, I’d honestly look no further,</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="test_box">
                                          <h4>Mostafa M.</h4>
                                          <i><img src="images/te1.png" alt="#"/></i>
                                          <p>Better-Than-At_Home are a reliable catering company with fantastic service. They will always go above and beyond to try and accommodate our Lunch catering requirements, however obscure. The high quality of their food is also consistent across all orders,</p>
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
                                          <h4>Diogo P.</h4>
                                          <i><img src="images/te1.png" alt="#"/></i>
                                          <p> just wanted to say thank you for the lunch organised through Better-Than-At_Home Food; the sandwiches and wraps were perfectly fresh, drinks served refreshingly cold – all of which were delivered on time in full..The lunch was very well received by all – so thank you,</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="test_box">
                                          <h4>Mostafa M.</h4>
                                          <i><img src="images/te1.png" alt="#"/></i>
                                          <p>Better-Than-At_Home are a reliable catering company with fantastic service. They will always go above and beyond to try and accommodate our Lunch catering requirements, however obscure. The high quality of their food is also consistent across all orders,</p>
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

