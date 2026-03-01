<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/db.php';

/* 🔐 Redirect if not logged in */
if (!isset($_SESSION['employee_id'])) {
    header("Location: /ITD-Equipment-System/modules/Login/login.php");
    exit;
}

/* 👤 Get employee name */
$employee_name = $_SESSION['employee_id'];

$stmt = $conn->prepare("SELECT name FROM employees WHERE employee_id = ?");
$stmt->bind_param("s", $_SESSION['employee_id']);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

if ($employee && isset($employee['name'])) {
    $employee_name = $employee['name'];
}
?>