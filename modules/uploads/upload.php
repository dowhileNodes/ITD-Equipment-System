<?php
//for videos upload. Ensure that the path is saved in the db. and the videos is saved in the target folder
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../config/authentication.php';

if ($_SESSION['role'] !== 'admin') {
    http_response_code(403);
    echo "Unauthorized!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    if (!isset($_FILES['video_file']) || $_FILES['video_file']['error'] !== UPLOAD_ERR_OK) {
        echo "Video upload failed!";
        exit;
    }

    // Ensure folder exists
    $targetDir = "C:\\ITD Inhouse folders\\videos\\";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Clean filename and generate unique name
    $originalName = basename($_FILES['video_file']['name']);
    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
    $safeName = preg_replace("/[^a-zA-Z0-9_-]/", "_", pathinfo($originalName, PATHINFO_FILENAME));
    $newName = $safeName . "_" . time() . "." . $extension;

    $targetPath = $targetDir . $newName;

    if (move_uploaded_file($_FILES['video_file']['tmp_name'], $targetPath)) {
        // Save **full path** in DB -- check on Videos table
        $stmt = $conn->prepare("INSERT INTO videos (title, description, video_file) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $targetPath);
        $stmt->execute();

        echo "Upload successful!";
    } else {
        echo "Failed to move uploaded file!";
    }
}
?>