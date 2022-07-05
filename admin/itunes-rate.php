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

            <h1 class="mt-4" style="color:red;"> <?php if (isset($_SESSION['success_user'])) : ?>
                    <div class="error success" >
                        <h3>
                            <?php
                            echo $_SESSION['success_user'];
                            unset($_SESSION['success_user']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?> </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard/Add rates</li>
                <!-- notification message -->
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-users mr-1"></i>
                    Add New  Itunes rates
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">

                            <?php
                            // connect to database
                            global $db;
                            // variable declaration
                            $d100 = "";
                            $d50    = "";
                            $d25    = "";
                            $errors   = array();

                            // call the register() function if register_btn is clicked
                            if (isset($_POST['rate_btn'])) {
                                global $db, $errors;
                                // receive all input values from the form
                                $d100 = e($_POST['d100']);
                                $d50 = e($_POST['d50']);
                                $d25 = e($_POST['d25']);
                                $query = "UPDATE `itunes_rates` SET dollar_100 = '$d100', dollar_50 = '$d50', dollar_25 = '$d25' ";
                                $results = mysqli_query($db, $query);
                                if ($results == 1) {
                                    echo "<script>alert('Itunes Dollar rate Updated')</script>";
                                } else {
                                    array_push($errors, "Not Updated");
                                }

                            }

                            ?>
                            <form method="post" action="">
                                <?php echo display_error(); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control"   name="d100" value="<?php echo $d100; ?>" placeholder="$100 card">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control"   name="d50" value="<?php echo $d50; ?>" placeholder="$50 card">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control"   name="d25" value="<?php echo $d25; ?>" placeholder="$50 card">
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit"  name="rate_btn" class="btn bg-primary text-white">Update Dollar Rate</button>
                                </div>
                            </form>

                            <?php
                            global $db;
                            $query = "SELECT dollar_100, dollar_50, dollar_25 from itunes_rates";
                            $results = mysqli_query($db, $query);
                            if($results->num_rows > 0) {
                                echo "<br>
                             No of records : ".$results->num_rows."<br>";
                                while ($row = $results->fetch_assoc()) {
                                    echo "<i class='fa fa-check'></i> $100 now: $row[dollar_100] 
                                <br><i class='fa fa-check'></i> $50 now:   $row[dollar_50] 
                                <br> <i class='fa fa-check'></i> $25 now : $row[dollar_25]";
                                }
                            }
                            ?>
                        </div>

                        <!--UPDATE POUNDS-->
                        <div class="col-lg-4">

                            <?php
                            // connect to database
                            global $db;
                            // variable declaration
                            $d100 = "";
                            $d50    = "";
                            $d25    = "";
                            $errors   = array();

                            // call the register() function if register_btn is clicked
                            if (isset($_POST['pounds_rate_btn'])) {
                                global $db, $errors;
                                // receive all input values from the form
                                $d100 = e($_POST['d100']);
                                $d50 = e($_POST['d50']);
                                $d25 = e($_POST['d25']);
                                $query = "UPDATE `itunes_pounds_rates` SET pounds_100 = '$d100', pounds_50 = '$d50', pounds_25 = '$d25' ";
                                $results = mysqli_query($db, $query);
                                if ($results == 1) {
                                    echo "<script>alert('Itunes Pounds rate Updated')</script>";
                                } else {
                                    array_push($errors, "Not Updated");
                                }

                            }

                            ?>
                            <form method="post" action="">
                                <?php echo display_error(); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control"   name="d100" value="<?php echo $d100; ?>" placeholder="&pound; 100 card">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control"   name="d50" value="<?php echo $d50; ?>" placeholder="&pound; 50 card">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control"   name="d25" value="<?php echo $d25; ?>" placeholder="&pound; 50 card">
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit"  name="pounds_rate_btn" class="btn bg-primary text-white">Update Pounds Rate</button>
                                </div>
                            </form>

                            <?php
                            global $db;
                            $query = "SELECT pounds_100, pounds_50, pounds_25 from itunes_pounds_rates";
                            $results = mysqli_query($db, $query);
                            if($results->num_rows > 0) {
                                echo "<br>
                             No of records : ".$results->num_rows."<br>";
                                while ($row = $results->fetch_assoc()) {
                                    echo "<i class='fa fa-check'></i> &pound;100 now: $row[pounds_100] 
                                <br><i class='fa fa-check'></i> &pound; 50 now:   $row[pounds_50] 
                                <br> <i class='fa fa-check'></i> &pound; 25 now : $row[pounds_25]";
                                }
                            }
                            ?>
                        </div> <!--POUNDS RATE-->

                        <div class="col-lg-4">

                            <?php
                            // connect to database
                            global $db;
                            // variable declaration
                            $d100 = "";
                            $d50    = "";
                            $d25    = "";
                            $errors   = array();

                            // call the register() function if register_btn is clicked
                            if (isset($_POST['euro_rate_btn'])) {
                                global $db, $errors;
                                // receive all input values from the form
                                $d100 = e($_POST['d100']);
                                $d50 = e($_POST['d50']);
                                $d25 = e($_POST['d25']);
                                $query = "UPDATE `itunes_euro_rates` SET euro_100 = '$d100', euro_50 = '$d50', euro_25 = '$d25' ";
                                $results = mysqli_query($db, $query);
                                if ($results == 1) {
                                    echo "<script>alert('Itunes Euro rate Updated')</script>";
                                } else {
                                    array_push($errors, "Not Updated");
                                }

                            }

                            ?>
                            <form method="post" action="">
                                <?php echo display_error(); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control"   name="d100" value="<?php echo $d100; ?>" placeholder="&euro; 100 card">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control"   name="d50" value="<?php echo $d50; ?>" placeholder="&euro; 50 card">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control"   name="d25" value="<?php echo $d25; ?>" placeholder="&euro; 50 card">
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit"  name="euro_rate_btn" class="btn bg-primary text-white">Update Euro Rate</button>
                                </div>
                            </form>

                            <?php
                            global $db;
                            $query = "SELECT euro_100, euro_50, euro_25 from itunes_euro_rates";
                            $results = mysqli_query($db, $query);
                            if($results->num_rows > 0) {
                                echo "<br>
                             No of records : ".$results->num_rows."<br>";
                                while ($row = $results->fetch_assoc()) {
                                    echo "<i class='fa fa-check'></i> &euro;100 now: $row[euro_100] 
                                <br><i class='fa fa-check'></i> &euro; 50 now:   $row[euro_50] 
                                <br> <i class='fa fa-check'></i> &euro; 25 now : $row[euro_25]";
                                }
                            }
                            ?>
                        </div>

                    </div><!--row-->

                </div><!--body-card-->
            </div>
    </main>


<?php
include('foot.php');
?>