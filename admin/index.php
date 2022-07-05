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
                <li class="breadcrumb-item active">Dashboard / Overview</li>
                <!-- notification message -->

            </ol>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body"> Total Google Trades
                            (
                            <?php
                            global $db;
                            $query = "SELECT COUNT(*) FROM google_card";
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
                        <div class="card-body">Total Amazon Trades(
                            <?php
                            global $db;
                            $query = "SELECT COUNT(*) FROM amazon_card ";
                            $result = $db->query($query);
                            // Print out result
                            while($row = $result->fetch_assoc()){
                                echo  $row['COUNT(*)'];
                            }
                            ?>)
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="amazon-trades">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">Total Steam Trades
                            (
                            <?php
                            global $db;
                            $query = "SELECT COUNT(*) FROM steam_card";
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
                        <div class="card-body"> Total iTunes Trades (
                            <?php
                            global $db;
                            $query = "SELECT COUNT(*) FROM itunes_card";
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
                        <div class="card-body">Total Ebay Trades
                            (
                            <?php
                            global $db;
                            $query = "SELECT COUNT(*) FROM ebay_card";
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
                        <div class="card-body">Total Nike Trades
                            (
                            <?php
                            global $db;
                            $query = "SELECT COUNT(*) FROM nike_card";
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
                        <div class="card-body">Total Sephora Trades(
                            <?php
                            global $db;
                            $query = "SELECT COUNT(*) FROM sephora_card";
                            $result = $db->query($query);
                            // Print out result
                            while($row = $result->fetch_assoc()){
                                echo  $row['COUNT(*)'];
                            }
                            ?>)
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="sephora-trades">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

            </div><!--row-->

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    All Users
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">

                            <thead>
                            <tr>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>User_type</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 5;
                            $offset = ($pageno-1) * $no_of_records_per_page;
                            $previous_page = $pageno - 1;
                            $next_page = $pageno + 1;
                            $adjacents = "2";

                            // connect to database
                            global $db;
                            if (mysqli_connect_errno()){
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                die();
                            }
                            $email= $_SESSION['user']['email'];
                            $total_pages_sql = "SELECT COUNT(*) FROM users ORDER BY date DESC ";
                            $result = mysqli_query($db,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);
                            $second_last = $total_pages - 1; // total page minus 1

                            $sql = "SELECT * FROM users ORDER BY date DESC  LIMIT $offset, $no_of_records_per_page";
                            $res_data = mysqli_query($db,$sql);
                            if ($result->num_rows > 0) {
                                while($row = mysqli_fetch_array($res_data)){

                                    echo "<tbody>
                                                <tr>
                                                <td>$row[email] </td>
                                                 <td>$row[username]</td>
                                                 <td>$row[user_type]</td>
                                                </tr>";
                                }
                                echo "</tbody></table>";

                            }
                            ?>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
                                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
                                        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                                    </li>

                                    <?php
                                    if ($total_pages <= 10){
                                        for ($counter = 1; $counter <= $total_pages; $counter++){
                                            if ($counter == $pageno) {
                                                echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                            }else{
                                                echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>";
                                            }
                                        }
                                    }
                                    elseif($total_pages > 10){

                                        if($pageno <= 4) {
                                            for ($counter = 1; $counter < 8; $counter++){
                                                if ($counter == $pageno) {
                                                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                                }else{
                                                    echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>";
                                                }
                                            }
                                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                                            echo "<li class='page-item'><a class='page-link' href='?pageno=$second_last'>$second_last</a></li>";
                                            echo "<li class='page-item'><a class='page-link' href='?pageno=$total_pages'>$total_pages</a></li>";
                                        }

                                        elseif($pageno > 4 && $pageno < $total_pages - 4) {
                                            echo "<li class='page-item'><a class='page-link' href='?pageno=1'>1</a></li>";
                                            echo "<li class='page-item'><a class='page-link' href='?pageno=2'>2</a></li>";
                                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                                            for ($counter = $pageno - $adjacents; $counter <= $pageno + $adjacents; $counter++) {
                                                if ($counter == $pageno) {
                                                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                                }else{
                                                    echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>";
                                                }
                                            }
                                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                                            echo "<li class='page-item'><a class='page-link' href='?pageno=$second_last'>$second_last</a></li>";
                                            echo "<li class='page-item'><a class='page-link' href='?pageno=$total_pages'>$total_pages</a></li>";
                                        }

                                        else {
                                            echo "<li class='page-item'><a class='page-link' href='?pageno=1'>1</a></li>";
                                            echo "<li class='page-item'><a class='page-link' href='?pageno=2'>2</a></li>";
                                            echo "<li class='page-item'><a class='page-link'>...</a></li>";

                                            for ($counter = $total_pages - 6; $counter <= $total_pages; $counter++) {
                                                if ($counter == $pageno) {
                                                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                                }else{
                                                    echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>";
                                                }
                                            }
                                        }
                                    }
                                    ?>

                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?> ">
                                        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                                </ul>
                            </nav>

                    </div><!--Google Dollar card-->

                </div> <!--card-body-->
            </div>

        </div>
    </main>

<?php
include('foot.php');
?>