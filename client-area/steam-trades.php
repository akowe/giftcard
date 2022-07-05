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
                <li class="breadcrumb-item active">Steam >>Trades</li>
                <!-- notification message -->

            </ol>
            <div class="row">


                <div class="col-xl-6 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Successful Trade (
                            <?php
                            global $db;
                            $email= $_SESSION['user']['email'];

                            $query = "SELECT COUNT(status) FROM steam_card WHERE status='Completed' AND email ='$email'";
                            $result = $db->query($query);
                            // Print out result
                            while($row = $result->fetch_assoc()){
                                echo  $row['COUNT(status)'];
                            }
                            ?>
                            ) </div>

                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Pending Trade (
                            <?php
                            global $db;
                            $email= $_SESSION['user']['email'];

                            $query = "SELECT COUNT(status) FROM steam_card WHERE status='Pending' AND email ='$email'";
                            $result = $db->query($query);
                            // Print out result
                            while($row = $result->fetch_assoc()){
                                echo  $row['COUNT(status)'];
                            }
                            ?>
                            )
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    All Trades
                </div>
                <div class="card-body">
                    <h4>Steam Trades</h4>
                    <div class="table-responsive" >

                        <table class="table table-striped table-bordered">

                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Currency</th>
                                <th>$100 (Qty)</th>
                                <th>Amount</th>
                                <th>$50 (Qty)</th>
                                <th>Amount</th>
                                <th>$25 (Qty)</th>
                                <th>Amount</th>
                                <th>Trade ID</th>
                                <th>Status</th>
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
                            $total_pages_sql = "SELECT COUNT(*) FROM steam_card where email = '$email' ORDER BY date DESC ";
                            $result = mysqli_query($db,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);
                            $second_last = $total_pages - 1; // total page minus 1

                            $sql = "SELECT * FROM steam_card where email = '$email' ORDER BY date DESC  LIMIT $offset, $no_of_records_per_page";
                            $res_data = mysqli_query($db,$sql);
                            if ($result->num_rows > 0) {
                                while($row = mysqli_fetch_array($res_data)){


                                    echo "<tbody>
                                                <tr>
                                                <td>$row[date] </td>
                                                 <td>$row[currency]</td>
                                                 <td>$row[quantity_100]</td>
                                                <td>$row[price_100]</td>
                                                 <td>$row[quantity_50]</td>
                                                <td>$row[price_50]</td>
                                                 <td>$row[quantity_25]</td>
                                                  <td>$row[price_25]</td>
                                                  <td>$row[t_ref]</td>
                                                  
                                                    <td class='btn-secondary'>$row[status]</td>
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