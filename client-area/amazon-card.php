
<?php
include('../functions.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login');
}
?>

<?php
global $db;

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$errors   = array();

if (isset($_POST["save"])) {
    //$id = mysql_insert_id();
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $amount_100     =   e($_POST['amount_100']);
    $quantity_100   =   e($_POST['quantity_100']);
    $price_100      =   e($_POST['price_100']);

    $amount_50      =   e($_POST['amount_50']);
    $quantity_50    =   e($_POST['quantity_50']);
    $price_50       =   e($_POST['price_50']);

    $amount_25      =   e($_POST['amount_25']);
    $quantity_25    =   e($_POST['quantity_25']);
    $price_25       =   e($_POST['price_25']);
    $status         =   e($_POST['status']);


    $bank           =   e($_POST['bank']);
    $account_name   =   e($_POST['account_name']);
    $account_number =   e($_POST['account_number']);
    $currency       =   e($_POST['currency']);
    $ref_rand = rand(10006540044, 65);
    $ref = 'REF';
    $ref = $ref .$ref_rand;

    // form validation: ensure that the form is correctly filled
    if (empty($bank)) {
        array_push($errors, "Select Your Bank");
    }
    if (empty($account_name)) {
        array_push($errors, "Account Name is Required");
    }
    if (empty($account_number)) {
        array_push($errors, "Account Number is Required");
    }


    $name = $_FILES['file']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

        // Convert to base64

        $image = '../client-area/uploads/'.$name.'';
        // Insert record
        $query = "INSERT INTO amazon_card (email, phone, amount_100, quantity_100, price_100, amount_50, quantity_50, price_50, amount_25, quantity_25, price_25, status,  bank, account_name, account_number, currency, image, t_ref)
VALUES ('$email', '$phone', '$amount_100', '$quantity_100', '$price_100', '$amount_50', '$quantity_50', '$price_50',
'$amount_25', '$quantity_25', '$price_25', '$status', '$bank', '$account_name', '$account_number', '$currency', '".$image."', '$ref')";
        mysqli_query($db, $query);
        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
        header('Refresh:5; url=amazon-trades');
        $_SESSION['success']  = "Amazon Trade Successful!! Trade Reference ID: $ref ";

    }

    if ($db->query === TRUE) {
        echo "<script>alert('Amazon Trade Successful. We Will Contact You. .$ref')</script>";

    } else {
        echo "Error:  <br>" . $db->error;
    }
}

$db->close();
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
                        <li class="breadcrumb-item active">Sell Amazon Gift Card</li>
                        <!-- notification message -->
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Amazon Gift Card Details
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-striped" style="padding: 5px; font-size: 11px;">
                                        <thead class="table-secondary">
                                        <th>Value<br> &nbsp;</th>
                                        <th>Dollar<br> Rates</th>
                                        <th>Pounds <br> Rates</th>
                                        <th>Euro <br> Rates</th>
                                        </thead>

                                        <tbody>
                                        <tr class="table-primary">
                                            <td>100</td>
                                            <td>&#8358;
                                                <?php

                                                // connect to database
                                                $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                $query = "SELECT dollar_100 from amazon_rates";
                                                $result = $db->query($query);
                                                if($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "$row[dollar_100]";
                                                    }
                                                }
                                                ?>
                                            </td> <!--dollar-->

                                            <td>   <?php

                                                // connect to database
                                                $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                $query = "SELECT pounds_100 from amazon_pounds_rates";
                                                $result = $db->query($query);
                                                if($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "$row[pounds_100]";
                                                    }
                                                }
                                                ?> </td> <!--pounds-->

                                            <td>   <?php

                                                // connect to database
                                                $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                $query = "SELECT euro_100 from amazon_euro_rates";
                                                $result = $db->query($query);
                                                if($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "$row[euro_100]";
                                                    }
                                                }
                                                ?> </td> <!--euro-->
                                        </tr>

                                        <tr class="table-danger">
                                            <td>50</td>
                                            <td>&#8358;
                                                <?php

                                                // connect to database
                                                $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                $query = "SELECT dollar_50 from amazon_rates";
                                                $result = $db->query($query);
                                                if($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "$row[dollar_50]";
                                                    }
                                                }
                                                ?>
                                            </td> <!--dollar-->

                                            <td>   <?php

                                                // connect to database
                                                $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                $query = "SELECT pounds_50 from amazon_pounds_rates";
                                                $result = $db->query($query);
                                                if($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "$row[pounds_50]";
                                                    }
                                                }
                                                ?> </td> <!--pounds-->

                                            <td>   <?php

                                                // connect to database
                                                $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                $query = "SELECT euro_50 from amazon_euro_rates";
                                                $result = $db->query($query);
                                                if($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "$row[euro_50]";
                                                    }
                                                }
                                                ?> </td> <!--euro-->
                                        </tr>


                                        <tr class="table-success">
                                            <td>25</td>
                                            <td>&#8358;
                                                <?php

                                                // connect to database
                                                $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                $query = "SELECT dollar_25 from amazon_rates";
                                                $result = $db->query($query);
                                                if($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "$row[dollar_25]";
                                                    }
                                                }
                                                ?>
                                            </td> <!--dollar-->

                                            <td>   <?php

                                                // connect to database
                                                $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                $query = "SELECT pounds_25 from amazon_pounds_rates";
                                                $result = $db->query($query);
                                                if($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "$row[pounds_25]";
                                                    }
                                                }
                                                ?> </td> <!--pounds-->

                                            <td>   <?php

                                                // connect to database
                                                $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                $query = "SELECT euro_25 from amazon_euro_rates";
                                                $result = $db->query($query);
                                                if($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "$row[euro_25]";
                                                    }
                                                }
                                                ?> </td> <!--euro-->
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div><!-- body card-->



                        <div class="row">
                            <div class="col-lg-12">
                                <h5>Click on any of the buttons to trade a currency</h5>
                                <div class="btn-primary tab">
                                    <button class=" tablinks" onclick="openCity(event, 'Dollar')"><a class="btn btn-success">Dollar ($)</a></button>
                                    <button class="text-white tablinks" onclick="openCity(event, 'Pounds')"><a class="btn btn-danger">Pounds (&pound;)</a></button>
                                    <button class="text-white tablinks" onclick="openCity(event, 'Euro')"><a class="btn btn-warning">Euro (&euro;)</a></button>
                                </div>

                                <div id="Dollar" class="tabcontent">
                                    <br>
                                    <h6>Dollar Trade</h6>
                                    <form method="POST" action="" enctype='multipart/form-data' >
                                        <?php echo display_error(); ?>
                                        <div class="row">

                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="pricing-2">

                                                    <div class="" style="position: relative;">
                                                        <img src="assets/images/shop/amazon.png" width="150" height="150">
                                                        <div style="text-align: center;
                                                font-weight: bold;
                                                color: #fff;
                                                position: absolute;
                                                background: rgba(0,0,0,0.4);
                                                left: 0;
                                                top: 0;
                                                height: 90%;
                                                width: 100%;
                                                border-radius: 5px;">
                                                            <span class="" style="position: relative; top: 45px;">$100</span>
                                                        </div>
                                                    </div>

                                                    <div class="content">
                                                        <table border="0">
                                                            <tr>
                                                                <td><label>Amount</label>
                                                                    <input type="text" value="$100"   name="" class="form-control" readonly></td>

                                                                <td><input type="hidden" value="    <?php

                                                                    // connect to database
                                                                    $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                                    $query = "SELECT dollar_100 from amazon_rates";
                                                                    $result = $db->query($query);
                                                                    if($result->num_rows > 0) {
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            echo "$row[dollar_100]";
                                                                        }
                                                                    }
                                                                    ?> " id="d_amount_100" name="amount_100" oninput="google100()"></td>

                                                                <td><label>Quantity</label> <i class="text-danger">*</i>
                                                                    <input type="number" value="" id="d_quantity_100"  name="quantity_100" class="form-control" oninput="google100()"  title="Enter Quantity to get price"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <input type="text" id="d_price_100" class="form-control"  name="price_100" placeholder="0" readonly>

                                                </div>
                                            </div>


                                            <!-- col 2-->

                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="pricing-2">

                                                    <div class="" style="position: relative;">
                                                        <img src="assets/images/shop/amazon.png" width="150" height="150">
                                                        <div style="text-align: center;
                                                font-weight: bold;
                                                color: #fff;
                                                position: absolute;
                                                background: rgba(0,0,0,0.4);
                                                left: 0;
                                                top: 0;
                                                height: 90%;
                                                width: 100%;
                                                border-radius: 5px;">
                                                            <span class="" style="position: relative; top: 45px;">$50</span>
                                                        </div>
                                                    </div>

                                                    <div class="content">
                                                        <table border="0">
                                                            <tr>
                                                                <td><label>Amount</label>
                                                                    <input type="text" value="$50"   name="" class="form-control" readonly></td>

                                                                <td><input type="hidden" value="     <?php

                                                                    // connect to database
                                                                    $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                                    $query = "SELECT dollar_50 from amazon_rates";
                                                                    $result = $db->query($query);
                                                                    if($result->num_rows > 0) {
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            echo "$row[dollar_50]";
                                                                        }
                                                                    }
                                                                    ?> " id="d_amount_50" name="amount_50" oninput="google50()"></td>

                                                                <td><label>Quantity</label> <i class="text-danger">*</i>
                                                                    <input type="number" value="" id="d_quantity_50" name="quantity_50" class="form-control" oninput="google50()"  title="Enter Quantity to get price"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <input type="text" id="d_price_50" value="" name="price_50" class="form-control" placeholder="0" readonly>

                                                </div>
                                            </div>

                                            <!-- col 3-->

                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="pricing-2">

                                                    <div class="" style="position: relative;">
                                                        <img src="assets/images/shop/amazon.png" width="150" height="150">
                                                        <div style="text-align: center;
                                                font-weight: bold;
                                                color: #fff;
                                                position: absolute;
                                                background: rgba(0,0,0,0.4);
                                                left: 0;
                                                top: 0;
                                                height: 90%;
                                                width: 100%;
                                                border-radius: 5px;">
                                                            <span class="" style="position: relative; top: 45px;">$25</span>
                                                        </div>
                                                    </div>

                                                    <div class="content">
                                                        <table border="0">
                                                            <tr>
                                                                <td><label>Amount</label>
                                                                    <input type="text" value="$25"   name="" class="form-control" readonly></td>

                                                                <td><input type="hidden" value="     <?php

                                                                    // connect to database
                                                                    $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                                    $query = "SELECT dollar_25 from amazon_rates";
                                                                    $result = $db->query($query);
                                                                    if($result->num_rows > 0) {
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            echo "$row[dollar_25]";
                                                                        }
                                                                    }
                                                                    ?> " id="d_amount_25" name="amount_25" oninput="google25()"></td>

                                                                <td><label>Quantity</label> <i class="text-danger">*</i>
                                                                    <input type="number" value="" id="d_quantity_25" name="quantity_25" class="form-control" oninput="google25()" title="Enter Quantity to get price"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <input type="text" id="d_price_25" class="form-control" name="price_25" placeholder="0"  readonly>


                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <h6>Bank Details</h6>
                                                <p>All field mark <i class="text-danger">*</i> are compulsory</p>
                                                <div class="form-group">
                                                    <label>Bank Name</label><i class="text-danger">*</i>
                                                    <select class="form-control" name="bank" required>
                                                        <option>Choose Your Bank</option>
                                                        <option value="Access Bank Nigeria Plc">Access Bank Nigeria Plc</option>
                                                        <option value="Diamond Bank Plc">Diamond Bank Plc</option>
                                                        <option value="Eco Bank Nigeria">Eco Bank Nigeria</option>
                                                        <option value="Enterprise Bank ">Enterprise Bank</option>
                                                        <option value="Fidelity Bank ">Fidelity Bank</option>
                                                        <option value="First Bank Nigeria">First Bank Nigeria</option>
                                                        <option value="First City Monument Bank">First City Monument Bank</option>
                                                        <option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
                                                        <option value="Keystone Bank">Keystone Bank</option>
                                                        <option value="Mainstreet Bank">Mainstreet Bank</option>
                                                        <option value="Sky Bank">Sky Bank</option>
                                                        <option value="Stanbic IBTC Bank">Stanbic IBTC Bank </option>
                                                        <option value="Sterling Bank Plc">Sterling Bank Plc</option>
                                                        <option value="Union Bank Nigeria Plc">Union Bank Nigeria Plc</option>
                                                        <option value="United Bank of Africa Plc">United Bank of Africa Plc</option>
                                                        <option value="Unity Bank Plc">Unity Bank Plc</option>
                                                        <option value="WEMA Bank Plc">WEMA Bank Plc</option>
                                                        <option value="Zenith Bank International">Zenith Bank International</option>
                                                        <option value="Heritage Bank">Heritage Bank</option>
                                                        <option value="Jaiz Bank">Jaiz Bank</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Account Name</label><i class="text-danger">*</i>
                                                    <input class="form-control" type="text" name="account_name" placeholder="Account Name" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Account Number</label><i class="text-danger">*</i>
                                                    <input class="form-control" type="number" name="account_number"  placeholder="Account Number" required >
                                                </div>

                                                <label>Upload Amazon Card</label><i class="text-danger">*</i>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file" required >
                                                        <label class="custom-file-label" for="inputGroupFile01" style="color:#ccc;" >.jpg / .png / .jpeg</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control" type="hidden" name="status" value="Pending"  >
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control" type="hidden" name="email" value="<?php echo $_SESSION['user']['email']; ?>"  >
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control" type="hidden" name="phone" value="<?php echo $_SESSION['user']['username']; ?>"  >
                                                </div>

                                                <div class="form-group">
                                                    <input type="hidden"  class="form-control" name="currency" value="$">
                                                </div>
                                                <!-- submit button -->
                                                <div class="form-group ">
                                                    <br><br><input type="submit" name="save" class="btn btn-sm btn-color btn-primary" value="Trade Amazon Dollar">
                                                </div>

                                            </div></div>   <!-- end row form -->
                                    </form>
                                </div>


                                <!--Pounds start here-->
                                <div id="Pounds" class="tabcontent">
                                    <br>
                                    <h6>Pounds Trade</h6>
                                    <form method="POST" action="" enctype='multipart/form-data' >
                                        <?php echo display_error(); ?>
                                        <div class="row">

                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="pricing-2" ng-app="">

                                                    <div class="" style="position: relative;">
                                                        <img src="assets/images/shop/amazon.png" width="150" height="150">
                                                        <div style="text-align: center;
                                                    font-weight: bold;
                                                    color: #fff;
                                                    position: absolute;
                                                    background: rgba(0,0,0,0.4);
                                                    left: 0;
                                                    top: 0;
                                                    height: 90%;
                                                    width: 100%;
                                                    border-radius: 5px;">
                                                            <span class="" style="position: relative; top: 45px;">&pound;100</span>
                                                        </div>
                                                    </div>

                                                    <div class="content">
                                                        <script>

                                                        </script>
                                                        <table border="0">
                                                            <tr >
                                                                <td><label>Amount</label>
                                                                    <input type="text" value="&pound;100"  name="" class="form-control" readonly></td>

                                                                <td><input type="hidden" value=" <?php

                                                                    // connect to database
                                                                    $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                                    $query = "SELECT pounds_100 from amazon_pounds_rates";
                                                                    $result = $db->query($query);
                                                                    if($result->num_rows > 0) {
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            echo "$row[pounds_100]";
                                                                        }
                                                                    }
                                                                    ?> "  name="amount_100" id="p_amount_100" oninput="pounds100()"></td>

                                                                <td><label>Quantity</label> <i class="text-danger">*</i>
                                                                    <input type="number"  id="p_quantity_100"  oninput="pounds100()"  name="quantity_100" class="form-control" oninput="google100()"  title="Enter Quantity to get price"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <input type="text" id="p_price_100" class="form-control"  oninput="pounds100()" name="price_100" placeholder="0" readonly>

                                                </div>
                                            </div>


                                            <!-- col 2-->

                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="pricing-2">

                                                    <div class="" style="position: relative;">
                                                        <img src="assets/images/shop/amazon.png" width="150" height="150">
                                                        <div style="text-align: center;
                                                font-weight: bold;
                                                color: #fff;
                                                position: absolute;
                                                background: rgba(0,0,0,0.4);
                                                left: 0;
                                                top: 0;
                                                height: 90%;
                                                width: 100%;
                                                border-radius: 5px;">
                                                            <span class="" style="position: relative; top: 45px;">&pound; 50</span>
                                                        </div>
                                                    </div>

                                                    <div class="content">
                                                        <table border="0">
                                                            <tr>
                                                                <td><label>Amount</label>
                                                                    <input type="text" value="&pound; 50"   name="" class="form-control" readonly></td>

                                                                <td><input type="hidden" value="     <?php

                                                                    // connect to database
                                                                    $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                                    $query = "SELECT pounds_50 from amazon_pounds_rates";
                                                                    $result = $db->query($query);
                                                                    if($result->num_rows > 0) {
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            echo "$row[pounds_50]";
                                                                        }
                                                                    }
                                                                    ?> " id="p_amount_50" name="amount_50" oninput="pounds50()"></td>

                                                                <td><label>Quantity</label> <i class="text-danger">*</i>
                                                                    <input type="number"  id="p_quantity_50"  oninput="pounds50()"name="quantity_50" class="form-control" oninput="google50()"  title="Enter Quantity to get price"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <input type="text" id="p_price_50" oninput="pounds50()"name="price_50" class="form-control" placeholder="0" readonly>

                                                </div>
                                            </div>

                                            <!-- col 3-->

                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="pricing-2">

                                                    <div class="" style="position: relative;">
                                                        <img src="assets/images/shop/amazon.png" width="150" height="150">
                                                        <div style="text-align: center;
                                                    font-weight: bold;
                                                    color: #fff;
                                                    position: absolute;
                                                    background: rgba(0,0,0,0.4);
                                                    left: 0;
                                                    top: 0;
                                                    height: 90%;
                                                    width: 100%;
                                                    border-radius: 5px;">
                                                            <span class="" style="position: relative; top: 45px;">&pound; 25</span>
                                                        </div>
                                                    </div>

                                                    <div class="content">
                                                        <table border="0">
                                                            <tr>
                                                                <td><label>Amount</label>
                                                                    <input type="text" value="&pound; 25"   name="" class="form-control" readonly></td>

                                                                <td><input type="hidden" value="     <?php

                                                                    // connect to database
                                                                    $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                                    $query = "SELECT pounds_25 from amazon_pounds_rates";
                                                                    $result = $db->query($query);
                                                                    if($result->num_rows > 0) {
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            echo "$row[pounds_25]";
                                                                        }
                                                                    }
                                                                    ?> " id="p_amount_25" name="amount_25" oninput="pounds25()"></td>

                                                                <td><label>Quantity</label> <i class="text-danger">*</i>
                                                                    <input type="number"  id="p_quantity_25" oninput="pounds25()" name="quantity_25" class="form-control" oninput="google25()" title="Enter Quantity to get price"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <input type="text" id="p_price_25"  oninput="pounds25()" class="form-control" name="price_25" placeholder="0"  readonly>


                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <h6>Bank Details</h6>
                                                <p>All field mark <i class="text-danger">*</i> are compulsory</p>
                                                <div class="form-group">
                                                    <label>Bank Name</label><i class="text-danger">*</i>
                                                    <select class="form-control" name="bank" required>
                                                        <option>Choose Your Bank</option>
                                                        <option value="Access Bank Nigeria Plc">Access Bank Nigeria Plc</option>
                                                        <option value="Diamond Bank Plc">Diamond Bank Plc</option>
                                                        <option value="Eco Bank Nigeria">Eco Bank Nigeria</option>
                                                        <option value="Enterprise Bank ">Enterprise Bank</option>
                                                        <option value="Fidelity Bank ">Fidelity Bank</option>
                                                        <option value="First Bank Nigeria">First Bank Nigeria</option>
                                                        <option value="First City Monument Bank">First City Monument Bank</option>
                                                        <option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
                                                        <option value="Keystone Bank">Keystone Bank</option>
                                                        <option value="Mainstreet Bank">Mainstreet Bank</option>
                                                        <option value="Sky Bank">Sky Bank</option>
                                                        <option value="Stanbic IBTC Bank">Stanbic IBTC Bank </option>
                                                        <option value="Sterling Bank Plc">Sterling Bank Plc</option>
                                                        <option value="Union Bank Nigeria Plc">Union Bank Nigeria Plc</option>
                                                        <option value="United Bank of Africa Plc">United Bank of Africa Plc</option>
                                                        <option value="Unity Bank Plc">Unity Bank Plc</option>
                                                        <option value="WEMA Bank Plc">WEMA Bank Plc</option>
                                                        <option value="Zenith Bank International">Zenith Bank International</option>
                                                        <option value="Heritage Bank">Heritage Bank</option>
                                                        <option value="Jaiz Bank">Jaiz Bank</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Account Name</label><i class="text-danger">*</i>
                                                    <input class="form-control" type="text" name="account_name" placeholder="Account Name" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Account Number</label><i class="text-danger">*</i>
                                                    <input class="form-control" type="number" name="account_number"  placeholder="Account Number" required >
                                                </div>

                                                <label>Upload Amazon Card</label><i class="text-danger">*</i>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file" required >
                                                        <label class="custom-file-label" for="inputGroupFile01" style="color:#ccc;" >.jpg / .png / .jpeg</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control" type="hidden" name="status" value="Pending"  >
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control" type="hidden" name="email" value="<?php echo $_SESSION['user']['email']; ?>"  >
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control" type="hidden" name="phone" value="<?php echo $_SESSION['user']['username']; ?>"  >
                                                </div>

                                                <div class="form-group">
                                                    <input type="hidden"  class="form-control" name="currency" value="&pound;">
                                                </div>
                                                <!-- submit button -->
                                                <div class="form-group ">
                                                    <br><br><input type="submit" name="save" class="btn btn-sm btn-color btn-primary" value="Trade Amazon Pounds">
                                                </div>

                                            </div></div>   <!-- end row form -->
                                    </form>
                                </div>

                                <!--Euro-->
                                <div id="Euro" class="tabcontent">
                                    <br>
                                    <h6>Euro Trade</h6>
                                    <form method="POST" action="" enctype='multipart/form-data' >
                                        <?php echo display_error(); ?>
                                        <div class="row">

                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="pricing-2" ng-app="">

                                                    <div class="" style="position: relative;">
                                                        <img src="assets/images/shop/amazon.png" width="150" height="150">
                                                        <div style="text-align: center;
                                                    font-weight: bold;
                                                    color: #fff;
                                                    position: absolute;
                                                    background: rgba(0,0,0,0.4);
                                                    left: 0;
                                                    top: 0;
                                                    height: 90%;
                                                    width: 100%;
                                                    border-radius: 5px;">
                                                            <span class="" style="position: relative; top: 45px;">&euro; 100</span>
                                                        </div>
                                                    </div>

                                                    <div class="content">
                                                        <script>

                                                        </script>
                                                        <table border="0">
                                                            <tr >
                                                                <script>

                                                                </script>
                                                                <td><label>Amount</label>
                                                                    <input type="text" value="&euro;100"  name="" class="form-control" readonly></td>

                                                                <td><input type="hidden" value=" <?php

                                                                    // connect to database
                                                                    $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                                    $query = "SELECT euro_100 from amazon_euro_rates";
                                                                    $result = $db->query($query);
                                                                    if($result->num_rows > 0) {
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            echo "$row[euro_100]";
                                                                        }
                                                                    }
                                                                    ?> "  name="amount_100" id="e_amount_100" oninput="euro100()"></td>

                                                                <td><label>Quantity</label> <i class="text-danger">*</i>
                                                                    <input type="number"  id="e_quantity_100"  oninput="euro100()" name="quantity_100" class="form-control" oninput="google100()"  title="Enter Quantity to get price"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <input type="text" id="e_price_100" class="form-control"  oninput="euro100()" name="price_100" placeholder="0" readonly>

                                                </div>
                                            </div>


                                            <!-- col 2-->

                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="pricing-2">

                                                    <div class="" style="position: relative;">
                                                        <img src="assets/images/shop/amazon.png" width="150" height="150">
                                                        <div style="text-align: center;
                                                font-weight: bold;
                                                color: #fff;
                                                position: absolute;
                                                background: rgba(0,0,0,0.4);
                                                left: 0;
                                                top: 0;
                                                height: 90%;
                                                width: 100%;
                                                border-radius: 5px;">
                                                            <span class="" style="position: relative; top: 45px;">&euro; 50</span>
                                                        </div>
                                                    </div>

                                                    <div class="content">
                                                        <table border="0">
                                                            <tr>
                                                                <td><label>Amount</label>
                                                                    <input type="text" value="&euro; 50"   name="" class="form-control" readonly></td>

                                                                <td><input type="hidden" value="     <?php

                                                                    // connect to database
                                                                    $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                                    $query = "SELECT euro_50 from amazon_euro_rates";
                                                                    $result = $db->query($query);
                                                                    if($result->num_rows > 0) {
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            echo "$row[euro_50]";
                                                                        }
                                                                    }
                                                                    ?> " id="e_amount_50" name="amount_50" oninput="euro50()"></td>

                                                                <td><label>Quantity</label> <i class="text-danger">*</i>
                                                                    <input type="number"  id="e_quantity_50"  oninput="euro50()"name="quantity_50" class="form-control" oninput="google50()"  title="Enter Quantity to get price"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <input type="text" id="e_price_50" oninput="euro50()"name="price_50" class="form-control" placeholder="0" readonly>

                                                </div>
                                            </div>

                                            <!-- col 3-->

                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="pricing-2">

                                                    <div class="" style="position: relative;">
                                                        <img src="assets/images/shop/amazon.png" width="150" height="150">
                                                        <div style="text-align: center;
                                                    font-weight: bold;
                                                    color: #fff;
                                                    position: absolute;
                                                    background: rgba(0,0,0,0.4);
                                                    left: 0;
                                                    top: 0;
                                                    height: 90%;
                                                    width: 100%;
                                                    border-radius: 5px;">
                                                            <span class="" style="position: relative; top: 45px;">&euro; 25</span>
                                                        </div>
                                                    </div>

                                                    <div class="content">
                                                        <table border="0">
                                                            <tr>
                                                                <td><label>Amount</label>
                                                                    <input type="text" value="&euro; 25"   name="" class="form-control" readonly></td>

                                                                <td><input type="hidden" value="     <?php

                                                                    // connect to database
                                                                    $db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
                                                                    $query = "SELECT euro_25 from amazon_euro_rates";
                                                                    $result = $db->query($query);
                                                                    if($result->num_rows > 0) {
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            echo "$row[euro_25]";
                                                                        }
                                                                    }
                                                                    ?> " id="e_amount_25" name="amount_25" oninput="euro25()"></td>

                                                                <td><label>Quantity</label> <i class="text-danger">*</i>
                                                                    <input type="number"  id="e_quantity_25" oninput="euro25()" name="quantity_25" class="form-control" oninput="google25()" title="Enter Quantity to get price"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <input type="text" id="e_price_25"  oninput="euro25()" class="form-control" name="price_25" placeholder="0"  readonly>


                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <h6>Bank Details</h6>
                                                <p>All field mark <i class="text-danger">*</i> are compulsory</p>
                                                <div class="form-group">
                                                    <label>Bank Name</label><i class="text-danger">*</i>
                                                    <select class="form-control" name="bank" required>
                                                        <option>Choose Your Bank</option>
                                                        <option value="Access Bank Nigeria Plc">Access Bank Nigeria Plc</option>
                                                        <option value="Diamond Bank Plc">Diamond Bank Plc</option>
                                                        <option value="Eco Bank Nigeria">Eco Bank Nigeria</option>
                                                        <option value="Enterprise Bank ">Enterprise Bank</option>
                                                        <option value="Fidelity Bank ">Fidelity Bank</option>
                                                        <option value="First Bank Nigeria">First Bank Nigeria</option>
                                                        <option value="First City Monument Bank">First City Monument Bank</option>
                                                        <option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
                                                        <option value="Keystone Bank">Keystone Bank</option>
                                                        <option value="Mainstreet Bank">Mainstreet Bank</option>
                                                        <option value="Sky Bank">Sky Bank</option>
                                                        <option value="Stanbic IBTC Bank">Stanbic IBTC Bank </option>
                                                        <option value="Sterling Bank Plc">Sterling Bank Plc</option>
                                                        <option value="Union Bank Nigeria Plc">Union Bank Nigeria Plc</option>
                                                        <option value="United Bank of Africa Plc">United Bank of Africa Plc</option>
                                                        <option value="Unity Bank Plc">Unity Bank Plc</option>
                                                        <option value="WEMA Bank Plc">WEMA Bank Plc</option>
                                                        <option value="Zenith Bank International">Zenith Bank International</option>
                                                        <option value="Heritage Bank">Heritage Bank</option>
                                                        <option value="Jaiz Bank">Jaiz Bank</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Account Name</label><i class="text-danger">*</i>
                                                    <input class="form-control" type="text" name="account_name" placeholder="Account Name" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Account Number</label><i class="text-danger">*</i>
                                                    <input class="form-control" type="number" name="account_number"  placeholder="Account Number" required >
                                                </div>

                                                <label>Upload Amazon Card</label><i class="text-danger">*</i>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file" required >
                                                        <label class="custom-file-label" for="inputGroupFile01" style="color:#ccc;" >.jpg / .png / .jpeg</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control" type="hidden" name="status" value="Pending"  >
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control" type="hidden" name="email" value="<?php echo $_SESSION['user']['email']; ?>"  >
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control" type="hidden" name="phone" value="<?php echo $_SESSION['user']['username']; ?>"  >
                                                </div>

                                                <div class="form-group">
                                                    <input type="hidden"  class="form-control" name="currency" value="&euro;">
                                                </div>
                                                <!-- submit button -->
                                                <div class="form-group ">
                                                    <br><br><input type="submit" name="save" class="btn btn-sm btn-color btn-primary" value="Trade Amazon Euro">
                                                </div>

                                            </div></div>   <!-- end row form -->
                                    </form>
                                </div><!--euro-->

                                <script>
                                    function openCity(evt, cityName) {
                                        var i, tabcontent, tablinks;
                                        tabcontent = document.getElementsByClassName("tabcontent");
                                        for (i = 0; i < tabcontent.length; i++) {
                                            tabcontent[i].style.display = "none";
                                        }
                                        tablinks = document.getElementsByClassName("tablinks");
                                        for (i = 0; i < tablinks.length; i++) {
                                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                                        }
                                        document.getElementById(cityName).style.display = "block";
                                        evt.currentTarget.className += " active";
                                    }
                                </script>

                            </div>

                        </div>

                    </div> <!-- body tag-->
                </div>
            </main>


<?php
include('foot.php');
?>
