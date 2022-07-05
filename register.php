<?php
include('head.php');
?>
<?php include ('functions.php'); ?>
<?php include('header.php'); ?>

<!-- Contact section start -->
<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Logo -->

                        <!-- Name -->
                        <h3>Create an account</h3>
                        <!-- Form start -->
                        <form action="register.php" method="post">
                            <?php echo display_error(); ?>
                            <div class="form-group">
                                <input type="text" name="username" class="input-text" placeholder="Mobile Number" value="<?php echo $username; ?>">
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="input-text" placeholder="Email Address" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_1" class="input-text" placeholder="Password" >
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_2" class="input-text" placeholder="Confirm Password">
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit"  name="register_btn" class="btn-md btn-block btn btn-color">Create Account</button>
                            </div>
                        </form>
                        <!-- Social List -->
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Already a member? <a href="login">Login here</a></span>
                    </div>
                </div>
                <!-- Form content box end -->

                <div>
                    <p>
                        <br>
                        <br><br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->
