<?php
// Your existing PHP code for fetching the data from the database
include('../connect.php');
if(isset($_GET['requestid'])){
    $requestid = $_GET['requestid'];

    // Update the request status to accepted
    $sql = "UPDATE tbl_request SET request_status = 1 WHERE requestid = $requestid";
    mysqli_query($database, $sql);

    // Alert the user that the request has been accepted
    echo "<script>alert('Request has been accepted.')</script>";
}

// Redirect the user back to the previous page
header("Location: request.php");
exit;
?>
