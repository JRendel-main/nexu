<?php
include ('../connect.php');
include_once ('includes/header.php');

$scheduleid = $_GET['scheduleId'];
$tuteeid = $_GET['tuteeId'];
$tutorid = $_GET['tutorId'];
$request_status = 0;


$sql = "INSERT INTO tbl_request (scheduleid, tuteeid, tutorid, request_status) VALUES ('$scheduleid', '$tuteeid', '$tutorid', '$request_status')";
mysqli_query($database, $sql);

// if successful add a alert message and redirect to tutee\index.php

// center the alert to page
echo '<div class="container-fluid">';
echo '<div class="alert alert-success" role="alert" style="display: none;"> Request successful. Redirecting... </div>';
echo '</div>';
?>
<script>
    // Show the success alert
    var successAlert = document.querySelector('.alert-success');
    successAlert.style.display = 'block';

    // Wait for 3 seconds and then redirect to another PHP page
    setTimeout(function() {
        window.location.replace('index.php');
    }, 3000);

</script>
