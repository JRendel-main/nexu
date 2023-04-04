<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tutee - Registration</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    .hr-text {
        display: flex;
        align-items: center;
        text-align: center;
    }

    .hr-text hr {
        flex: 1;
        border-color: #ccc;
    }

    .hr-text span {
        margin: 0 20px;
        font-size: 18px;
        font-weight: bold;
        color: #555;
        text-transform: uppercase;
    }
    hr {
        display: flex;
        align-items: center;
        text-align: center;
    }


</style>

<body class="bg-gradient-primary">
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user">
                            <label for="exampleFirstName">
                                <h6 class="m-0 font-weight-bold text-primary text-align-center">Full Name</h6>
                            </label>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " id="exampleFirstName"
                                           placeholder="First Name">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" id="exampleLastName"
                                           placeholder="Middle Name">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " id="exampleLastName"
                                           placeholder="Last Name">
                                </div>
                            </div>
                            <div class="hr-text">
                                <hr>
                                <span class="hr-text">OR</span>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="examplebday">
                                        <h6 class="m-0 font-weight-bold text-primary">Date of Birth</h6>
                                    </label>
                                    <input type="date" class="form-control " id="examplebday"
                                           placeholder="Date of Birth">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="examplebday">
                                        <h6 class="m-0 font-weight-bold text-primary">Student Number</h6>
                                    </label>
                                    <input type="number" class="form-control " id="examplebday"
                                           placeholder="Student Number">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="examplebday">
                                        <h6 class="m-0 font-weight-bold text-primary">Sex</h6>
                                    </label>
                                    <select class="form-control dropdown" id="exampleFormControlSelect1" >
                                        <option value="" default disabled>Sex</option>
                                        <option class= "dropdown-item" value="1">Male</option>
                                        <option class= "dropdown-item" value="2">Female</option>
                                        <option class= "dropdown-item" value="3">Other</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail"
                                       placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
<!--                                    dropdown-->
                                    <select class="form-control form-control-plaintext dropdown" id="exampleFormControlSelect1" >
                                        <option value="" default disabled>Year</option>
                                        <option class= "dropdown-item" value="1">1st Year</option>
                                        <option class= "dropdown-item" value="2">2nd Year</option>
                                        <option class= "dropdown-item" value="3">3rd Year</option>
                                        <option class= "dropdown-item" value="4">4th Year</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select class="form-control form-control-plaintext dropdown" id="exampleFormControlSelect1">
                                        <option>Course</option>
                                        <option value="BSIT">BSIT</option>
                                        <option value="BSIS">BSIS</option>
                                        <option value="BSBA">BSBA</option>
                                        <option value="BSA">BSA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control"
                                           id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-text"
                                           id="exampleRepeatPassword" placeholder="Repeat Password">
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="#">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="#">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    <!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

</body>

</html>


