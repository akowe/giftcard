<?php
include ('head.php');

?>


<?php
include('functions.php');
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])
&& ($_GET["action"]=="reset") && !isset($_POST["action"])){
$key = $_GET["key"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");
$query = mysqli_query($db,
    "SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';"
);
$row = mysqli_num_rows($query);
if ($row==""){
    $error .= '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link
from the email, or you have already used the key in which case it is 
deactivated.</p>
<p><a href="https://wetrader.com.ng/index">
Click here</a> to reset password.</p>';
}else{
$row = mysqli_fetch_assoc($query);
$expDate = $row['expDate'];
if ($expDate >= $curDate){
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


    <h2>Reset Password</h2>
    <p>Please fill out this form to reset your password.</p>


<form method="post" action="" name="update">
    <div class="form-group">
        <input type="hidden" name="action" value="update" class="form-control" />
    </div>

    <div class="form-group">
        <label><strong>Enter New Password:</strong></label><br />
        <input type="password" name="password_1" maxlength="15" required class="form-control" />
    </div>

    <div class="form-group">
        <label><strong>Re-Enter New Password:</strong></label><br />
        <input type="password" name="password_2" maxlength="15" required class="form-control"/>
    </div>

    <input type="hidden" name="email" value="<?php echo $email;?>"/>

    <div class="form-group">
        <input type="submit" value="Reset Password" class="btn-md btn-block btn btn-color" />
    </div>
</form>
<?php
}else{
    $error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which 
as valid only 24 hours (1 days after request).<br /><br /></p>";
}
}
if($error!=""){
    echo "<div class='error'>".$error."</div><br />";
}
} // isset email key validate end


if(isset($_POST["email"]) && isset($_POST["action"]) &&
    ($_POST["action"]=="update")){
    $error="";
    $password_1 = mysqli_real_escape_string($db,$_POST["password_1"]);
    $password_2 = mysqli_real_escape_string($db,$_POST["password_2"]);
    $email = $_POST["email"];
    $curDate = date("Y-m-d H:i:s");
    if ($password_1!=$password_2){
        $error.= "<p>Password do not match, both password should be same.<br /><br /></p>";
    }
    if($error!=""){
        echo "<div class='error'>".$error."</div><br />";
    }else{
        $password_1 = md5($password_1);


        $query = "UPDATE `users` SET password='$password_1' WHERE email='$email'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['success'] = "You have change your password";
            header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }


        mysqli_query($db,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");

        echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="https://wetrader.com.ng/login">Click here</a> to Login.</p></div><br />';

    }
}
?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>