<?php
include('../connect.php');
// Your existing PHP code for fetching the data from the database
if(isset($_GET['requestid'])){
    $requestid = $_GET['requestid'];

    // Update the request status to declined
    $sql = "UPDATE tbl_request SET request_status = 2 WHERE requestid = $requestid";
    mysqli_query($database, $sql);

    // Alert the user that the request has been declined
    echo "<script>alert('Request has been declined.')</script>";
}

// Redirect the user back to the previous page
header("Location: request.php");
exit;
?>
