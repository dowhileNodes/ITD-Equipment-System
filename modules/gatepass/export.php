<?php
require_once __DIR__ . '/../../config/db.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="gatepass.csv"');

$output = fopen("php://output", "w");

fputcsv($output, ['ID','Recipient','Issued From','Date','created_At','signed_file_path','Business Unit','Prepared','Checked','Approved','Received']);

$sql = "SELECT * FROM equipment_forms";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
exit;