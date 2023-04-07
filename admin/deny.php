<?php
include('../connect.php');
// get the auth_id
$auth_id = $_GET['auth_id'];

// update the acc_status to 2
$sql = "UPDATE tbl_auth SET acc_status = 2 WHERE auth_id = '$auth_id'";
mysqli_query($database, $sql);

// redirect to tutor_approval.php
header('location: tutor_approval.php');
?>
