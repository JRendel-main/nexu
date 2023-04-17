<?php

// Include any necessary database connection and authentication code here
include_once '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the schedule data from the AJAX request
    $tutorid = $_POST['tutorid'];
    $duration = $_POST['duration'];

    // detect if duration is somehow negative 
    if ($duration < 0) {
        $duration = 0;
    }

    $query = "UPDATE tbl_tutor SET allowed_schedule='$duration' WHERE tutorid='$tutorid'";
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
        echo "<script>window.location.href='edit_duration.php?alert_msg=" . $alert_msg . "&alert_style=" . $alert_style . "'</script>";
        }
?>

