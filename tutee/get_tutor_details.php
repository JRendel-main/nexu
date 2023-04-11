<?php
// Connect to database
$database = new mysqli('localhost', 'root', '', 'nexuslink');

// Fetch tutor information from database based on ID
$tutorId = $_POST['tutorId'];
$sql = "SELECT * FROM tbl_tutor WHERE tutorid = $tutorId";
$result = $database->query($sql);

// Build HTML string containing tutor information
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $html = '<p><strong>Name:</strong> ' . $row["tutor_fname"] . ' ' . $row["tutor_lname"] . '</p>';
    $html .= '<p><strong>Course:</strong> ' . $row["tutor_course"] . '</p>';
    $html .= '<p><strong>Email:</strong> ' . $row["tutor_email"] . '</p>';
    $html .= '<p><strong>Student Number:</strong> ' . $row["tutor_stunum"] . '</p>';
    // Add more fields as needed
} else {
    $html = '<p>No information found for this tutor.</p>';
}

// Return HTML string
echo $html;
?>
