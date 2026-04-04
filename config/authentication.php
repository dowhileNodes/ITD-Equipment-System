<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/db.php';

/* Redirect if not logged in */
if (!isset($_SESSION['employee_id'])) {
    header("Location: /ITD-Equipment-System/modules/Login/login.php");
    exit;
}

/* Correct query: use username instead of name */
$stmt = $conn->prepare("SELECT username, role FROM users WHERE employee_id = ?");

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $_SESSION['employee_id']);
$stmt->execute();

$result = $stmt->get_result();

/* Check if user exists */
if ($result && $result->num_rows > 0) {
    $employee = $result->fetch_assoc();
} else {
    $employee = [
        'username' => 'User',
        'role' => 'user'
    ];
}

/* Set variables */
$employee_name = $employee['username'] ?? 'User';
$employee_role = $employee['role'] ?? 'user';

/* Store role in session */
$_SESSION['role'] = $employee_role;

/* Access control functions */
function requireAdmin() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        echo "Access denied. Admins only.";
        exit;
    }
}

function requireLogin() {
    if (!isset($_SESSION['employee_id'])) {
        header("Location: /ITD-Equipment-System/modules/Login/login.php");
        exit;
    }
}
?>