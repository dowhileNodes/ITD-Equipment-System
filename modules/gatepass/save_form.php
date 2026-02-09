<?php
//backend handler for forms
//include 'db.php';
require_once __DIR__ . '/../../config/db.php';

$conn->begin_transaction();

// Save main form
$stmt = $conn->prepare(
  "INSERT INTO equipment_forms (recipient, issued_from, issue_date)
   VALUES (?, ?, ?)"
);
$stmt->bind_param(
  "sss",
  $_POST['recipient'],
  $_POST['issued_from'],
  $_POST['issue_date']
);
$stmt->execute();
$form_id = $conn->insert_id;

// Save equipment items
foreach ($_POST['qty'] as $i => $qty) {
  $desc = $_POST['description'][$i];
  $stmt = $conn->prepare(
    "INSERT INTO equipment_items (form_id, quantity, description)
     VALUES (?, ?, ?)"
  );
  $stmt->bind_param("iis", $form_id, $qty, $desc);
  $stmt->execute();
}

// Save signatures
function saveSignature($data, $role, $form_id, $conn) {
  $data = str_replace('data:image/png;base64,', '', $data);
  $data = base64_decode($data);

  $file = "signatures/{$role}_{$form_id}.png";
  file_put_contents($file, $data);

  $stmt = $conn->prepare(
    "INSERT INTO signatures (form_id, role, file_path)
     VALUES (?, ?, ?)"
  );
  $stmt->bind_param("iss", $form_id, $role, $file);
  $stmt->execute();
}

saveSignature($_POST['sig_prepared'], 'prepared', $form_id, $conn);
saveSignature($_POST['sig_checked'], 'checked', $form_id, $conn);
saveSignature($_POST['sig_approved'], 'approved', $form_id, $conn);
saveSignature($_POST['sig_received'], 'received', $form_id, $conn);

$conn->commit();

echo "Form saved successfully.<br>";
echo "<a href='generate_pdf.php?id=$form_id'>Generate PDF</a>";
