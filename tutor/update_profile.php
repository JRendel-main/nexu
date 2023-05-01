<?php
include_once('../connect.php');

// Check if a file was uploaded
if (!isset($_FILES['profile_picture'])) {
    header("Location: edit_profile.php?error=upload_error");
    exit();
}

// Get the user ID
$user_id = $_SESSION['user_id'];

// Get the uploaded file
$file = $_FILES['profile_picture'];
$filename = $file['name'];
$filetype = $file['type'];
$filesize = $file['size'];
$filetmp = $file['tmp_name'];

// Check if the file is an image
if (!preg_match('/^image\//', $filetype)) {
    header("Location: edit-profile.php?error=invalid_image_type");
    exit();
}

// Check if the file size is less than 5 MB
if ($filesize > 5 * 1024 * 1024) {
    header("Location: edit-profile.php?error=invalid_image_size");
    exit();
}

// Generate a unique file name
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$new_filename = uniqid('img_') . '.' . $extension;

// Move the file to the uploads directory
$uploads_dir = '../img/tutor/';
$destination = $uploads_dir . $new_filename;
if (!move_uploaded_file($filetmp, $destination)) {
    header("Location: edit-profile.php?error=upload_error");
    exit();
}

// Update the user profile picture in the database
require_once 'db.php';
$db = new DB();
$db->connect();

$result = $db->query("UPDATE tbl_tutor SET tutor_profile = :profile_picture WHERE tutor_id = :user_id", array(
    'profile_picture' => $new_filename,
    'user_id' => $user_id,
));

if ($result) {
    header("Location: edit-profile.php?success=profile_picture_updated");
    exit();
} else {
    header("Location: edit-profile.php?error=database_error");
    exit();
}

?>