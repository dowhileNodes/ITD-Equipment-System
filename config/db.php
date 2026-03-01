<?php
// database connection
$conn = new mysqli("localhost", "itdadmin", "P@ssw0rd00!", "it_equipment_db");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>