<?php
// Connect to the database
$tuteeid = $_GET['tuteeId'];
$tutorid = $_GET['tutorId'];
// Connect to the database
require_once('../connect.php'); // database configuration file
  // Fetch events from the database
  $sql = "SELECT * FROM tbl_schedule where tutorid = '$tutorid'";
  $result = $database->query($sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
	$event = array(
		'id' => $row['scheduleid'],
		'title' => $row['topic'],
		'description' => $row['description'],
		'start' => $row['date'] . 'T' . $row['start_time'],
		'end' => $row['date'] . 'T' . $row['end_time'],
		'allDay' => false,
		'max_tutee' => $row['max_tutee']
	);
	$data[] = $event;
}

// return the data as JSON
echo json_encode($data);

// close the database connection
mysqli_close($conn);
?>
