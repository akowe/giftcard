

<!-- Footer start -->
<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Contact Us</h4>
                    <ul class="contact-info">
                        <li>
                          <i class="fa fa-map-marker"></i> 52, Tos Benson Road, Ebutte Ikorodu Lagos
                        </li>
                        <li>
                           <i class="fa fa-envelope"></i> <a href="mailto:info@mycardxchange.com.ng">info@wetrader.com.ng</a>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i> <a href="tel:+2348120720152">08120720152
                            </a>
                        </li>
                        <l>   <a href="https://api.whatsapp.com/send?phone=+2348120720152&text=i%20want%20to%20trade" title="Direct Message"><i class="fa fa-whatsapp font-weight-bolder"></i>WhatsApp</a>
                        </l>

                    </ul>
                    <ul class="social-list clearfix">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Useful Links</h4>
                    <ul class="links">
                        <li>
                            <a href="about"><i class="fa fa-angle-right"></i>About us</a>
                        </li>


                        <li>
                            <a href="products"><i class="fa fa-angle-right"></i>Products</a>
                        </li>


                        <li>
                            <a href="client-area/testimonial"><i class="fa fa-angle-right"></i>Post Your Trade Experience</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>FAQ</a>
                        </li>
                        
                          <li>
                            <a href="privacy"><i class="fa fa-angle-right"></i>Privacy Policy</a>
                        </li>



                        <li>
                            <a href="contact"><i class="fa fa-angle-right"></i>Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Subscribe</h4>
                    <div class="Subscribe-box">
                        <p>Get Our Latest News</p>


                        <?php
                        //Subscribe to Newsletter
                        if (isset($_POST['newsletter'])) {
                            $subject = "Add me to your email list";
                            $news = $_POST['news'];
                            $to = "info@wetrader.com.ng";
                            $message = '
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Newsletter Subscriber</title></head>
<body>

<p><br> ' . $news . '  <br></p></body>
</html>';

                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            $headers .= "From: WETrader" . "\r\n";

//echo $headers;
                            if (($news == "") || (filter_var($news, FILTER_VALIDATE_EMAIL) == false)) {
                                echo "
<script>alert('Please provide your a valid email.')</script>";
                            } else {
                                $message = mail($to, $subject, $message, $headers);
                                if ($message) {

                                    echo "
<script>alert('Successfully to our Newsletter.')</script>";

                                }
                            }
                        }
                        ?>
                        <form action="" method="post" name="newsletter">
                            <p>
                                <input type="text" class="form-contact" name="news" placeholder="Enter Address">
                            </p>
                            <p>
                                <button type="submit" name="newsletter" class="btn btn-block btn-color cursor">
                                    Subscribe
                                </button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <p class="copy">&copy;  <script data-cfasync="false" src=""></script><script>document.write(new Date().getFullYear());</script> WeTrader</p>
            </div>
        </div>
    </div>

</footer>
<!-- Footer end -->

<!-- External JS libraries -->
<script src="assets/js/jquery-2.2.0.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.selectBox.js"></script>
<script src="assets/js/rangeslider.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.filterizr.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/backstretch.js"></script>
<script src="assets/js/jquery.countdown.js"></script>
<!--<script src="assets/js/jquery.scrollUp.js"></script>-->
<script src="assets/js/particles.min.js"></script>
<script src="assets/js/typed.min.js"></script>
<script src="assets/js/jquery.mb.YTPlayer.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/js/ie-emulation-modes-warning.js"></script>
<script  src="assets/js/app.js"></script>
<script type="text/javascript">

    // Counter Activation
    function isCounterElementVisible($elementToBeChecked)
    {
        var TopView = $(window).scrollTop();
        var BotView = TopView + $(window).height();
        var TopElement = $elementToBeChecked.offset().top;
        var BotElement = TopElement + $elementToBeChecked.height();
        return ((BotElement <= BotView) && (TopElement >= TopView));
    }
    $(window).on('scroll', function () {
        $( ".counter" ).each(function() {
            var isOnView = isCounterElementVisible($(this));
            if(isOnView && !$(this).hasClass('Starting')){
                $(this).addClass('Starting');
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 3000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            }
        });
    });

</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5e26f8348e78b86ed8aa5c01/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->