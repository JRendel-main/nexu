<?php
// write backend for login
include 'connect.php';
$error = array();
session_start();

$_SESSION['username'] = "";
$_SESSION['password1'] = "";

if($_POST){

    $username=$_POST['username'];
    $password1=$_POST['password1'];
    

    $result= $database->query("select * from tbl_auth where username='$username'");
    $row = $result->fetch_assoc();
    $count = $result->num_rows;
    // get the password
    // check if the password is correct
    if($count == 1){
        $passwordc = $row['password'];
        if($password1 == $passwordc){
            //get the acc_status
            $acc_status = $row['acc_status'];
            if($acc_status == 1) {
                // get the categoryid
                $catid = $row['catid'];
                if ($catid == 0) {
                    // get the information of admin
                    $authid = $row['auth_id'];
                    $result1 = $database->query("select * from tbl_admin where auth_id='$authid'");
                    $row1 = $result1->fetch_assoc();

                    $adminid = $row1['adminid'];
                    $username = $row['username'];

                    // make it global variable
                    $_SESSION['adminid'] = $adminid;
                    $_SESSION['username'] = $username;
                    $_SESSION['catid'] = $catid;
                    $_SESSION['authid'] = $authid;
                    header('location: admin/index.php');
                    
                }
                elseif ($catid == 1) {
                    $authid = $row['auth_id'];
                    $result1 = $database->query("select * from tbl_tutee where auth_id='$authid'");
                    $row1 = $result1->fetch_assoc();

                    $tuteeid = $row1['tuteeid'];
                    $username = $row['username'];

                    // make it global variable
                    $_SESSION['tuteeid'] = $tuteeid;
                    $_SESSION['username'] = $username;
                    $_SESSION['catid'] = $catid;
                    $_SESSION['authid'] = $authid;
                    header('location: tutee/index.php');

                }
                elseif ($catid == 2) {
                    $authid = $row['auth_id'];
                    $result1 = $database->query("select * from tbl_tutor where auth_id='$authid'");
                    $row1 = $result1->fetch_assoc();

                    $tutorid = $row1['tutorid'];
                    $username = $row['username'];

                    // make it global variable
                    $_SESSION['tutorid'] = $tutorid;
                    $_SESSION['username'] = $username;
                    $_SESSION['catid'] = $catid;
                    $_SESSION['authid'] = $authid;
                    header('location: tutor/index.php');

                }
            }
            elseif ($acc_status == 3) {
                $errors[] = "Account is disabled, Contact admin!";
            }
            else {
                $errors[] = "Account is not active, Wait for confirmation from admin!";
            }
        }
        else {
            $errors[] = "Password is incorrect";
        }
    }
    else {
        $errors[] = "Username is is not been registered";
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

    <title>Nexus Link - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    .bg-gradient-blue {
        background-image: linear-gradient(to right, #3F51B5, #2196F3);
    }
    .card-login {
    /*    center horizontally and vertically*/
        float: none;
        margin: auto auto 10px;
    }
</style>

<body class="bg-gradient-blue">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5 card-login">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="img/login.jpg" alt="logo" class="img-fluid" style="width: 100%; height: 100%;">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                            <?php
                                    // display the error
                                    if(!empty($errors)) {
                                        echo "<div class='error-messages'> ";
                                        foreach ($errors as $error) {
                                            echo "<div class='alert alert-danger' role='alert'>";
                                            echo $error;
                                            echo "</div>";
                                            // remove the alert after 3 second
                                            echo "<script>
                                            setTimeout(function(){
                                                $('.alert').alert('close');
                                            }, 3000);
                                            </script>";
                                        }
                                        echo "</div>";
                                    }

                                    ?>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!!</h1>
                                </div>
                                <form class="user" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                               id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Username..." name="username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Password" name="password1">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.php">Create an Account!</a>
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