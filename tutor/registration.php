<?php
include('includes/header.php');

session_start();
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');

$_SESSION["date"]= $date;
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $tutor_fname = trim($_POST['tutor_fname']);
    $tutor_mname = trim($_POST['tutor_mname']);
    $tutor_lname = trim($_POST['tutor_lname']);
    $tutor_bday = trim($_POST['tutor_bday']);
    $tutor_stunum = trim($_POST['tutor_stunum']);
    $tutor_sex = trim($_POST['tutor_sex']);
    $tutor_year = trim($_POST['tutor_year']);
    $tutor_course = trim($_POST['tutor_course']);
    $tutor_email = trim($_POST['tutor_email']);
    $username = trim($_POST['username']);
    $conf_password = $_POST['conf_password'];
    $repassword = $_POST['repassword'];
    $acc_status = "0";
    $catid = "2";

    $targetDirectory = "../img/cor/"; // specify the directory where you want to save the uploaded file
    $uploadedFile = $_FILES["tutor_cor"]["name"]; // get the uploaded file name
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

    if (move_uploaded_file($_FILES["tutor_cor"]["tmp_name"], $targetFile)) {
        echo "File uploaded successfully.";
        $tutor_cor_filename = $targetFile;
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
        // put data into tbl_tutor and tbl_auth
        $sql = "INSERT INTO tbl_tutor (tutor_fname, tutor_mname, tutor_lname, tutor_stunum, tutor_sex, tutor_email, tutor_cor, tutor_course, tutor_year, tutor_bday) values ('$tutor_fname', '$tutor_mname', '$tutor_lname', '$tutor_stunum', '$tutor_sex', '$tutor_email', '$tutor_cor_filename', '$tutor_course', '$tutor_year', '$tutor_bday')";
        $sql2 = "INSERT INTO tbl_auth (username, password, acc_status, catid) values ('$username', '$conf_password', '$acc_status', '$catid')";
        $result = mysqli_query($database, $sql);
        $result2 = mysqli_query($database, $sql2);

        //get the auth_id of the user who just registered and insert it into tbl_tutor
        $sql3 = "SELECT auth_id from tbl_auth where username = '$username'";
        $result3 = mysqli_query($database, $sql3);
        $row = mysqli_fetch_assoc($result3);
        $auth_id = $row['auth_id'];
        $sql4 = "UPDATE tbl_tutor SET auth_id = '$auth_id' WHERE tutor_fname = '$tutor_fname' and tutor_mname = '$tutor_mname' and tutor_lname = '$tutor_lname' and tutor_bday = '$tutor_bday'";
        $result4 = mysqli_query($database, $sql4);

        //get the tutor_id of the user who just registered
        $sql4 = "SELECT tutorid from tbl_tutor where tutor_fname = '$tutor_fname' and tutor_mname = '$tutor_mname' and tutor_lname = '$tutor_lname' and tutor_bday = '$tutor_bday'";
        $result4 = mysqli_query($database, $sql4);
        $row2 = mysqli_fetch_assoc($result4);
        $tutor_id = $row2['tutor_id'];

        if ($result && $result2 && $result3 && $result4) {
            header("Location: ../login.php");
            // get the tutor_id of the user from tbl_tutor

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
                <div class="col-lg-5 d-none d-lg-block">
                    <img src="../img/register.jpg" alt="" width="100%" height="100%">
                </div>
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
                            <h1 class="h4 text-gray-900 mb-4">Create an Account as Tutor</h1>
                        </div>
                        <form class="user" method="POST" enctype="multipart/form-data">
                            <label for="exampleFirstName">
                                <h6 class="m-0 font-weight-bold text-primary text-align-center">Full Name</h6>
                            </label>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " id="exampleFirstName"
                                           placeholder="First Name" name="tutor_fname">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" id="exampleMiddleName"
                                           placeholder="Middle Name" name="tutor_mname">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " id="exampleLastName"
                                           placeholder="Last Name" name="tutor_lname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="examplebday">
                                        <h6 class="m-0 font-weight-bold text-primary">Date of Birth</h6>
                                    </label>
                                    <input type="date" class="form-control " id="examplebday"
                                           placeholder="Date of Birth" name="tutor_bday">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="examplebday">
                                        <h6 class="m-0 font-weight-bold text-primary">Student Number</h6>
                                    </label>
                                    <input type="number" class="form-control " id="examplebday"
                                           placeholder="Student Number" name="tutor_stunum">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="examplebday">
                                        <h6 class="m-0 font-weight-bold text-primary">Sex</h6>
                                    </label>
                                    <select class="form-control dropdown" id="exampleFormControlSelect1" name="tutor_sex">
                                        <option value="" default disabled>Sex</option>
                                        <option class= "dropdown-item" value="M">Male</option>
                                        <option class= "dropdown-item" value="F">Female</option>
                                        <option class= "dropdown-item" value="0">Other</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail"
                                       placeholder="Email Address" name="tutor_email">
                            </div>
                            <div class="form-group">
                                <label for="tutee_cor"><h6 class="m-0 font-weight-bold text-primary">Upload your <strong>Certificate of Registration</strong></h6></strong></label>
                                <input type="file" class="form-control" id="exampleInputFile" name="tutor_cor">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
<!--                                    dropdown-->
                                    <select class="form-control form-control-plaintext dropdown" id="exampleFormControlSelect1" name="tutor_year">
                                        <option value="" default disabled>Year</option>
                                        <option class= "dropdown-item" value="1">1st Year</option>
                                        <option class= "dropdown-item" value="2">2nd Year</option>
                                        <option class= "dropdown-item" value="3">3rd Year</option>
                                        <option class= "dropdown-item" value="4">4th Year</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select class="form-control form-control-plaintext dropdown" id="exampleFormControlSelect1" name="tutor_course">
                                    <option class="dropdown-item" disabled default>Department</option>
                                    <option class= "dropdown-item" value="CICT"><b>CICT</b> - College of Information and Computing Sciences (CICT)</option>
                                    <option class= "dropdown-item" value="COE"><b>COE</b> - College of Engineering</option>
                                    <option class= "dropdown-item" value="COED"><b>COED</b> - College of Education</option>
                                    <option class= "dropdown-item" value="CAS"><b>CAS</b> - College of Arts and Sciences</option>
                                    <option class= "dropdown-item" value="COC"><b>COC</b> - College of Criminology</option>
                                    <option class= "dropdown-item" value="CON"><b>CON</b> - College of Nursing</option>
                                    <option class= "dropdown-item" value="CMBT"><b>CMBT</b> - College of Management and Business Technology</option>
                                    <option class= "dropdown-item" value="CIT"><b>CIT</b> - College of Industrial Technology</option>
                                    <option class= "dropdown-item" value="CPADM"><b>CPADM</b> - College of Public Administration and Disaster Management</option>
                                    <option class= "dropdown-item" value="LBH"><b>LBH</b> - Laboratory Highschool</option>
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


