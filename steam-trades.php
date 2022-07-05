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

                        <table class="table table-bordered"  id="" width="100%" cellspacing="0">

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
                            <?php
                            global $db;
                            $email= $_SESSION['user']['email'];
                            $query = "SELECT * FROM steam_card where email = '$email' ORDER BY date DESC ";
                            $result = $db->query($query);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {


                                    echo "<tbody>
                                                <tr>
                                                <td>" . $row["date"] . "</td>
                                                 <td>".$row["currency"]."</td>
                                                 <td>".$row["quantity_100"]."</td>
                                                <td>" . $row["price_100"]. "</td>
                                                 <td>".$row["quantity_50"]."</td>
                                                <td>".$row["price_50"]."</td>
                                                 <td>".$row["quantity_25"]."</td>
                                                  <td>".$row["price_25"]."</td>
                                                  <td>".$row["t_ref"]."</td>
                                                  
                                                    <td class='btn-secondary'>".$row["status"]."</td>
                                                </tr>
                                                ";
                                }
                                echo "</tbody></table>";


                                $result->free();
                            }
                            ?>



                    </div><!--Google Dollar card-->




                </div> <!--card-body-->
            </div>

        </div>
    </main>









<?php
include('foot.php');
?>