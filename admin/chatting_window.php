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
                        <?php
                        // Retrieve messages from database
                        $sql = "SELECT messageid, date, id, catid, message FROM tbl_message WHERE mess_status = 0 ORDER BY messageid DESC";
                        $result = mysqli_query($database, $sql);

                        // // Count number of unread messages
                        $messcount = mysqli_num_rows($result);
                        ?>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter"><?php echo $messcount ?></span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            <a class="dropdown-item text-center small text-gray-500" href="chatting_window.php">Read More Messages</a>
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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Admin Inbox</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Admin Inbox</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                         aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#viewMessagesModal">View My Messages</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Add new message</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Add a modal element with an ID to reference in JavaScript -->
                            <div class="modal fade" id="viewMessagesModal" tabindex="-1" role="dialog" aria-labelledby="viewMessagesModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <!-- Modal content goes here -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewMessagesModalLabel">View My Messages</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                                // Retrieve messages from database
                                                $sql = "SELECT * from tbl_message where id = '$adminid' AND catid = 0 ORDER BY messageid DESC";
                                                $result = mysqli_query($database, $sql);

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $messageid = $row['messageid'];
                                                    $date = $row['date'];
                                                    $id = $row['id'];
                                                    $catid = $row['catid'];
                                                    $mess_status = $row['mess_status'];
                                                    $message = $row['message'];
                                                    $recipient_id = $row['recipient_id'];
                                                    $recipient_catid = $row['recipient_catid'];
                                                    $mess_status = $row['mess_status'];

                                                    if ($mess_status == 0) {
                                                        $mess_status = "Unread";
                                                    } else {
                                                        $mess_status = "Read";
                                                    }

                                                    echo "<div class='card shadow mb-4'>
                                                            <div class='card-header py-3'>
                                                                <h6 class='m-0 font-weight-bold text-primary'>Message ID: $messageid</h6>
                                                            </div>
                                                            <div class='card-body'>
                                                                <div class='row'>
                                                                    <div class='col-md-4'>
                                                                        <div class='card shadow'>
                                                                            <div class='card-header py-3'>
                                                                                <h6 class='m-0 font-weight-bold text-primary'>Message Details</h6>
                                                                            </div>
                                                                            <div class='card-body'>
                                                                                <p><strong>Message ID: </strong>$messageid</p>
                                                                                <p><strong>Date: </strong>" . formatDate($date) . "</p>
                                                                                <p><strong>Sender ID: </strong>$id</p>
                                                                                <p><strong>Sender Category ID: </strong>$catid</p>
                                                                                <p><strong>Recipient ID: </strong>$recipient_id</p>
                                                                                <p><strong>Recipient Category ID: </strong>$recipient_catid</p>
                                                                                <p><strong>Message Status: </strong>$mess_status</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class='col-md-8'>
                                                                        <div class='card shadow'>
                                                                            <div class='card-header py-3'>
                                                                                <h6 class='m-0 font-weight-bold text-primary'>Message</h6>
                                                                            </div>
                                                                            <div class='card-body'>
                                                                                <p>$message</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>";
                                                }

                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- Add content for the modal footer -->
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card shadow">
                                        <!--List all the message here-->
                                            <?php
                                            // Retrieve messages from database
                                            $sql = "SELECT messageid, date, id, catid, mess_status, message FROM tbl_message WHERE recipient_id = '$adminid' AND recipient_catid = 0 ORDER BY messageid DESC";
                                            $result = mysqli_query($database, $sql);
                                            function formatDate($date) {
                                                // Convert date to timestamp
                                                $timestamp = strtotime($date);
                                                // Get current timestamp
                                                $now = time();
                                                // Calculate time difference in seconds
                                                $diff = $now - $timestamp;

                                                // Define time intervals in seconds
                                                $minute = 60;
                                                $hour = $minute * 60;
                                                $day = $hour * 24;
                                                $month = $day * 30;
                                                $year = $day * 365;

                                                // Determine appropriate time format
                                                if ($diff < $minute) {
                                                    return 'Just now';
                                                } elseif ($diff < $hour) {
                                                    $time = floor($diff / $minute);
                                                    return $time . ' minute' . ($time > 1 ? 's' : '') . ' ago';
                                                } elseif ($diff < $day) {
                                                    $time = floor($diff / $hour);
                                                    return $time . ' hour' . ($time > 1 ? 's' : '') . ' ago';
                                                } elseif ($diff < $month) {
                                                    $time = floor($diff / $day);
                                                    return $time . ' day' . ($time > 1 ? 's' : '') . ' ago';
                                                } elseif ($diff < $year) {
                                                    $time = floor($diff / $month);
                                                    return $time . ' month' . ($time > 1 ? 's' : '') . ' ago';
                                                } else {
                                                    $time = floor($diff / $year);
                                                    return $time . ' year' . ($time > 1 ? 's' : '') . ' ago';
                                                }
                                            }
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $messageid = $row['messageid'];
                                                $date = $row['date'];
                                                $id = $row['id'];
                                                $catid = $row['catid'];
                                                $mess_status = $row['mess_status'];
                                                $message = $row['message'];
                                                // Function to format message date
                                                // get the name of the user
                                                // get the name of the category;
                                                if ($catid == 1) {
                                                    $catname = "Tutor";
                                                    $sql2 = "SELECT * FROM tbl_tutor WHERE tutorid = '$id'";
                                                    $result2 = mysqli_query($database, $sql2);
                                                    $row2 = mysqli_fetch_assoc($result2);
                                                    $tutor_fname = $row2['tutor_fname'];
                                                    $tutor_lname = $row2['tutor_lname'];
                                                    $name = $tutor_fname . " " . $tutor_lname;
                                                } else if ($catid == 2) {
                                                    $catname = "Tutee";
                                                    $sql2 = "SELECT * FROM tbl_tutee WHERE tuteeid = '$id'";
                                                    $result2 = mysqli_query($database, $sql2);
                                                    $row2 = mysqli_fetch_assoc($result2);
                                                    $tutee_fname = $row2['tutee_fname'];
                                                    $tutee_lname = $row2['tutee_lname'];
                                                    $name = $tutee_fname . " " . $tutee_lname;
                                                } else if ($catid == 3) {
                                                    $catname = "Admin";
                                                    $sql2 = "SELECT * FROM tbl_admin WHERE adminid = '$id'";
                                                    $result2 = mysqli_query($database, $sql2);
                                                    $row2 = mysqli_fetch_assoc($result2);
                                                    $name = $row2['admin_name'];
                                                }
                                                ?>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="../img/undraw_profile.svg" class="img-fluid">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <h5><?php echo $name; ?></h5>
                                                            <p><?php echo $catname; ?></p>
                                                            <p><?php echo formatDate($date); ?></p>
                                                            <button class="btn btn-success" id="view" data-messid="<?php echo $messageid?>" data-id="<?php echo $adminid ?>" data-name="<?php echo $name ?>" data-time="<?php echo $date; ?>" data-message="<?php echo $message ?>"
                                                            >View</button>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>

                                                <?php
                                                
                                            }
                                            //get the datetime now
                                            $now = date("Y-m-d H:i:s");
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card shadow">
                                            <div class="card-body" id="chat-window">
                                                <!-- Chat messages will be displayed here -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <img src="../img/undraw_profile.svg" class="img-fluid">
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <h5 id="name">Fullname</h5>
                                                                            <p id="message" class="text-warning">Message</p>
                                                                        <small id="time">Time</small>
                                                                        <input type="hidden" id="id" value="<?php echo $adminid ?>">
                                                                        <input type="hidden" id="catid" value="0">
                                                                        <input type="hidden" id="recipient_id" value="<?php echo $id?>">
                                                                        <input type="hidden" id="recipient_catid" value="<?php echo $catid ?>">
                                                                        <input type="hidden" id="mess_status" value="<?php echo $mess_status ?>">
                                                                        <input type="hidden" id="now" value="<?php echo $now ?>">
                                                                        <input type="hidden" id="messid" value="<?php echo $messageid ?>">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" id="reply" placeholder="Type your message here...">
                                                                            <div class="input-group-append">
                                                                                <button class="btn btn-primary" type="button" id="sendReply">Reply</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <script>
                $("#chat-window").removeClass("d-none");
                     $(document).on('click', '#view', function () {
                          // get the id of the message
                          var messageid = $(this).attr('data-messid');
                          var id = $(this).attr('data-id');
                          //put this in new php variable
                          // get the name of the user
                          var name = $(this).attr('data-name');
                          // get the category of the user
                          var catname = $(this).attr('data-catname');
                          // get the message
                          var message = $(this).attr('data-message');
                            // get the time
                            var time = $(this).attr('data-time');
                          // get the status
                          var status = $(this).attr('data-status');
                          // send variables to send button
        
                         $('#messid').html(messageid);
                          $('#name').html(name);
                          $('#message').html(message);
                          $('#time').html(time);
                          $('#status').html(status);
                          // set the message id
                          $('#id').val(messageid);
                          // set the status to read
                           // detect if sendReply button clicked get the catid and id of user and recipient_catid, recipient_id

                         // diplay new message in chat window if sendReply button is clicked

                    });  
                    $(document).on('click', '#sendReply', function () {
                        var messageid = $('#messid').val();
                        var message = $('#reply').val();
                        var time = $('#date').val();
                        var status = $('#status').val();
                        var catid = $('#catid').val();
                        var id = $('#id').val();
                        console.log(id);
                        var recipient_catid = $('#recipient_catid').val();
                        var recipient_id = $('#recipient_id').val();
                        var mess_status = $('#mess_status').val();
                        var now = $('#now').val();

                        $.ajax({
                            url: 'sendReply.php',
                            method: 'POST',
                            data: {
                                messageid: messageid,
                                message: message,
                                time: time,
                                status: status,
                                catid: catid,
                                id: id,
                                recipient_catid: recipient_catid,
                                recipient_id: recipient_id,
                                mess_status: mess_status,
                                now: now
                            },
                            success: function (data) {
                                $('#chat-window').html(data);
                            }
                        });
                    });

            </script>

            </div>

                <!-- Row end -->
            <!-- Content wrapper end -->

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
