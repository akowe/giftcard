<?php
include('../functions.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login');
}

?>
<?php
include('head.php');
include ('navbar.php');
?>

<?php
include ('sidebar.php');
?>

<?php
global $db;
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$errors   = array();
$email ="";
$phone ="";
$name ="";
$feedback="";
$status="";

if (isset($_POST["save"])) {
    $email  =   e($_POST['email']);
    $phone  =   e($_POST['phone']);
    $name  =   e($_POST['fname']);
    $feedback = e($_POST['feedback']);
    $status = e($_POST['status']);

        // Insert record
        $query = "INSERT INTO testimonial (email, phone, fname, feedback, status)
                    VALUES ('$email', '$phone', '$name', '$feedback', '$status')";
    $results = mysqli_query($db, $query);
    if ($results == 1) {

        $_SESSION['success']  = "You have successful send a feedback. Thank you for your time.";
    } else {
        array_push($errors, "Not sent");
    }

}
$db->close();
?>


    <!-- dashboard canvas here -->
    <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4" style="color:red;"> <?php if (isset($_SESSION['success'])) : ?>
                    <div class="error success" >
                        <h3>
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?> </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard >> Trade Feedback</li>
                <!-- notification message -->
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-reply mr-1"></i>
                   Send Us Your Trade Experience
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($message)) { echo $message; } ?>
                            <form method="post" name="" action="testimonial">
                                <?php echo display_error(); ?>
                                <label>Email</label>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['user'] ['email']; ?>" readonly>

                                </div>

                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="number" name="phone" class="form-control" value="<?php echo $_SESSION['user'] ['username']; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Your Name</label><i class="text-danger">*</i>
                                    <input type="text" name="fname" class="form-control"  placeholder="Name" required>
                                </div>

                                <div class="form-group">
                                    <label>Tell Us Your Trade Experience</label><i class="text-danger">*</i>
                                    <textarea type="text" name="feedback" class="form-control"  placeholder="Trade Experience" rows="3" required></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="status" class="form-control" value="Pending">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="save" value="Send Feedback" class="btn btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>
                    <!--form profile-->

                </div> <!--card-body-->
            </div>
        </div>
    </main>

<?php
include('foot.php');
?>