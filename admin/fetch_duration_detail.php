<?php
// Connect to database
$database = new mysqli('localhost', 'root', '', 'nexuslink');

// Fetch tutor information from database based on ID
$tutorid = $_POST['tutorid'];
$sql = "SELECT * FROM tbl_tutor WHERE tutorid = $tutorid";
$result = $database->query($sql);

// Build HTML string containing tutor information
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fullname = $row['tutor_fname'] . ' ' . $row['tutor_lname'];
    $html = '<form method="POST" action="edit_duration_tutor.php">';
    $html .= '<label for="fullname">Fullname:</label>';
    $html .= '<input type="text" class="form-control" id="fullname" name="fullname" value="' . $fullname . '" readonly>';
    $html .= '<label for="duration">Duration:</label>';
    $html .= '<input type="number" class="form-control" id="duration" name="duration" value="' . $row["allowed_schedule"] . '"min="0">';
    $html .= '<input type="hidden" name="tutorid" value="' . $row["tutorid"] . '">';
    
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
