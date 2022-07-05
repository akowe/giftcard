<?php
include('../functions.php');

if (!isAdmin()) {
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
                <li class="breadcrumb-item active">Dasboard >>Profile</li>
                <!-- notification message -->
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                  Profile
                </div>
                <div class="card-body">

                   <div class="row">
                       <div class="col-lg-12">


                           <?php if(isset($message)) { echo $message; } ?>
                           <form method="post" name="" action="profile">
                               <div class="form-group">
                                   <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['user'] ['email']; ?>" readonly>

                               </div>

                               <div class="form-group">
                                   <input type="number" name="phone" class="form-control" value="<?php
                                   global $db;
                                   $email= $_SESSION['user'] ['email'];
                                   $query = "SELECT username FROM users where email='$email'";
                                   $results = mysqli_query($db,$query);
                                   while ($row = mysqli_fetch_assoc($results)) {
                                       echo $row['username'];
                                   }
                                   ?>" readonly>
                               </div>

                               <div class="form-group">
                                   <input type="hidden" name="currentPassword" class="form-control"  placeholder="Enter Old Password">
                               </div>

                               <div class="form-group">
                                   <input type="hidden" name="newPassword" class="form-control"  placeholder="Enter New Password">
                               </div>

                               <div class="form-group">
                                   <input type="hidden" name="confirmPassword" class="form-control"  placeholder="Confirm New Password">
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