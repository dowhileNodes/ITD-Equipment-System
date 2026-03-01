<?php
//backend handler for for signed gatepass
//include 'db.php';
require_once __DIR__ . '/../../config/db.php';

//session checker
session_start();
if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
    exit();
}

$conn->begin_transaction();


$stmt->execute();
$form_id = $conn->insert_id;
$allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];

if (isset($_FILES['signed_file']) && $_FILES['signed_file']['error'] == 0) {

    if (in_array($_FILES['signed_file']['type'], $allowedTypes)) {

        $uploadDir = "uploads/gatepass/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileTmp  = $_FILES['signed_file']['tmp_name'];
        $extension = pathinfo($_FILES['signed_file']['name'], PATHINFO_EXTENSION);
        $fileName = "gatepass_" . $form_id . "." . $extension;
        $filePath = $uploadDir . $fileName;

        move_uploaded_file($fileTmp, $filePath);

        $stmt = $conn->prepare("
            UPDATE equipment_forms
            SET signed_file_path = ?
            WHERE id = ?
        ");
        $stmt->bind_param("si", $filePath, $form_id);
        $stmt->execute();
    } else {
        die("Invalid file type. Only PDF, JPG, PNG allowed.");
    }
}

// Handle uploaded signed gatepass
if (isset($_FILES['signed_file']) && $_FILES['signed_file']['error'] == 0) {

    $uploadDir = "uploads/gatepass/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileTmp  = $_FILES['signed_file']['tmp_name'];
    $fileName = time() . "_" . basename($_FILES['signed_file']['name']);
    $filePath = $uploadDir . $fileName;

    move_uploaded_file($fileTmp, $filePath);

    // Save file path in database
    $stmt = $conn->prepare("
        UPDATE equipment_forms
        SET signed_file_path = ?
        WHERE id = ?
    ");
    $stmt->bind_param("si", $filePath, $form_id);
    $stmt->execute();
}
