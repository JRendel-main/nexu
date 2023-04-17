<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ID of the schedule to delete from the POST parameters
    $scheduleId = $_POST["scheduleid"];

    include_once('../connect.php');
    // Check for errors
    if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
    }

    // Prepare the SQL statement to delete the schedule
    $stmt = $database->prepare("DELETE FROM tbl_schedule WHERE scheduleid = ?");

    // Bind the schedule ID parameter to the statement
    $stmt->bind_param("i", $scheduleId);

    // Execute the statement
    if ($stmt->execute()) {
        // Return a success message
        echo "Schedule deleted successfully";
    } else {
        // Return an error message
        echo "Error deleting schedule: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $db->close();
}
?>
