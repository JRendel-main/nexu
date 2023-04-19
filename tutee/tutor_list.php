<?php include 'includes/header.php'; ?>
<?php
include('../connect.php');
$error = array();
session_start();

// get the global variable
$username = $_SESSION['username'];
$catid = $_SESSION['catid'];

if(isset($_SESSION["username"])){
    if(($_SESSION["username"])=="" or $_SESSION['catid']!=1){
        header("location: ../login.php");
    }else{
        $tuteeid = $_SESSION['tuteeid'];
        $authid = $_SESSION['authid'];
    }

}else{
    header("location: ../login.php");
}


?>
<style>
    .modal.fade .modal-dialog {
        -webkit-transform: translate(0, -50px);
        transform: translate(0, -50px);
        transition: transform 0.3s ease-out;
    }

    .modal.fade.show .modal-dialog {
        -webkit-transform: translate(0, 0);
        transform: translate(0, 0);
    }
    .badge {
    padding: 5px 8px;
    border-radius: 3px;
    letter-spacing: 0.5px;
    font-size: 12px;
}

.btn-primary, .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.focus, .btn-outline-primary:not(:disabled):not(.disabled):active {
    box-shadow: 0 3px 7px rgb(109 199 122 / 50%) !important;
}
.btn-primary, .btn-outline-primary, .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.focus, .btn-outline-primary:not(:disabled):not(.disabled):active, .bg-soft-primary .border, .alert-primary, .alert-outline-primary, .badge-outline-primary, .nav-pills .nav-link.active, .pagination .active a, .form-group .form-control:focus, .form-group .form-control.active, .custom-control-input:checked ~ .custom-control-label:before, .custom-control-input:focus ~ .custom-control-label::before, .form-control:focus, .social-icon li a:hover, #topnav .has-submenu.active.active .menu-arrow, #topnav.scroll .navigation-menu > li:hover > .menu-arrow, #topnav.scroll .navigation-menu > li.active > .menu-arrow, #topnav .navigation-menu > li:hover > .menu-arrow, .flatpickr-day.selected, .flatpickr-day.selected:hover, .form-check-input:focus, .form-check-input.form-check-input:checked, .container-filter li.active, .container-filter li:hover {
    border-color: #6dc77a !important;
}
.bg-primary, .btn-primary, .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.focus, .btn-outline-primary:not(:disabled):not(.disabled):active, .badge-primary, .nav-pills .nav-link.active, .pagination .active a, .custom-control-input:checked ~ .custom-control-label:before, #preloader #status .spinner > div, .social-icon li a:hover, .back-to-top:hover, .back-to-home a, ::selection, #topnav .navbar-toggle.open span:hover, .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots.clickable .owl-dot:hover span, .watch-video a .play-icon-circle, .sidebar .widget .tagcloud > a:hover, .flatpickr-day.selected, .flatpickr-day.selected:hover, .tns-nav button.tns-nav-active, .form-check-input.form-check-input:checked {
    background-color: #6dc77a !important;
}
.btn {
    padding: 8px 20px;
    outline: none;
    text-decoration: none;
    font-size: 16px;
    letter-spacing: 0.5px;
    transition: all 0.3s;
    font-weight: 600;
    border-radius: 5px;
}
.btn-primary {
    background-color: #6dc77a !important;
    border: 1px solid #6dc77a !important;
    color: #fff !important;
    box-shadow: 0 3px 7px rgb(109 199 122 / 50%);
}

a {
text-decoration:none;    
}


</style>
<!-- Page Wrapper -->
<div id="wrapper">
    <?php include 'includes/sidebar.php'; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">2+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">5</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="../img/undraw_profile_1.svg"
                                         alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                        problem I've been having.</div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                         alt="...">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the photos that you ordered last month, how
                                        would you like them sent to you?</div>
                                    <div class="small text-gray-500">Jae Chun · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                         alt="...">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Last month's report looks great, I am very happy with
                                        the progress so far, keep up the good work!</div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                         alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                        told me that people say this to all dogs, even if they aren't good...</div>
                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>
                    <?php
                    // get the name of tutee using adminid
                    $tuteeid = $_SESSION['tuteeid'];
                    $sql = "SELECT * FROM tbl_tutee WHERE tuteeid = '$tuteeid'";
                    $result = mysqli_query($database, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $tuteename = $row['tutee_fname'] . ' ' .$row['tutee_lname'];

                    //get the id of tutee


                    ?>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $tuteename; ?></span>
                            <img class="img-profile rounded-circle"
                                 src="../img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Tutor List</h1>
                </div>
                    <?php if (isset($alert_msg) && isset($alert_style)): ?>
                        <div class=row>
                            <div class="alert alert-<?php echo $alert_style; ?> alert-dismissible fade show" role="alert">
                                <?php echo $alert_msg; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php
                        //get the list of tutor from tbl_tutor where their auth_status is 1 from tbl_auth using auth_id
                        $sql = "SELECT * FROM tbl_tutor INNER JOIN tbl_auth ON tbl_tutor.auth_id = tbl_auth.auth_id WHERE tbl_auth.acc_status = 1";
                        $result = mysqli_query($database, $sql);

                        while($row = mysqli_fetch_assoc($result)) {
                            $tutor_fname = $row['tutor_fname'];
                            $tutor_mname = $row['tutor_mname'];
                            $tutor_lname = $row['tutor_lname'];
                            $tutor_bio = $row['tutor_bio'];
                            $tutor_email = $row['tutor_email'];
                            $fullname = $tutor_fname . ' ' . $tutor_mname . ' ' . $tutor_lname;
                            echo '
                            <div class="row">
                            <div class="col-lg-3 col-md-6 col-12 mt-2 pt-8">
                                <div class="card border-0 bg-light rounded shadow">
                                    <div class="card-body p-4">
                                    <img src="../img/undraw_profile_1.svg" class="card-img-top rounded-circle" alt="Profile Picture" style="height: 80px; width: 80px;">
                                        <span class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0">Full time</span>
                                        <span class="badge rounded-pill bg-danger float-md-end mb-3 mb-sm-0">Part time</span>
                                        <h5>' . $fullname . '</h5>
                                        <div class="mt-3">
                                            <span class="text-muted d-block"><i class="fa fa-email" aria-hidden="true"></i> <a href="#" target="_blank" class="text-muted">Bootdey.com LLC.</a></span>
                                            <span class="text-muted d-block"><i class="fa fa-map-marker" aria-hidden="true"></i> USA</span>
                                        </div>
                                        <div class="mt-3">
                                            <?php echo $bio; ?>
                                        </div>
                                        <div class="mt-3">
                                            <button href="#" class="btn btn-primary">View Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                            ';
                        }



                        ?>

            </div>
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Nexus Link 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php
            // Get the tutor's schedule
            $catid = 2;
            // get if post submitted
            if (isset($_POST['contactadmin-submit'])) {
                // get date and time now
                $date = date('Y-m-d');
                $time = date('H:i:s');

                $datetime = $date.' '.$time;
                // get the message and image
                $message = $_POST['message'];
                $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                // remove the name of image 

                // change the name of image to datetime and save to folder remove the original name
                $imageName = date('YmdHis').'.'.$imageExtension;
                $target = "../img/".$imageName;
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
                // get the directory and save to database
                $image = "../img/".$imageName;
                // insert the message and image to the database
                $sql = "INSERT INTO tbl_message (id, catid, message, image, date) VALUES ('$tutorid', '$catid', '$message', '$image', '$datetime')";
                $result = mysqli_query($database, $sql);
                // check if the message inserted
                if ($result) {
                    // display javascript alert
                    echo '<script>alert("Message sent successfully!")</script>';
                } else {
                    // display javascript alert
                    echo '<script>alert("Message not sent!")</script>';
                }
            }
            ?>

            <!-- Add the modal HTML code to your page -->
<div class="modal" id="messageModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title">Message Admin</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form enctype="multipart/form-data" name="contactadmin" method="POST">
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept=".jpg, .jpeg, .png">
                    </div>
                    <button type="submit" name="contactadmin-submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add the modal trigger button/icon to your page -->
<a href="#" id="messageModalTrigger" class="btn btn-primary rounded-circle position-fixed" style="bottom: 20px; right: 20px; z-index: 9999;">
    <i class="fas fa-envelope"></i>
</a>

<!-- Add the required CSS and JS for the modal and animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<script src="https://kit.fontawesome.com/c7e3b0d05b.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // Add animation to the modal
        $("#messageModal").addClass("animate__animated animate__bounceInRight");

        // Show/hide the modal when the trigger button/icon is clicked
        $("#messageModalTrigger").click(function() {
            $("#messageModal").modal("toggle");
        });
    });
</script>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="../login.php">Logout</a>
            </div>
        </div>
    </div>
</div>








<?php include 'includes/footer.php'; ?>
