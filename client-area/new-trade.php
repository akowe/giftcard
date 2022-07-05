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
                <li class="breadcrumb-item active">Start A Trade</li>
                <!-- notification message -->

            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Select A Card
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <div class="pricing-2">
                                <div class="title dolar">Google</div>
                                <div class="price-for-user">
                                    <img src="assets/images/shop/google.png" width="150" height="150">
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>25 Dollar
                                            <?php
                                            global $db;
                                            $query = "SELECT dollar_25 from google_rates";
                                            $results = mysqli_query($db, $query);
                                            if($results->num_rows > 0) {
                                                while ($row = $results->fetch_assoc()) {
                                                    echo "$row[dollar_25]";
                                                }
                                            }
                                            ?>
                                        </li>
                                        <li>50 Dollar
                                            <?php
                                            global $db;
                                            $query = "SELECT dollar_50 from google_rates";
                                            $results = mysqli_query($db, $query);
                                            if($results->num_rows > 0) {
                                                while ($row = $results->fetch_assoc()) {
                                                    echo "$row[dollar_50]";
                                                }
                                            }
                                            ?>
                                        </li>
                                        <li>100 Dollar
                                            <?php
                                            global $db;
                                            $query = "SELECT dollar_100 from google_rates";
                                            $results = mysqli_query($db, $query);
                                            if($results->num_rows > 0) {
                                                while ($row = $results->fetch_assoc()) {
                                                    echo "$row[dollar_100]";
                                                }
                                            }
                                            ?>
                                        </li>

                                    </ul>
                                </div>
                                <div class="button"><a href="google-card" class="btn btn-sm btn-primary">Trade Google</a></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 ">
                            <div class="pricing-2">
                                <div class="title">Amazon</div>
                                <div class="price-for-user">
                                    <img src="assets/images/shop/amazon.png" width="150" height="150">
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>25 Dollar
                                            <?php
                                            global $db;
                                            $query = "SELECT dollar_25 from amazon_rates";
                                            $results = mysqli_query($db, $query);
                                            if($results->num_rows > 0) {
                                                while ($row = $results->fetch_assoc()) {
                                                    echo "$row[dollar_25]";
                                                }
                                            }
                                            ?>
                                        </li>
                                        <li>50 Dollar
                                            <?php
                                            global $db;
                                            $query = "SELECT dollar_50 from amazon_rates";
                                            $results = mysqli_query($db, $query);
                                            if($results->num_rows > 0) {
                                                while ($row = $results->fetch_assoc()) {
                                                    echo "$row[dollar_50]";
                                                }
                                            }
                                            ?>
                                        </li>
                                        <li>100 Dollar
                                            <?php
                                            global $db;
                                            $query = "SELECT dollar_100 from amazon_rates";
                                            $results = mysqli_query($db, $query);
                                            if($results->num_rows > 0) {

                                                while ($row = $results->fetch_assoc()) {
                                                    echo "$row[dollar_100]";
                                                }
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="button"><a href="amazon-card" class="btn btn-sm btn-outline-primary">Trade Amazon</a></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <div class="pricing-2">
                                <div class="title">Steam</div>
                                <div class="price-for-user">
                                    <img src="assets/images/shop/steam.png" width="150" height="150">
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>25 Dollar
                                            <?php
                                            global $db;
                                            $query = "SELECT dollar_25 from steam_rates";
                                            $results = mysqli_query($db, $query);
                                            if($results->num_rows > 0) {
                                                while ($row = $results->fetch_assoc()) {
                                                    echo "$row[dollar_25]";
                                                }
                                            }
                                            ?>
                                        </li>
                                        <li>50 Dollar
                                            <?php
                                            global $db;
                                            $query = "SELECT dollar_50 from steam_rates";
                                            $results = mysqli_query($db, $query);
                                            if($results->num_rows > 0) {
                                                while ($row = $results->fetch_assoc()) {
                                                    echo "$row[dollar_50]";
                                                }
                                            }
                                            ?>
                                        </li>
                                        <li>100 Dollar
                                            <?php
                                            global $db;
                                            $query = "SELECT dollar_100 from steam_rates";
                                            $results = mysqli_query($db, $query);
                                            if($results->num_rows > 0) {
                                                while ($row = $results->fetch_assoc()) {
                                                    echo "$row[dollar_100]";
                                                }
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="button"><a href="steam-card" class="btn btn-border btn-sm btn-primary">Trade Steam</a></div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <div class="pricing-2">
                                <div class="title">iTunes</div>
                                <div class="price-for-user">
                                    <img src="assets/images/shop/itunes.png" width="150" height="150">
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>25 Dollar
                                            <?php
                                            global $db;
                                            $query = "SELECT dollar_25 from itunes_rates";
                                            $results = mysqli_query($db, $query);
                                            if($results->num_rows > 0) {
                                                while ($row = $results->fetch_assoc()) {
                                                    echo "$row[dollar_25]";
                                                }
                                            }
                                            ?>
                                        </li>
                                        <li>50 Dollar
                                            <?php
                                            global $db;
                                            $query = "SELECT dollar_50 from itunes_rates";
                                            $results = mysqli_query($db, $query);
                                            if($results->num_rows > 0) {
                                                while ($row = $results->fetch_assoc()) {
                                                    echo "$row[dollar_50]";
                                                }
                                            }
                                            ?>
                                        </li>
                                        <li>100 Dollar
                                            <?php
                                            global $db;
                                            $query = "SELECT dollar_100 from itunes_rates";
                                            $results = mysqli_query($db, $query);
                                            if($results->num_rows > 0) {
                                                while ($row = $results->fetch_assoc()) {
                                                    echo "$row[dollar_100]";
                                                }
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="button"><a href="itunes-card" class="btn btn-sm btn-color btn-outline-primary">Trade iTunes</a></div>
                            </div>
                        </div>
                    </div><!-- row for select card--->


                    <!-- Price row 2-->
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-12">
                                <div class="pricing-2">
                                    <div class="title dolar">Ebay</div>
                                    <div class="price-for-user">
                                        <img src="assets/images/shop/ebay.png" width="150" height="150">
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>25 Dollar
                                                <?php
                                                global $db;
                                                $query = "SELECT dollar_25 from ebay_rates";
                                                $results = mysqli_query($db, $query);
                                                if($results->num_rows > 0) {
                                                    while ($row = $results->fetch_assoc()) {
                                                        echo "$row[dollar_25]";
                                                    }
                                                }
                                                ?>
                                            </li>
                                            <li>50 Dollar
                                                <?php
                                                global $db;
                                                $query = "SELECT dollar_50 from ebay_rates";
                                                $results = mysqli_query($db, $query);
                                                if($results->num_rows > 0) {
                                                    while ($row = $results->fetch_assoc()) {
                                                        echo "$row[dollar_50]";
                                                    }
                                                }
                                                ?>
                                            </li>
                                            <li>100 Dollar
                                                <?php
                                                global $db;
                                                $query = "SELECT dollar_100 from ebay_rates";
                                                $results = mysqli_query($db, $query);
                                                if($results->num_rows > 0) {
                                                    while ($row = $results->fetch_assoc()) {
                                                        echo "$row[dollar_100]";
                                                    }
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="button"><a href="ebay-card" class="btn btn-border btn-sm btn-outline-primary">Trade Ebay</a></div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 ">
                                <div class="pricing-2">
                                    <div class="title">Nike</div>
                                    <div class="price-for-user">
                                        <img src="assets/images/shop/nike.png" width="150" height="150">
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>25 Dollar
                                                <?php
                                                global $db;
                                                $query = "SELECT dollar_25 from nike_rates";
                                                $results = mysqli_query($db, $query);
                                                if($results->num_rows > 0) {
                                                    while ($row = $results->fetch_assoc()) {
                                                        echo "$row[dollar_25]";
                                                    }
                                                }
                                                ?>
                                            </li>
                                            <li>50 Dollar
                                                <?php
                                                global $db;
                                                $query = "SELECT dollar_50 from nike_rates";
                                                $results = mysqli_query($db, $query);
                                                if($results->num_rows > 0) {
                                                    while ($row = $results->fetch_assoc()) {
                                                        echo "$row[dollar_50]";
                                                    }
                                                }
                                                ?>
                                            </li>
                                            <li>100 Dollar
                                                <?php
                                                global $db;
                                                $query = "SELECT dollar_100 from nike_rates";
                                                $results = mysqli_query($db, $query);
                                                if($results->num_rows > 0) {
                                                    while ($row = $results->fetch_assoc()) {
                                                        echo "$row[dollar_100]";
                                                    }
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="button"><a href="nike-card" class="btn btn-sm btn-color btn-primary">Trade Nike</a></div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12">
                                <div class="pricing-2">
                                    <div class="title">Sephora</div>
                                    <div class="price-for-user">
                                        <img src="assets/images/shop/sephora.png" width="150" height="150">
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>25 Dollar
                                                <?php
                                                global $db;
                                                $query = "SELECT dollar_25 from sephora_rates";
                                                $results = mysqli_query($db, $query);
                                                if($results->num_rows > 0) {
                                                    while ($row = $results->fetch_assoc()) {
                                                        echo "$row[dollar_25]";
                                                    }
                                                }
                                                ?>
                                            </li>
                                            <li>50 Dollar
                                                <?php
                                                global $db;
                                                $query = "SELECT dollar_50 from sephora_rates";
                                                $results = mysqli_query($db, $query);
                                                if($results->num_rows > 0) {
                                                    while ($row = $results->fetch_assoc()) {
                                                        echo "$row[dollar_50]";
                                                    }
                                                }
                                                ?>
                                            </li>
                                            <li>100 Dollar
                                                <?php
                                                global $db;
                                                $query = "SELECT dollar_100 from sephora_rates";
                                                $results = mysqli_query($db, $query);
                                                if($results->num_rows > 0) {
                                                    while ($row = $results->fetch_assoc()) {
                                                        echo "$row[dollar_100]";
                                                    }
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="button"><a href="sephora-card" class="btn btn-border btn-sm btn-outline-primary">Trade Sephora</a></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Price row 2-->

                </div>
            </div>
        </div>
    </main>


<?php
include('foot.php');
?>