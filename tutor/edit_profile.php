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
                    $tutor_bio = $row['tutor_bio'];


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
            <!-- Account page navigation-->
    <style>
        .img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
    </style>
    <?php
    // get the tutorname 
    $tutorid = $_SESSION['tutorid'];
    $sql = "SELECT * FROM tbl_tutor WHERE tutorid = '$tutorid'";
    $result = mysqli_query($database, $sql);
    $row = mysqli_fetch_assoc($result);

    $tutor_bio = $row['tutor_bio'];
    $tutor_fname = $row['tutor_fname'];
    $tutor_mname = $row['tutor_mname'];
    $tutor_lname = $row['tutor_lname'];

    $tutor_fullname = $tutor_fname . ' ' . $tutor_mname . ' ' . $tutor_lname;
    // get the profile link
    $default_path = "../img/user.png";
    $sql = "SELECT * FROM tbl_tutor WHERE tutorid = '$tutorid'";
    $result = mysqli_query($database, $sql);
    $row = mysqli_fetch_assoc($result);
    $tutor_profile = $row['tutor_profile'];
    $tutor_bio = $row['tutor_bio'];;

    if ($tutor_profile == '') {
        $tutor_profile = $default_path;
    } else {
        $tutor_profile = "..img/profile/tutor/" . $tutor_profile;
    }
    
    
    ?>
            <div class="container">

    <hr class="mt-0 mb-4">
                <?php if (isset($alert_message) && isset($alert_type)): ?>
                <div class="alert alert-<?php echo $alert_type; ?> alert-dismissible fade show" role="alert">
                    <?php echo $alert_message; ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>

                <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
            <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture preview-->
                    <div class="mb-3">
                        <div class="position-relative">
                            <img class="img-account-profile rounded-circle mb-2" id="profile-picture-preview" src="../img/user.png" alt="" width="150" height="150">
                            <span class="badge badge-pill badge-primary position-absolute top-0 right-0"><i class="fa fa-pencil"></i></span>
                        </div>
                    </div>
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload form-->
                    <div class="form-group">
                        <label for="profile-picture-input" class="btn btn-primary">
                            Upload new image
                            <input type="file" accept="image/*" name="profile_picture" form="profile-form" style="display:none;">
                        </label>
                    </div>
                    <script>
                        // Add event listener to trigger file input when the image is clicked
                        document.getElementById('profile-picture-preview').addEventListener('click', function() {
                            document.getElementById('profile-picture-input').click();
                        });
                    </script>
                </div>

            </div>
        </div>
            <div class="col-xl-8">
                <?php

                ?>
            <!-- Card -->
            <div class="card mb-4 mb-xl-0">
                <!-- modify the form to include the expertise_id field -->
                <form method="post">
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body text-center">
                        <!-- add bio -->
                        <div class="row">
                            <label class="small mb-1" for="inputBio">Bio</label>
                            <textarea class="form-control" id="inputBio" name="tutor_bio" placeholder="Tell us a little about yourself" rows="4"><?php echo $tutor_bio ?></textarea>
                        </div>
                        <!-- add expertise -->
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h6>Expertise</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputExpertise">Expertise</label>
                                    <input class="form-control" id="inputExpertise" name="expertise" type="text" placeholder="e.g. Math, Physics">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputExperience">Experience</label>
                                    <input class="form-control" id="inputExperience" name="experience" type="text" placeholder="e.g. 5 years">
                                </div>
                            </div>
                            <!-- add hidden field for expertise_id -->
                            <input type="hidden" name="expertise_id" id="expertise_id" value="">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="button" onclick="addExpertise()">Add</button>
                            </div>
                        </div>
                        <!-- list of expertise -->
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h6>List of Expertise</h6>
                            </div>
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Expertise</th>
                                        <th>Expertise Level</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="expertise-list">
                                    <?php
                                    // get the list of expertise from the database
                                    $sql = "SELECT * FROM tbl_expertise WHERE tutorid = '$tutorid'";
                                    $result = mysqli_query($database, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>
                             <td>' . $row['expertise'] . '</td>
                             <td>' . $row['expertise_level'] . '</td>
                             <td>
                                 <button class="btn btn-primary btn-sm" type="button" onclick="editExpertise(' . $row['expertiseid'] . ')">Edit</button>
                                 <button class="btn btn-danger btn-sm" type="button" onclick="deleteExpertise(' . $row['expertiseid'] . ')">Delete</button>
                             </td>
                         </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-primary" type="submit" name="update_profile">Update Profile</button>
                    </div>

                </form>
                <script>
                    // add expertise
                    function addExpertise() {
                        // get the values from the input fields
                        var expertise = $("#inputExpertise").val();
                        var experience = $("#inputExperience").val();
                        var expertise_id = $("#expertise_id").val();

                        // check if the expertise_id is set, if set update the record, else insert a new record
                        if(expertise_id != "") {
                            // update the record
                            $.ajax({
                                url: "edit-profile.php",
                                type: "POST",
                                data: {
                                    expertise_id: expertise_id,
                                    expertise: expertise,
                                    experience: experience
                                },
                                success: function(data) {
                                    // reload the page
                                    location.reload();
                                }
                            });
                        } else {
                            // insert a new record
                            $.ajax({
                                url: "edit-profile.php",
                                type: "POST",
                                data: {
                                    expertise: expertise,
                                    experience: experience
                                },
                                success: function(data) {
                                    // reload the page
                                    location.reload();
                                }
                            });
                        }
                    }

                    // edit expertise
                    function editExpertise(expertise_id) {
                        // get the values from the table
                        var expertise = $("#expertise-list").find("tr[data-id='" + expertise_id + "']").find("td:eq(0)").text();
                        var experience = $("#expertise-list").find("tr[data-id='" + expertise_id + "']").find("td:eq(1)").text();

                        // set the values to the input fields
                        $("#inputExpertise").val(expertise);
                        $("#inputExperience").val(experience);
                        $("#expertise_id").val(expertise_id);
                    }

                    // delete expertise
                    function deleteExpertise(expertise_id) {
                        // delete the record
                        $.ajax({
                            url: "edit-profile.php",
                            type: "POST",
                            data: {
                                delete_expertise_id: expertise_id
                            },
                            success: function(data) {
                                // reload the page
                                location.reload();
                            }
                        });
                    }
                </script>
            </div>
        <!-- expertise table -->
        <!-- add expertise modal -->

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
