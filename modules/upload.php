<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/authentication.php';
requireLogin();
requireAdmin();
/* SECURITY: Admin only */
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Unauthorized");
}

if (isset($_FILES['video_file'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];

    $targetDir = __DIR__ . "/../uploads/videos/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = time() . "_" . basename($_FILES["video_file"]["name"]);
    $targetFile = $targetDir . $fileName;

    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    /* Allowed types */
    $allowed = ["mp4", "webm", "ogg"];

    /* File size limit (50MB) */
    if ($_FILES["video_file"]["size"] > 50 * 1024 * 1024) {
        die("File too large (max 50MB)");
    }

    if (!in_array($fileType, $allowed)) {
        die("Invalid file type");
    }

    if (move_uploaded_file($_FILES["video_file"]["tmp_name"], $targetFile)) {

        $relativePath = "uploads/videos/" . $fileName;

        $stmt = $conn->prepare("INSERT INTO videos (title, description, video_file) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $relativePath);
        $stmt->execute();

        echo "Upload successful!";
    } else {
        echo "Upload failed!";
    }

}