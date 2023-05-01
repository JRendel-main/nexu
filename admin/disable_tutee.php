<?php
include_once('../connect.php');

// Check if tutorid is set and is numeric
if (isset($_POST['tuteeid']) && is_numeric($_POST['tuteeid'])) {
    $tuteeid = $_POST['tuteeid'];

    // Perform logic to disable tutor account
    // Get the auth_id from tbl_tutor using tutorid
    $sql = "SELECT auth_id FROM tbl_tutee WHERE tuteeid = $tuteeid";
    $result = $database->query($sql);
    $row = $result->fetch_assoc();
    $auth_id = $row['auth_id'];

    // Update the status of the auth_id to 0 on tbl_auth
    $updateSql = "UPDATE tbl_auth SET acc_status = 3 WHERE auth_id = $auth_id";
    $updateResult = $database->query($updateSql);
    // Check if the update was successful
    if ($updateResult) {
        // Redirect to tutor.php with success message
        header('Location: tutor_settings.php?alert_msg=Account disabled successfully&alert_style=success');
        exit;
    } else {
        // Redirect to tutor.php with error message
        header('Location: tutor_settings.php?alert_msg=Error disabling account&alert_style=danger');
        exit;
    }
}
?>