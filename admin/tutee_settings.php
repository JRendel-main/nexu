<?php include 'includes/header.php'; ?>
<?php
include('../connect.php');
$error = array();
session_start();

// get the global variable
$username = $_SESSION['username'];
$catid = $_SESSION['catid'];

if(isset($_SESSION["username"])){
    if(($_SESSION["username"])=="" or $_SESSION['catid']!=0){
        header("location: ../login.php");
    }else{
        $adminid = $_SESSION['adminid'];
        $authid = $_SESSION['authid'];
    }

}else{
    header("location: ../login.php");
}




?>
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
                            <span class="badge badge-danger badge-counter">3+</span>
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
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_1.svg"
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
                    // get the name of admin using adminid
                    $adminid = $_SESSION['adminid'];
                    $sql = "SELECT * FROM tbl_admin WHERE adminid = '$adminid'";
                    $result = mysqli_query($database, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $adminname = $row['admin_name'];


                    ?>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $adminname; ?></span>
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
                <?php
                // Check if alert_msg and alert_style are set in query parameters
                if (isset($_GET['alert_msg']) && isset($_GET['alert_style'])) {
                    $alert_msg = $_GET['alert_msg'];
                    $alert_style = $_GET['alert_style'];
                    
                    // Display notification using existing structure
                    echo '<div class="row">
                            <div class="alert alert-'.$alert_style.' alert-dismissible fade show" role="alert">
                                '.$alert_msg.'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>';
                }
                ?>
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tutee - Account Settings</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Tutee ID</th>
                                    <th>Fullname</th>
                                    <th>Year - Course</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                    function errorHandler($errno, $errstr, $errfile, $errline) {
                                        // Create an error message using Bootstrap alert classes
                                        $error = '<div class="alert alert-danger" role="alert">';
                                        $error .= '<strong>Error:</strong> ' . $errstr;
                                        $error .= '</div>';

                                        // Display the error message
                                        echo $error;
                                    }

                                    // Set the custom error handler function
                                    set_error_handler('errorHandler');

                                    // Define a custom exception handler function
                                    function exceptionHandler($exception) {
                                        // Create an error message using Bootstrap alert classes
                                        $error = '<div class="alert alert-danger" role="alert">';
                                        $error .= '<strong>Exception:</strong> ' . $exception->getMessage();
                                        $error .= '</div>';

                                        // Display the error message
                                        echo $error;
                                    }

                                    // Set the custom exception handler function
                                    set_exception_handler('exceptionHandler');


                                $sql = "SELECT * FROM tbl_auth 
                                                JOIN tbl_tutee ON tbl_auth.auth_id = tbl_tutee.auth_id
                                                WHERE tbl_auth.acc_status = 1";
                                $result = mysqli_query($database, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $tuteeid = $row['tuteeid'];
                                    $tutee_fname = $row['tutee_fname'];
                                    $tutee_lname = $row['tutee_lname'];
                                    $tutee_year = $row['tutee_year'];
                                    $tutee_course = $row['tutee_course'];
                                    echo "<tr>";
                                    echo "<td>$tuteeid</td>";
                                    echo "<td>$tutee_fname $tutee_lname</td>";
                                    echo "<td>$tutee_year - $tutee_course</td>";
                                echo '<td>
                                <button type="button" class="btn btn-danger disable-account-btn" data-toggle="modal" data-target="#disableAccountModal" data-tuteeid="'.$tuteeid.'" title="Disable Account" data-toggle="tooltip" data-placement="bottom">
                                    <i class="fas fa-user-slash"></i>
                                </button>
                            </td>';                        
                                    echo "</tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>

            <div class="modal fade" id="editDurationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Duration</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="schedule-details">
                            </div>
                            </div>
                        </div>
                    </div>

                <script>
                    $(document).ready(function () {
                        $('#editDurationModal').on('show.bs.modal', function (event) {
                            console.log('Modal Opened');
                            let button = $(event.relatedTarget);
                            let tuteeid = button.data('tuteeid');
                            let modal = $(this);
                            console.log(tutorid);
                            // Make an AJAX request to get the tutee details
                            $.ajax({
                                type: 'POST',
                                url: 'fetch_duration_detail.php',
                                data: { tuteeid: tuteeid },
                                success: function (data) {
                                    modal.find('.modal-body').html(data);
                                    modal.find('#editDurationbtn').data('tutee', tutee);
                                    // get the data back
                                    console.log(data);
                                },
                                error: function () {
                                    alert('Error getting tutee details');
                                }
                            });
                        });
                        $('#dataTable').DataTable( {
                        responive: true,
                        autoFill: true
                    });
                    // Add click event listener to disable account button
                    $('.disable-account-btn').click(function () {
                        let tuteeid = $(this).data('tuteeid');
                        console.log(tuteeid);

                        // Show confirmation dialog
                        if (confirm("Are you sure you want to disable this account?")) {
                            // Disable the button
                            $(this).prop('disabled', true);

                            // Make AJAX request
                            $.ajax({
                                type: 'POST',
                                url: 'disable_tutee.php',
                                data: { tuteeid: tuteeid },
                                success: function (data) {
                                    // Show success alert message
                                    alert('Tutee account disabled successfully');
                                    // Refresh the page
                                    location.reload();
                                },
                                error: function () {
                                    // Show error alert message
                                    alert('Error disabling tutee account');
                                    // Refresh the page
                                    location.reload();
                                }
                            });
                        }
                    });
                    });
                </script>

        
            <!-- /.container-fluid -->

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

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

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
