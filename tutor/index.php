<?php include 'includes/header.php'; ?>
<?php
include('../connect.php');
$error = array();
session_start();

// get the global variable
$username = $_SESSION['username'];
$catid = $_SESSION['catid'];

if(isset($_SESSION["username"])){
    if(($_SESSION["username"])=="" or $_SESSION['catid']!=2){
        header("location: ../login.php");
    }else{
        $tutorid = $_SESSION['tutorid'];
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
                    $tutorid = $_SESSION['tutorid'];
                    $sql = "SELECT * FROM tbl_tutor WHERE tutorid = '$tutorid'";
                    $result = mysqli_query($database, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $tutorname = $row['tutor_fname'];


                    ?>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $tutorname; ?></span>
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
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                <div class="row">
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Pending Requests</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $sql = "SELECT * FROM tbl_request WHERE tutorid = '$tutorid' AND request_status = 0";
                                            $result = mysqli_query($database, $sql);
                                            $count = mysqli_num_rows($result);
                                            echo $count;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Sessions</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        $sql = "SELECT * FROM tbl_request WHERE tutorid = '$tutorid' AND request_status = 1";
                                        $result = mysqli_query($database, $sql);
                                        $count = mysqli_num_rows($result);
                                        echo $count;
                                        ?>

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total of Tutees</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php

                                        // check the unique tutee id in tbl_request and count the number of unique tutee id
                                        $sql = "SELECT DISTINCT tuteeid FROM tbl_request WHERE tutorid = '$tutorid' AND request_status = 1";
                                        $result = mysqli_query($database, $sql);
                                        $count = mysqli_num_rows($result);
                                        echo $count;


                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 col-md-6 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="m-0 font-weight-bold text-primary">My Schedule</h6>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addScheduleModal">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Topic</th>
                                            <th>Description</th>
                                            <th>Place</th>
                                            <th>Date</th>
                                            <th>Duration</th>
                                            <th>Start-End Time</th>
                                            <th>Slot</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="justify-content-around">
                                        <?php
                                            $sql = "SELECT * FROM tbl_schedule WHERE tutorid = '$tutorid'";
                                            $result = mysqli_query($database, $sql);
                                            while($row = mysqli_fetch_assoc($result)) {

                                                $scheduleid = $row['scheduleid'];
                                                $topic = $row['topic'];
                                                $description = $row['description'];
                                                $date = $row['date'];
                                                $start_time = $row['start_time'];
                                                $duration = $row['duration'];
                                                $slot_avail = $row['max_tutee'];
                                                $place = $row['place'];

                                                // get the hours between start time and end time and duration of the session
                                                $start = new DateTime($start_time);

                                                //format date to more readable format
                                                $date = date("d M Y", strtotime($date));

                                                //remove the seconds from the time
                                                $start_time = date("h:i A", strtotime($start_time));

                                                // make slot available to be more readable
                                                if ($slot_avail == 0) {
                                                    $alert_type = "danger";
                                                } else {
                                                    $alert_type = "success";
                                                }
                                                echo "<tr>";
                                                echo "<td>$topic</td>";
                                                echo "<td>$description</td>";
                                                echo "<td>$place</td>";
                                                echo "<td>$date</td>";
                                                echo "<td>$duration <b>Hours</b></td>";
                                                echo "<td>$start_time</td>";
                                                echo "<td>
                                                        <span class='badge badge-success'>$slot_avail Available Slot</span>
                                                    </td>
                                                    ";
                                                echo "<td>";
                                                // add button that will show scheduleid in the modal
                                                echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editScheduleModal" data-scheduleid="' .$row['scheduleid'] .'" >
                                                        <i class="fas fa-edit"></i>
                                                    </button>';
                                                echo "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleteScheduleModal' data-scheduleid='" . $row['scheduleid'] . "'><i class='fas fa-trash'></i></button>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_POST['addSchedule'])) {
                    // retrieve form data
                    $topic = $_POST['topic'];
                    $description = $_POST['description'];
                    $date = $_POST['date'];
                    $start_time = $_POST['start_time'];
                    $end_time = $_POST['end_time'];
                    $max_tutee = $_POST['max_tutee'];
                    $place = $_POST['place'];
                    // get the allowed duration to tbl_tutor table
                    $sql = "SELECT * FROM tbl_tutor WHERE tutorid = '$tutorid'";
                    $result = mysqli_query($database, $sql);
                    $row = mysqli_fetch_assoc($result);

                    // get the duration from the tbl_tutor table
                    $duration = $row['allowed_schedule'];

                    // insert the data into the table
                    $sql = "INSERT INTO tbl_schedule (topic, description, date, start_time, duration, place, max_tutee, tutorid)
                VALUES ('$topic', '$description', '$date', '$start_time', '$duration', '$place', '$max_tutee', '$tutorid')";
                    $result1 = mysqli_query($database, $sql);

                    // check if insertion was successful
                    if ($result1) {
                        echo "<script>alert('Schedule added successfully!')</script>";
                        echo "<script>window.location.href='index.php'</script>";
                    } else {
                        echo "<script>alert('Schedule failed to add!')</script>";
                        echo "<script>window.location.href='index.php'</script>";
                    }
                }
                ?>

                <div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addScheduleModalLabel">Add Schedule</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="topic">Topic:</label>
                                        <input type="text" class="form-control" id="topic" name="topic" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date:</label>
                                        <input type="date" class="form-control" id="date" name="date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="place">Meetup Place:</label>
                                        <input type="text" class="form-control" id="place" name="place" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_time">Start Time:</label>
                                        <input type="time" class="form-control" id="start_time" name="start_time" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_time">Duration:</label>
                                        <div class="alert alert-warning" role="alert">
                                            You are allowed only to tutor for <b><?php
                                                $sql = "SELECT * FROM tbl_tutor WHERE tutorid = '$tutorid'";
                                                $result = mysqli_query($database, $sql);
                                                $row = mysqli_fetch_assoc($result);
                                                echo $row['allowed_schedule']; ?> hours</b> per session.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="max_tutee">Max Tutee:</label>
                                        <input type="number" class="form-control" id="max_tutee" name="max_tutee" min="1" max="50" required>
                                    </div>
                                    <input type="hidden" id="scheduleid" name="scheduleid">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" name="addSchedule">Add Schedule</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editScheduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Schedule</h5>
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
                        $('#editScheduleModal').on('show.bs.modal', function (event) {
                            console.log('Modal Opened');
                            let button = $(event.relatedTarget);
                            let scheduleId = button.data('scheduleid');
                            let modal = $(this);
                            console.log(scheduleId);
                            // Make an AJAX request to get the tutor details
                            $.ajax({
                                type: 'POST',
                                url: 'fetch_schedule_details.php',
                                data: { scheduleId: scheduleId },
                                success: function (data) {
                                    modal.find('.modal-body').html(data);
                                    modal.find('#editSchedulebtn').data('scheduleid', scheduleId);
                                    // get the data back
                                },
                                error: function () {
                                    alert('Error getting tutor details');
                                }
                            });
                        });
                    });
                </script>

                <!-- Deletion Modal -->
                <div class="modal fade" id="deleteScheduleModal" tabindex="-1" role="dialog" aria-labelledby="deleteScheduleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteScheduleModalLabel">Confirm Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this schedule?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmDeleteSchedule">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        // Get the ID of the schedule to delete from the "data-scheduleid" attribute of the delete button
                        var scheduleId = $("#deleteScheduleModal").data("scheduleid");

                        // When the "Delete" button in the modal is clicked, delete the schedule
                        $("#confirmreDeleteSchedule").click(function() {
                            $.ajax({
                                url: "delete_schedule.php",
                                method: "POST",
                                data: {scheduleId: scheduleId},
                                success: function(response) {
                                    // Reload the page to show the updated schedule list
                                    location.reload();
                                },
                                error: function(xhr, status, error) {
                                    // Display an error message if the schedule couldn't be deleted
                                    alert("Error deleting schedule: " + error);
                                }
                            });
                        });
                    });
                </script>
                <!-- Alert message -->
                <?php if(isset($_SESSION['scheduleAdded'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['scheduleAdded']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php unset($_SESSION['scheduleAdded']); ?>
                <?php endif; ?>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">This Week Schedule</h6>
                        </div>
                        <div class="card-body">
<!--                            add table for this week schedule-->
                            <table class="table table-hover no-shadow">
                                <thead>
                                <tr>
                                    <th scope="col">Day</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">Topic</th>
                                    <th scope="col">Duration</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $startOfWeek = date('Y-m-d', strtotime('monday this week'));
                                $endOfWeek = date('Y-m-d', strtotime('sunday this week'));
                                $sql = "SELECT * FROM tbl_schedule WHERE tutorid = '$tutorid' AND date BETWEEN '$startOfWeek' AND '$endOfWeek'";
                                $result = mysqli_query($database, $sql);
                                while($row = mysqli_fetch_assoc($result)):
                                    $day = date('l', strtotime($row['date']));
                                    //reforamt the start time remove seconds
                                    $row['start_time'] = date('h:i A', strtotime($row['start_time']));
                                    // add indicator if pm or am change color accordingly
                                    if (strpos($row['start_time'], 'PM') !== false) {
                                        $row['start_time'] = '<span class="text-danger">'.$row['start_time'].'</span>';
                                    } else {
                                        $row['start_time'] = '<span class="text-success">'.$row['start_time'].'</span>';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $day; ?></td>
                                        <td><?php echo $row['start_time']; ?></td>
                                        <td><?php echo $row['topic']; ?></td>
                                        <td><?php echo $row['duration']; ?> <strong>Hours</strong></td>
                                    </tr>
                                <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            // Get the tutor's schedule
            $catid = 1;
            // get if post submitted
            if (isset($_POST['contactadmin-submit'])) {
                // get date and time now
                $date = date('Y-m-d');
                $time = date('H:i:s');

                $datetime = $date.' '.$time;
                // get the message and image
                $message = $_POST['message'];
                $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $reciever_catid = 0;
                $reciever_id = 1;
                // remove the name of image 

                // change the name of image to datetime and save to folder remove the original name
                $imageName = date('YmdHis').'.'.$imageExtension;
                $target = "../img/".$imageName;
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
                // get the directory and save to database
                $image = "../img/".$imageName;
                // insert the message and image to the database
                $sql = "INSERT INTO tbl_message (id, catid, message, image, date, recipient_catid, recipient_id) VALUES ('$tutorid', '$catid', '$message', '$image', '$datetime', '$reciever_catid', '$reciever_id')";
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
