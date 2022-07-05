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
                            <li class="breadcrumb-item active">Dashboard</li>
                            <!-- notification message -->

                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Google Trades
                                        (
                                        <?php
                                       global $db;
                                        $email= $_SESSION['user']['email'];

                                        $query = "SELECT COUNT(*) FROM google_card where email ='$email'";
                                        $result = $db->query($query);
                                        // Print out result
                                        while($row = $result->fetch_assoc()){
                                            echo  $row['COUNT(*)'];
                                        }
                                        ?>
                                        )
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="google-trades">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">Amazon Trades
                                        (
                                        <?php
                                        global $db;
                                        $email= $_SESSION['user']['email'];

                                        $query = "SELECT COUNT(*) FROM amazon_card where email ='$email'";
                                        $result = $db->query($query);
                                        // Print out result
                                        while($row = $result->fetch_assoc()){
                                            echo  $row['COUNT(*)'];
                                        }
                                        ?>
                                        )
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="amazon-trades">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Steam Trades
                                        (
                                        <?php
                                        global $db;
                                        $email= $_SESSION['user']['email'];

                                        $query = "SELECT COUNT(*) FROM steam_card where email ='$email'";
                                        $result = $db->query($query);
                                        // Print out result
                                        while($row = $result->fetch_assoc()){
                                            echo  $row['COUNT(*)'];
                                        }
                                        ?>
                                        )
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="steam-trades">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">iTunes Trades (
                                        <?php
                                        global $db;
                                        $email= $_SESSION['user']['email'];

                                        $query = "SELECT COUNT(*) FROM itunes_card where email ='$email'";
                                        $result = $db->query($query);
                                        // Print out result
                                        while($row = $result->fetch_assoc()){
                                            echo  $row['COUNT(*)'];
                                        }
                                        ?>
                                        )
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="itunes-trades">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                        </div><!--row-->

                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Ebay Trades
                                        (
                                        <?php
                                        global $db;
                                        $email= $_SESSION['user']['email'];

                                        $query = "SELECT COUNT(*) FROM ebay_card where email ='$email'";
                                        $result = $db->query($query);
                                        // Print out result
                                        while($row = $result->fetch_assoc()){
                                            echo  $row['COUNT(*)'];
                                        }
                                        ?>
                                        )
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="ebay-trades">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Nike Trades
                                        (
                                        <?php
                                        global $db;
                                        $email= $_SESSION['user']['email'];

                                        $query = "SELECT COUNT(*) FROM nike_card where email ='$email'";
                                        $result = $db->query($query);
                                        // Print out result
                                        while($row = $result->fetch_assoc()){
                                            echo  $row['COUNT(*)'];
                                        }
                                        ?>
                                        )
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="nike-trades">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Sephora Trades (
                                        <?php
                                        global $db;
                                        $email= $_SESSION['user']['email'];

                                        $query = "SELECT COUNT(*) FROM sephora_card where email ='$email'";
                                        $result = $db->query($query);
                                        // Print out result
                                        while($row = $result->fetch_assoc()){
                                            echo  $row['COUNT(*)'];
                                        }
                                        ?>
                                        )
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="sephora-trades">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                        </div><!--row-->

                        <!--chart-->
                        <p><br></p>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                       Trades
                                    </div>

                                    <div class="card-body">

                                        <canvas id="myBarChart" width="100%" height="40"></canvas>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Trades color
                                    </div>
                                    <div class="card-body">

                                        <canvas id="myPieChart" width="100%" height="40"></canvas></div>

                                </div>
                            </div>
                        </div>

                    </div>
                </main>
<?php
include('foot.php');
?>