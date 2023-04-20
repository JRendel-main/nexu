
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
<?php include 'includes/header.php'; ?>
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
                    // get the name of tutee using adminid
                    $tuteeid = $_SESSION['tuteeid'];
                    $sql = "SELECT * FROM tbl_tutee WHERE tuteeid = '$tuteeid'";
                    $result = mysqli_query($database, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $tuteename = $row['tutee_fname'] . ' ' .$row['tutee_lname'];


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

                <?php
                $tutorid = $_GET['tutorId'];
                $tuteeid = $_GET['tuteeId'];

                $sql = "SELECT scheduleid, date, start_time, duration, max_tutee, topic, description FROM tbl_schedule WHERE tutorid = '$tutorid'";
                $result = mysqli_query($database, $sql);

                // Create an array to store events
                $events = array();

                // Loop through the result set and add events to the array
                while ($row = $result->fetch_assoc()) {
                    // Convert date and time to ISO 8601 format for FullCalendar
                    $start = $row['date'] . 'T' . $row['start_time'];
                    $end = date('Y-m-d\TH:i:s', strtotime($start . ' + ' . $row['duration'] . ' minutes'));
                    $topic = $row['topic'];
                    $description = $row['description'];
                    $scheduleid = $row['scheduleid'];
                    $max_tutee = $row['max_tutee'];

                    $sql1 = "SELECT COUNT(tuteeid) FROM tbl_request WHERE scheduleid = '$scheduleid' AND request_status = 1";
                    $result1 = mysqli_query($database, $sql1);
                    $row1 = mysqli_fetch_assoc($result1);

                    $tuteeid = $row1['COUNT(tuteeid)'];
                    $tuteeid1 = $_GET['tuteeId'];

                    //check if the tutee has already booked the schedule
                    $sql2 = "SELECT * FROM tbl_request WHERE scheduleid = '$scheduleid' AND tuteeid = '$tuteeid1'";
                    $result2 = mysqli_query($database, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    //count the number of rows
                    $count = mysqli_num_rows($result2);

                    // Add the event to the array
                    $events[] = array(
                        'title' => $row['topic'],
                        'start' => $start,
                        'scheduleid' => $scheduleid,
                        'date' => $row['date'],
                        'topic' => $topic,
                        'description' => $description,
                        'start' => $start,
                        'end' => $end,
                        'duration' => $row['duration'],
                        'max_tutee' => $max_tutee,
                        'tuteeid' => $tuteeid,
                        'check' => $count
                    );
                }
                // Retrieve schedule data from the database



                ?>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


                <!-- Page Heading -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">'s Schedule</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card shadow mb-4" id="scheduledetails">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Schedule Details</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="scheduleid">Schedule ID:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p id="scheduleid"></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="date">Date:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p id="date"></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="start">Time:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p id="start"></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="duration">Duration:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p id="duration"></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="topic">Topic: </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p id="topic"></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="description">Description: </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p id="description"></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="maxtutee">Max Tutee:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p id="maxtutee"></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="availabilty">Available:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="badge badge-success" id="availabilty"></span>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <button class="btn btn-primary" id="btn-status" data-tutorid="<?php echo $tutorid = $_GET['tutorId'];?>" data-tuteeid="<?php echo $tuteeid = $_GET['tuteeId'];?>" data-scheduleid="#scheduleid"></button>
                                                        <button type="button" id="cancelBtn" class="btn btn-secondary">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>

                    <script>
                        cancelBtn.style.display = 'none';
                        $('#calendar').fullCalendar({
                            header: {
                                left: 'today',
                                center: 'title',
                                right: 'prev, next'
                            },
                            navLinks: true,
                            eventLimit: true,
                            events: <?php echo json_encode($events); ?>,
                            eventClick: function (event) {
                                // Update the card with the event details
                                $('#scheduleid').text(event.scheduleid);
                                $('#start').text(event.start);
                                $('#date').text(event.date);
                                $('#duration').text(event.duration);
                                $('#topic').text(event.topic);
                                $('#description').text(event.description);
                                $('#maxtutee').text(event.max_tutee);
                                $('#slot').text(event.tuteeid + '/' + event.max_tutee + ' slots')
                                var btn = $('#btn-status');
                                console.log(event.check);

                                // Check if the user has booked the slot or not
                                if (event.check == 0) {
                                    $('#btn-status').text('Available');
                                    $('#btn-status').removeClass('btn-danger');
                                    $('#btn-status').addClass('btn-primary');
                                    // enable the button
                                    $('#btn-status').prop('disabled', false);
                                    cancelBtn.style.display = 'none';
                                }
                                else {
                                    $('#btn-status').text('Wait for verification...');
                                    $('#btn-status').removeClass('btn-primary');
                                    $('#btn-status').addClass('btn-danger');
                                    // disable the button
                                    $('#btn-status').prop('disabled', true);
                                    // add cancel appointment button
                                    cancelBtn.style.display = 'inline-block';

                                }
                                if (event.tuteeid == event.max_tutee){
                                    $('#availabilty').text('Full');
                                    $('#availabilty').removeClass('badge-success');
                                    $('#availabilty').addClass('badge-danger');
                                    $('#btn-status').text('Full');
                                    $('#btn-status').removeClass('btn-primary');
                                    $('#btn-status').addClass('btn-danger');
                                    // disable the button
                                    $('#btn-status').prop('disabled', true);
                                } else {
                                    $('#availabilty').text('Available');
                                    $('#availabilty').removeClass('badge-danger');
                                    $('#availabilty').addClass('badge-success');
                                }


                            }
                        });
                        // if button clicked then book the slot use get method to pass the scheduleid, tuteeid and tuteeid
                        $('#btn-status').on('click', function() {
                            // Get the tutorid, tuteeid and scheduleid from the button
                            var scheduleId = $('#scheduleid').text();
                            var tutorId = $('#btn-status').data('tutorid');
                            var tuteeId = $('#btn-status').data('tuteeid');
                            // Redirect to the schedule page
                            window.location.href = "request.php?scheduleid=" + scheduleId + "&tutorid=" + tutorId + "&tuteeid=" + tuteeId;
                        });
                    </script>


                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Nexus Link 2023</span>
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
