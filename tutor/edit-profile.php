<?php
// start the session
session_start();

// check if the user is logged in
if (!isset($_SESSION['tutorid'])) {
    // if the user is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// include the database connection
include_once("../connect.php");

// check if the form was submitted
if (isset($_POST['expertise']) && isset($_POST['experience'])) {
    $expertise = $_POST['expertise'];
    $experience = $_POST['experience'];

    // check if the expertise_id was set, if set, update the record, else insert a new record
    if (isset($_POST['expertise_id'])) {
        $expertise_id = $_POST['expertise_id'];

        // update the record
        $sql = "UPDATE tbl_expertise SET expertise = '$expertise', expertise_level = '$experience' WHERE expertiseid = '$expertise_id'";
        mysqli_query($database, $sql);
    } else {
        // insert a new record
        $tutorid = $_SESSION['tutorid'];

        $sql = "INSERT INTO tbl_expertise (tutorid, expertise, expertise_level) VALUES ('$tutorid', '$expertise', '$experience')";
        mysqli_query($database, $sql);
    }

    // redirect to the profile page
    header("Location: edit_profile.php");
    exit();
}

// check if the delete_expertise_id was set, if set, delete the record
if (isset($_POST['delete_expertise_id'])) {
    $expertise_id = $_POST['delete_expertise_id'];

    $sql = "DELETE FROM tbl_expertise WHERE expertiseid = '$expertise_id'";
    mysqli_query($database, $sql);

    // redirect to the profile page
    header("Location: edit_profile.php");
    exit();
}

?>
