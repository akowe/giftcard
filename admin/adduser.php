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
$username = "";
$email    = "";
$errors   = array();

// call the register() function if register_btn is clicked
if (isset($_POST['adduser_btn'])) {
    adduser();
}

function adduser(){
    global $db, $errors;

    // receive all input values from the form

    $username    = e($_POST['username']);
    $email       =  e($_POST['email']);
    $password_1  =  e($_POST['password_1']);
    $password_2  =  e($_POST['password_2']);

    // form validation: ensure that the form is correctly filled
    if (empty($username)) {
        array_push($errors, "Phone Number is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        if (isset($_POST['user_type'])) {
            $user_type = e($_POST['user_type']);
            $query = "INSERT INTO users (username, email, user_type, password) 
						  VALUES('$username', '$email', '$user_type', '$password')";
            mysqli_query($db, $query);
            $_SESSION['success']  = "New User successfully created!!";

        }else{
            $query = "INSERT INTO users (username, email, user_type, password) 
						  VALUES('$username', '$email', 'user', '$password')";
            mysqli_query($db, $query);

            $_SESSION['success_user']  = "Admin: You just added a new User!";
            echo "
            <script>
            alert('Your have Successfully added a User');
</script>
            ";
        }
    }
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
                <li class="breadcrumb-item active">Dashboard/Add User</li>
                <!-- notification message -->

            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-users mr-1"></i>
                    Create Admin or User Account
                </div>

                <div class="card-body">
                <form method="post" action="adduser.php">

                    <?php echo display_error(); ?>
                    <div class="form-group">

                        <input type="text" class="form-control"   name="username" value="<?php echo $username; ?>" placeholder="Mobile Number">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">

                        <select name="user_type" id="user_type"  class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <input type="password" name="password_1" class="form-control" placeholder="Password" >
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_2" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="form-group mb-0">
                        <button type="submit"  name="adduser_btn" class="btn bg-primary text-white">Create User</button>
                    </div>
                </form>
                </div>
            </div>
    </main>


<?php
include('foot.php');
?>