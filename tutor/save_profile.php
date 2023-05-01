<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    exit();
}

require_once('../connect.php');

$tutorid = $_SESSION['userid'];
$tutor_bio = $_POST['bio'];
$expertiseItems = json_decode($_POST['expertiseItems'], true);

// Update tutor's bio in the database
$stmt = $db->prepare("UPDATE tbl_tutor SET tutor_bio = ? WHERE tutorid = ?");
$stmt->bind_param("si", $tutor_bio, $tutorid);
$stmt->execute();
$stmt->close();

// Delete existing expertise items for this tutor from the database
$stmt = $db->prepare("DELETE FROM expertise WHERE tutorid = ?");
$stmt->bind_param("i", $tutorid);
$stmt->execute();
$stmt->close();

// Insert new expertise items for this tutor into the database
$stmt = $db->prepare("INSERT INTO tbl_expertise (tutorid, expertise, expertise_level) VALUES (?, ?, ?)");
foreach ($expertiseItems as $item) {
    $expertise = $item['expertise'];
    $rating = $item['expertise_level'];
    $stmt->bind_param("isi", $tutorid, $expertise, $rating);
    $stmt->execute();
}
$stmt->close();

$db->close();

echo "success";
?>
