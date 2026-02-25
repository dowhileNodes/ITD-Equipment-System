<?php
require_once __DIR__ . '/../../config/db.php';

$conn->begin_transaction();

try {

    // mainform 
    $stmt = $conn->prepare(
        "INSERT INTO equipment_forms
        (recipient, business_unit, issued_from, issue_date,
         name_prepared, name_checked, name_approved, name_received)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssssssss",
        $_POST['recipient'],
        $_POST['business_unit'],
        $_POST['issued_from'],
        $_POST['issue_date'],
        $_POST['name_prepared'],
        $_POST['name_checked'],
        $_POST['name_approved'],
        $_POST['name_received']
    );

    $stmt->execute();
    $form_id = $conn->insert_id;

    // equipment items
    if (!empty($_POST['qty']) && is_array($_POST['qty'])) {

        foreach ($_POST['qty'] as $i => $qty) {

            
            $desc = isset($_POST['description_items'][$i]) ? $_POST['description_items'][$i] : '';

            
            $qty  = trim($qty);
            $desc = trim($desc);

            
            if ($qty === '' && $desc === '') {
                continue;
            }

            $stmt = $conn->prepare(
                "INSERT INTO equipment_items (form_id, quantity, description)
                 VALUES (?, ?, ?)"
            );

            $stmt->bind_param("iss", $form_id, $qty, $desc);
            $stmt->execute();
        }
    }

    // signatures
    function saveSignature($data, $role, $form_id, $conn) {
        if (empty($data)) return;

        $data = str_replace('data:image/png;base64,', '', $data);
        $data = str_replace(' ', '+', $data);
        $data = base64_decode($data);

        $dir = __DIR__ . "/signatures/";
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $file = $dir . "{$role}_{$form_id}.png";
        file_put_contents($file, $data);

        $stmt = $conn->prepare(
            "INSERT INTO signatures (form_id, role, file_path)
             VALUES (?, ?, ?)"
        );

        $stmt->bind_param("iss", $form_id, $role, $file);
        $stmt->execute();
    }

    saveSignature($_POST['sig_prepared'] ?? '', 'prepared', $form_id, $conn);
    saveSignature($_POST['sig_checked'] ?? '', 'checked', $form_id, $conn);
    saveSignature($_POST['sig_approved'] ?? '', 'approved', $form_id, $conn);
    saveSignature($_POST['sig_received'] ?? '', 'received', $form_id, $conn);

    // commit
    $conn->commit();

    echo "Form saved successfully.<br>";
    echo "<a href='generate_pdf.php?id=$form_id'>Generate PDF</a>";

} catch (Exception $e) {

    $conn->rollback();
    echo "Error saving form: " . $e->getMessage();
}

$conn->close();
?>