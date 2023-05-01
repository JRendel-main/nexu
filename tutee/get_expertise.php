<?php
// Include database connection and other required dependencies
require_once '../connect.php'; // Replace with your own database connection file

// Get tutorId from query parameter
$tutorId = $_GET['tutorId'];

// Query to fetch expertise data from tbl_expertise
$sql = "SELECT * FROM tbl_expertise WHERE tutorid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $tutorId);
$stmt->execute();
$result = $stmt->get_result();

// Fetch expertise data as associative array
$expertiseData = array();
while ($row = $result->fetch_assoc()) {
  $expertiseData[] = $row;
}

// Close database connection and statement
$stmt->close();
$conn->close();

// Return expertise data as JSON response
header('Content-Type: application/json');
echo json_encode($expertiseData);
?>
