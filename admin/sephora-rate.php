<?php
include('../functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login');
}
?>

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

    //$query = "INSERT INTO ebay_rates(dollar_100, dollar_50, dollar_25) VALUE('$d100', '$d50', '$d25')";
    $query = "UPDATE `sephora_rates` SET dollar_100 = '$d100', dollar_50 = '$d50', dollar_25 = '$d25' ";
    $results = mysqli_query($db, $query);
    if ($results == 1) {
        echo "<script>alert('updated')</script>";
    } else {
        array_push($errors, "not updates");
    }

}
// form validation: ensure that the form is correctly filled


// register user if there are no errors in the form
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
                    Add New Sephora rates
                </div>

                <div class="card-body">
                    <form method="post" action="sephora-rate">

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
                            <button type="submit"  name="rate_btn" class="btn bg-primary text-white">Update Rate</button>
                        </div>
                    </form>

                    <?php
                    global $db;
                    $query = "SELECT dollar_100, dollar_50, dollar_25 from sephora_rates";
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
            </div>
    </main>


<?php
include('foot.php');
?>