<?php
// Connect to database
$database = new mysqli('localhost', 'root', '', 'nexuslink');

// Fetch tutor information from database based on ID
$scheduleId = $_POST['scheduleId'];
$sql = "SELECT * FROM tbl_schedule WHERE scheduleid = $scheduleId";
$result = $database->query($sql);

// Build HTML string containing tutor information
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $html = '<form method="POST" action="edit_schedule.php">';
    $html .= '<label for="topic">Topic:</label>';
    $html .= '<input type="text" class="form-control" id="topic" name="topic" value="' . $row["topic"] . '">';
    $html .= '<label for="description">Description:</label>';
    $html .= '<input type="text" class="form-control" id="description" name="description" value="' . $row["description"] . '">';
    $html .= '<label for="date">Date:</label>';
    $html .= '<input type="date" class="form-control" id="date" name="date" value="' . $row["date"] . '">';
    $html .= '<label for="start_time">Start Time:</label>';
    $html .= '<input type="time" class="form-control" id="start_time" name="start_time" value="' . $row["start_time"] . '">';
    $html .= '<label for="end_time">Duration:</label>';
    $html .= '<input type="number" class="form-control" id="end_time" name="end_time" value="' . $row["duration"] . '" placeholder="Duration can only be set by admin!" readonly>';
    $html .= '<label for="max_tutee">Max Tutee:</label>';
    $html .= '<input type="number" class="form-control" id="max_tutee" name="max_tutee" value="' . $row["max_tutee"] . '" min="0">';
    $html .= '<input type="hidden" name="scheduleId" value="' . $row["scheduleid"] . '">';
    
    // set for footer
    $html .='</div>';
    $html .='<div class="modal-footer">';
    $html .='<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
    $html .='<button type="submit" class="btn btn-primary">Save changes</button>';
} else {
    $html = '<p>No information found for this tutor.</p>';
}

// Return HTML string
echo $html;
?>
