<?php
require_once '../../config/authentication.php';
requireAdmin();

require_once '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $role = $_POST['role'];

    /*only allow valid roles */
    if (!in_array($role, ['admin', 'user'])) {
        die("Invalid role");
    }

    $stmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
    $stmt->bind_param("si", $role, $id);

    if ($stmt->execute()) {
        header("Location: manager_users.php");
        exit;
    } else {
        echo "Error updating role";
    }
}
?>