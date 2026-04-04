<?php
require_once __DIR__ . '/../../config/db.php'; 
require_once __DIR__ . '/../../config/authentication.php';
requireLogin(); // optional, if you want to restrict access


if ($_SESSION['role'] !== 'admin') {
    die("Unauthorized access"); 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $issued_to = $_POST['issued_to'];
    $issue_date = $_POST['issue_date'];
    $date_of_purchase = $_POST['date_of_purchase'];
    $supplier = $_POST['supplier'];
    $item_description = $_POST['item_description'];
    $serial_number = $_POST['serial_number'];
    $problem = $_POST['problem'];
    $recommendation = $_POST['recommendation'];
    $recommended_by = $_POST['recommended_by'];
    $noted_by = $_POST['noted_by'];
    $approved_by = $_POST['approved_by'];

    $stmt = $conn->prepare("INSERT INTO diagnostic_reports 
        (issued_to, issue_date, date_of_purchase, supplier, item_description, serial_number, problem, recommendation, recommended_by, noted_by, approved_by) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $issued_to, $issue_date, $date_of_purchase, $supplier, $item_description, $serial_number, $problem, $recommendation, $recommended_by, $noted_by, $approved_by);
    $stmt->execute();

    header("Location: admin_diagnostic_list.php");
    exit();
}
?>