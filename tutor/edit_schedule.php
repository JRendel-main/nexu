<?php

// Include any necessary database connection and authentication code here
include_once '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the schedule data from the AJAX request
    $scheduleId = $_POST['scheduleId'];
    $topic = $_POST['topic'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $duration = $_POST['duration'];
    $max_tutee = $_POST['max_tutee'];

    // reformat date to yyyy-mm-dd
    $date = date('Y-m-d', strtotime($date));
    // time to hh:mm
    $start_time = date('H:i', strtotime($start_time));
    $end_time = date('H:i', strtotime($end_time));
    //max tutee to int
    $max_tutee = (int)$max_tutee;

$query = "UPDATE tbl_schedule SET topic='$topic', description='$description', date='$date', start_time='$start_time', duration='$duration', max_tutee='$max_tutee' WHERE scheduleid='$scheduleId'";
$result = mysqli_query($database, $query);

//     // Set the appropriate Bootstrap alert message and style based on the query result if successfull
        if ($result) {
            $alert_msg = "Schedule updated successfully!";
            $alert_style = "success";
        } else {
            $alert_msg = "Error updating schedule: " . mysqli_error($database);
            $alert_style = "danger";
        }

        //     // Close the database connection
        mysqli_close($database);

        //     // Redirect to the main page with the appropriate Bootstrap alert
        echo "<script>window.location.href='index.php?alert_msg=" . $alert_msg . "&alert_style=" . $alert_style . "'</script>";
        }
?>

