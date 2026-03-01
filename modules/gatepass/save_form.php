<?php
require_once __DIR__ . '/../../config/authentication.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../config/db.php';
//for checking
//var_dump($_POST);
//die();
/*session checker
session_start();
if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
    exit();
}*/

// Start transaction
$conn->begin_transaction();

try {
    //for equipment_form
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

    // Get the new form ID for linking items
    $form_id = $conn->insert_id;

  //for items row
    if (!empty($_POST['qty']) && is_array($_POST['qty'])) {
        foreach ($_POST['qty'] as $i => $qty) {
            $desc = $_POST['description_items'][$i] ?? '';

            // Skip empty rows
            if (trim($qty) === '' && trim($desc) === '') continue;

            $stmt = $conn->prepare(
                "INSERT INTO equipment_items (form_id, quantity, description) VALUES (?, ?, ?)"
            );
            $stmt->bind_param("iss", $form_id, $qty, $desc);
            $stmt->execute();
        }
    }

    // Commit transaction
    $conn->commit();
    //for fixing, navbar overlaps the content of this
echo "<br><br><br>";
    echo "Form saved successfully.<br>";
    echo "<a href='generate_pdf.php?id=$form_id'>Generate PDF</a>";
    //additional button
    echo "<br>";    
    echo "<a href='upload_form.php'>upload form</a>";

} catch (Exception $e) {
    $conn->rollback();
    echo "Error saving form: " . $e->getMessage();
}

// Close connection
$conn->close();
?>