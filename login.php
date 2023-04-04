<?php
// write backend for login
include 'includes/connect.php';

// check if user is logged in
if (isset($_SESSION['user_id'])) {
    // if user is logged in, redirect to index.php
    header('Location: index.php');
    exit();
}

// check if form was submitted and if it was, check if the user exists
if (isset($_POST['submit'])) {
    // get the user's email and password
    $username = $_POST['username'];
    $password1 = $_POST['password'];

    // check if the user exists
    $sql = "SELECT * FROM tbl_auth WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $password = $row['password'];

    // if the user exists, check if the password is correct
    if (mysqli_num_rows($result) > 0) {
        // check if the password is correct
        if ($password == $password1 && $row['acc_status'] == 1) {
            // if the password is correct, start a session and redirect to index.php
            session_start();
            $_SESSION['auth_id'] = $row['auth_id'];

            // check the category of the user with catid
            $catid = $row['catid'];

            // if the user is a student, redirect to student.php
            if ($catid == 1) {

                header('Location: tutor/index.php');
                exit();
            }
            elseif ($catid == 2) {
                header('Location: tutee/index.php');
                exit();
            }
            elseif ($catid == 0) {
                header('Location: admin/index.php');
                exit();
            }
            else {
                header('Location: index.php');
                exit();
            }

            exit();
        } else {
            // if the password is incorrect, display an error message
            $error = 'The password is incorrect.';
        }
    } else {
        // if the user does not exist, display an error message
        $error = 'The user does not exist.';
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                               id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Username...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <a href="index.html" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </a>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>