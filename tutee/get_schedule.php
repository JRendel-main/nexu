<?php

$mysqli = new mysqli("localhost", "root", "", "nexuslink");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Retrieve data from the tbl_schedule table
$result = $mysqli->query("SELECT scheduleid, topic, description, start_time, duration, date, max_tutee FROM tbl_schedule");

// Format the data as JSON for the calendar
$data = array();
while ($row = $result->fetch_assoc()) {
    $event = array(
        'title' => $row['topic'],
        'description' => $row['description'],
        'start' => $row['date'] . 'T' . $row['start_time'],
        'duration' => $row['duration'],
        'max_tutee' => $row['max_tutee']
    );
    $data[] = $event;
}

echo json_encode($data);
?>