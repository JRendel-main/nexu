<?php
include('includes/header.php');

session_start();
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');

$_SESSION["date"]= $date;
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $tutee_fname = trim($_POST['tutee_fname']);
    $tutee_mname = trim($_POST['tutee_mname']);
    $tutee_lname = trim($_POST['tutee_lname']);
    $tutee_bday = trim($_POST['tutee_bday']);
    $tutee_stunum = trim($_POST['tutee_stunum']);
    $tutee_sex = trim($_POST['tutee_sex']);
    $tutee_year = trim($_POST['tutee_year']);
    $tutee_course = trim($_POST['tutee_course']);
    $tutee_email = trim($_POST['tutee_email']);
    $username = trim($_POST['username']);
    $conf_password = $_POST['conf_password'];
    $repassword = $_POST['repassword'];
    $acc_status = "0";
    $catid = "1";

    $targetDirectory = "../img/cor/"; // specify the directory where you want to save the uploaded file
    $uploadedFile = $_FILES["tutee_cor"]["name"]; // get the uploaded file name
    $targetFile = $targetDirectory . basename($uploadedFile);

    // Check if file already exists
    if (file_exists($targetFile)) {
        $info = pathinfo($uploadedFile);
        $extension = isset($info['extension']) ? '.' . $info['extension'] : '';
        $filenameOnly = $info['filename'];

        // Append a number to the filename until a unique filename is found
        $counter = 1;
        while (file_exists($targetFile)) {
            $newFilename = $filenameOnly . '(' . $counter . ')' . $extension;
            $targetFile = $targetDirectory . $newFilename;
            $counter++;
        }
        echo "File with the same name already exists. Renaming to: $newFilename";
    }

    if (move_uploaded_file($_FILES["tutee_cor"]["tmp_name"], $targetFile)) {
        echo "File uploaded successfully.";
        $tutee_cor_filename = $targetFile;
    }
    else {
        $error[] = "Error uploading files!";
    }



    // validation if username aleady exists in the database
    include('../connect.php');
    $query = "SELECT username from tbl_auth where username = '$username'";
    $result = mysqli_query($database, $query);

    if (mysqli_num_rows($result) > 0) {
        $errors[] = "Username already exists";
    }
    // check if password and repassword are the same
    if (strcmp($conf_password, $repassword) !== 0) {
        $errors [] = "Password does not match";
    }
    if (!empty($errors)) {
        echo "Errors: " . implode(", ", $errors) . "<br>";
    }
    if (empty($errors)) {
        // put data into tbl_tutee and tbl_auth
        $sql = "INSERT INTO tbl_tutee (tutee_fname, tutee_mname, tutee_lname, tutee_sex, tutee_stunum, tutee_email, tutee_cor_filename, tutee_course, tutee_year, tutee_bday) values ('$tutee_fname', '$tutee_mname', '$tutee_lname', '$tutee_sex', '$tutee_stunum', '$tutee_email', '$tutee_cor_filename', '$tutee_course', '$tutee_year', '$tutee_bday')";
        $sql2 = "INSERT INTO tbl_auth (username, password, acc_status, catid) values ('$username', '$conf_password', '$acc_status', '$catid')";
        $result = mysqli_query($database, $sql);
        $result2 = mysqli_query($database, $sql2);

        //get the auth_id of the user who just registered and insert it into tbl_tutee
        $sql3 = "SELECT auth_id from tbl_auth where username = '$username'";
        $result3 = mysqli_query($database, $sql3);
        $row = mysqli_fetch_assoc($result3);
        $auth_id = $row['auth_id'];
        $sql4 = "UPDATE tbl_tutee SET auth_id = '$auth_id' WHERE tutee_fname = '$tutee_fname' and tutee_mname = '$tutee_mname' and tutee_lname = '$tutee_lname' and tutee_bday = '$tutee_bday'";
        $result4 = mysqli_query($database, $sql4);

        //get the tutee_id of the user who just registered
        $sql4 = "SELECT tuteeid from tbl_tutee where tutee_fname = '$tutee_fname' and tutee_mname = '$tutee_mname' and tutee_lname = '$tutee_lname' and tutee_bday = '$tutee_bday'";
        $result4 = mysqli_query($database, $sql4);
        $row2 = mysqli_fetch_assoc($result4);
        $tutee_id = $row2['tutee_id'];

        if ($result && $result2 && $result3 && $result4) {
            header("Location: ../login.php");
            // get the tutee_id of the user from tbl_tutee

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($database);
        }
    }
}


?>


<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5 text-center">
                        <?php 
                        if(!empty($errors)) {
                            echo "<div class='error-messages'> ";
                            foreach ($errors as $error) {
                                echo "<p><strong>$error</strong></p>";
                            }
                            echo "</div>";
                        }
                        ?>
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account! as Tutee</h1>
                        </div>
                        <form class="user" method="POST" enctype="multipart/form-data">
                            <label for="exampleFirstName">
                                <h6 class="m-0 font-weight-bold text-primary text-align-center">Full Name</h6>
                            </label>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " id="exampleFirstName"
                                           placeholder="First Name" name="tutee_fname">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" id="exampleMiddleName"
                                           placeholder="Middle Name" name="tutee_mname">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " id="exampleLastName"
                                           placeholder="Last Name" name="tutee_lname">
                                </div>
                            </div>
                            <div class="hr-text">
                                <hr>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="examplebday">
                                        <h6 class="m-0 font-weight-bold text-primary">Date of Birth</h6>
                                    </label>
                                    <input type="date" class="form-control " id="examplebday"
                                           placeholder="Date of Birth" name="tutee_bday">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="examplebday">
                                        <h6 class="m-0 font-weight-bold text-primary">Student Number</h6>
                                    </label>
                                    <input type="number" class="form-control " id="examplebday"
                                           placeholder="Student Number" name="tutee_stunum">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="examplebday">
                                        <h6 class="m-0 font-weight-bold text-primary">Sex</h6>
                                    </label>
                                    <select class="form-control dropdown" id="exampleFormControlSelect1" name="tutee_sex">
                                        <option value="" default disabled>Sex</option>
                                        <option class= "dropdown-item" value="M">Male</option>
                                        <option class= "dropdown-item" value="F">Female</option>
                                        <option class= "dropdown-item" value="0">Other</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail"
                                       placeholder="Email Address" name="tutee_email">
                            </div>
                            <div class="form-group">
                                <label for="tutee_cor"><h6 class="m-0 font-weight-bold text-primary">Upload your <strong>Certificate of Registration</strong></h6></strong></label>
                                <input type="file" class="form-control" id="exampleInputFile" name="tutee_cor">

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
<!--                                    dropdown-->
                                    <select class="form-control form-control-plaintext dropdown" id="exampleFormControlSelect1" name="tutee_year">
                                        <option value="" default disabled>Year</option>
                                        <option class= "dropdown-item" value="1">1st Year</option>
                                        <option class= "dropdown-item" value="2">2nd Year</option>
                                        <option class= "dropdown-item" value="3">3rd Year</option>
                                        <option class= "dropdown-item" value="4">4th Year</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select class="form-control form-control-plaintext dropdown" id="exampleFormControlSelect1" name="tutee_course">
                                        <option>Course</option>
                                        <option value="BSIT">BSIT</option>
                                        <option value="BSIS">BSIS</option>
                                        <option value="BSBA">BSBA</option>
                                        <option value="BSA">BSA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail"
                                       placeholder="Username" name="username">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control"
                                           id="exampleInputPassword" placeholder="Password" name="conf_password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control"
                                           id="exampleRepeatPassword" placeholder="Repeat Password" name="repassword">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-user btn-block" type="submit">Register</button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="#">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="../login.html">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('includes/footer.php'); ?>


