<?php
// Update the schedule details in the database based on the schedule ID
$scheduleId = $_POST['scheduleId'];
$topic = $_POST['topic'];
$description = $_POST['description'];
$date = $_POST['date'];
$duration = $_POST['duration'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$slot_avail = $_POST['slot_avail'];

// Replace the following lines with your own database connection code
include_once ('../connect.php');


$sql = "UPDATE schedules SET topic = '$topic', description = '$description', date = '$date', duration = $duration, start_time = '$start_time', end_time = '$end_time', slot_avail = '$slot_avail' WHERE scheduleid = $scheduleId";

if ($database->query($sql) === TRUE) {
    echo "Schedule updated successfully";
} else {
    echo "Error updating schedule: " . $database->error;
}

$database->close();
?>
