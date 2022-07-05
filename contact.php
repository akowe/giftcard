<?php

include('head.php');
include ('header.php');

?>

    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Contact Us</h1>
                <ul class="breadcrumbs">
                    <li><a href="index">Home</a></li>
                    <li class="active">Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub banner end -->
    <!-- Contact 1 start -->
    <div class="contact-1 content-area-7">
        <div class="container">
            <div class="main-title">
                <h1><span>We</span> are here</h1>
                <p>Leave us a feedback</p>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-7 col-md-7">


                    <?php
                    //Subscribe to Newsletter
                    if (isset($_POST['contact'])) {
                        $subject = "Feedback from WeTrader.com.ng";
                        $name = ($_POST['name']);
                        $email = ($_POST['email']);
                        $phone = ( $_POST['phone']);
                        $sub = ($_POST['subject']) ;
                        $msg = ( $_POST['message']);

                      //   $query = "INSERT INTO contact(name, email, phone, subject, message) VALUE('$name', '$email', '$phone', '$subject', '$msg')";
                        //reCAPTCHA validation

                        $to = "info@wetrader.com.ng";
                        $message = '
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Newsletter Subscriber</title></head>
<body>

<p><br> ' . $name . '  <br>
' . $email . '  <br>
' . $phone . '  <br>
' . $sub . '  <br>
' . $msg . '  

</p></body>
</html>';

                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= "From: WETrader" . "\r\n";

//echo $headers;
                        if (($email == "") || (filter_var($email, FILTER_VALIDATE_EMAIL) == false)) {
                            echo "
<script>alert('Please provide your a valid email.')</script>";
                        } else {
                            $message = mail($to, $subject, $message, $headers);
                            if ($message) {

                                echo "
<script>alert('Thank you for your time.')</script>";

                            }
                        }
                    }
                    ?>
                    <form action="" method="POST" name="contact" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group name">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group email">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group subject">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group number">
                                    <input type="number" name="phone" class="form-control" placeholder="Number" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group message">
                                    <textarea class="form-control" name="message" placeholder="Write message" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="send-btn">
                                    <div class="g-recaptcha"
                                         data-callback="capcha_filled"
                                         data-expired-callback="capcha_expired"
                                         data-sitekey="6Ldtf9UZAAAAABJ8SEdLn_JH_fNLYbonFgFPUgQg"></div>

                                    <br>
                                    <script>
                                        function capcha_filled () {
                                            allowSubmit = true;
                                        }
                                        function capcha_expired () {
                                            allowSubmit = false;
                                        }

                                        function check_if_capcha_is_filled (e) {
                                            if(allowSubmit) return true;
                                            e.preventDefault();
                                            alert('Fill in the capcha!');
                                        }
                                    </script>
                                    <button type="submit" name="contact" id="btnSubmit" onclick="check_if_capcha_is_filled()"  class="btn btn-color btn-md btn-message">Send Message</button>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <div class=" offset-lg-1 col-lg-4 offset-md-0 col-md-5">
                    <div class="contact-info">
                        <h3>Contact Info</h3>
                        <div class="media">
                            <i class="fa fa-map-marker"></i>
                            <div class="media-body">
                                <h5 class="mt-0">Office Address</h5>
                                <p>52, Tos Benson Road, Ebutte Ikorodu Lagos</p>
                            </div>
                        </div>
                        <div class="media">
                            <i class="fa fa-phone"></i>
                            <div class="media-body">
                                <h5 class="mt-0">Phone Number</h5>
                                <p>Mobile: <a href="tel:+2348120720152">08120720152</a> </p>

                            </div>
                        </div>
                        <div class="media mrg-btn-0">
                            <i class="fa fa-envelope"></i>
                            <div class="media-body">
                                <h5 class="mt-0">Email Address</h5>
                                <p><a href="#">info@wetrader.com.ng</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact 1 end -->


<?php include ('footer.php');
