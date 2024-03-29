<?php
include ('head.php');
?>
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
        <h3>Forgot Password?</h3>

        <?php
    include('functions.php');
    global $db;
    if(isset($_POST["email"]) && (!empty($_POST["email"]))){
        $email = $_POST["email"];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $error .="<p>Invalid email address please type a valid email address!</p>";
        }else{
            $sel_query = "SELECT * FROM `users` WHERE email='".$email."'";
            $results = mysqli_query($db,$sel_query);
            $row = $results;
            if ($row==""){
                $error .= "<p>No user is registered with this email address!</p>";
            }
        }
        if($error!=""){
            echo "<div class='error'>".$error."</div>
	<br /><a href='javascript:history.go(-1)'>Go Back</a>";
        }else{
            $expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
            $expDate = date("Y-m-d H:i:s",$expFormat);
            $key = md5(2418*2+$email);
            $addKey = substr(md5(uniqid(rand(),1)),3,10);
            $key = $key . $addKey;
// Insert Temp Table
            mysqli_query($db,
                "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

            $output='<p>Dear user,</p>';
            $output.='<p>Please click on the following link to reset your password.</p>';
            $output.='<p>-------------------------------------------------------------</p>';
            $output.='<p><a href="https://wetrader.com.ng/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">https://www.wetrader.com.ng/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';
            $output.='<p>-------------------------------------------------------------</p>';
            $output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
            $output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';
            $output.='<p>Thanks,</p>';
            $output.='<p>WeTrader</p>';
            $output.='<p>Visit: <a href="https://www.wetrader.com.ng/"><strong>wetrader.com.ng</strong></a></p>';
            $body = $output;
            $subject = "Password Recovery - WeTrader";

            $email_to = $email;
            $fromserver = "noreply@wetrader.com.ng";
            require("PHPMailer/PHPMailerAutoload.php");
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Host = "ssl://mail.wetrader.com.ng"; // Enter your host here
            $mail->SMTPAuth = true;
            $mail->Username = "info@wetrader.com.ng"; // Enter your email here
            $mail->Password = "Passme@123"; //Enter your passwrod here
            $mail->Port = 465;
            $mail->IsHTML(true);
            $mail->From = "noreply@wetrader.com.ng";
            $mail->FromName = "WeTrader";
            $mail->Sender = $fromserver; // indicates ReturnPath header
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($email_to);
            if(!$mail->Send()){
                echo "Mailer Error: " . $mail->ErrorInfo;
            }else{
                echo "<div class='error'>
<p>An email has been sent to you with instructions on how to reset your password.</p>
</div><br /><br /><br />";
            }

        }

    }else{
        ?>
        <form method="post" action="" name="reset">
            <div class="form-group">
            <label><strong>Enter Your Email Address:</strong></label>
            <input type="email" name="email" placeholder="example@mail.com"  class="form-control"/>
            </div>

            <div class="form-group mb-0">
            <input type="submit" value="Reset Password" class="btn-md btn-block btn btn-color"/>
            </div>
        </form>
    <?php } ?>
        <!-- Footer -->
        <div class="footer">
            <span>Already a member? <a href="login">Login here</a></span>
        </div>
</div>
    </div>
    </div>
    </div>
    </div>
    </div>


