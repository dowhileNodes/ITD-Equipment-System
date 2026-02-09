<?php
// database connection
$conn = new mysqli("localhost", "root", "", "it_equipment_db");
if ($conn->connect_error) {
    die("Database connection failed");
}
?>