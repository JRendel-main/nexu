<?php
// include database connection code
include('../connect.php');

// retrieve the scheduleid from the AJAX request
$scheduleid = $_POST['scheduleid'];

// prepare and execute a SELECT statement to retrieve the schedule data
$stmt = $database->prepare("SELECT * FROM tbl_schedule WHERE scheduleid = ?");
$stmt->bind_param("i", $scheduleid);
$stmt->execute();
$result = $stmt->get_result();

// check if the query was successful and retrieve the schedule data
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $topic = $row['topic'];
    $description = $row['description'];
    $date = $row['date'];
    $start_time = $row['start_time'];
    $end_time = $row['end_time'];
    $max_tutee = $row['max_tutee'];

    // format the date and time values as needed
    $date = date("Y-m-d", strtotime($date));
    $start_time = date("H:i", strtotime($start_time));
    $end_time = date("H:i", strtotime($end_time));

    // create an array with the schedule data
    $schedule_data = array(
        'topic' => $topic,
        'description' => $description,
        'date' => $date,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'max_tutee' => $max_tutee
    );
    // return the schedule data as JSON
    echo json_encode($schedule_data);
} else {
    // return an error message if the query failed or no data was found
    echo "Error: Unable to retrieve schedule data.";
}

// close the database connection and statement
$stmt->close();
$database->close();
?>