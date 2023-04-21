<?php
include '../connect.php';
// Get the scheduleid, tutorid, and tuteeid from the query parameters
$scheduleId = $_GET['scheduleid'];
$tutorId = $_GET['tutorid'];
$tuteeId = $_GET['tuteeid'];

// delete the request from tbl_request
$sql = "DELETE FROM tbl_request WHERE scheduleid = ? and tutorid = ? and tuteeid = ?";
$stmt = mysqli_prepare($database, $sql);
mysqli_stmt_bind_param($stmt, "sss", $scheduleId, $tutorId, $tuteeId);
mysqli_stmt_execute($stmt);


// head back to the schedule page
if (mysqli_stmt_execute($stmt)) {
    // Query executed successfully
    // Redirect to the schedule page after cancellation
    echo ("Query executed successfully");
    header("Location: index.php");
    exit;
} else {
    // Query failed
    echo "Query failed";
}


// Redirect to the schedule page after cancellation
header("Location: schedule_list.php");
exit;
?>
