<?php
require_once __DIR__ . '/../../config/db.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $form_id = intval($_POST['form_id']);

    // Check if form exists
    $check = $conn->prepare("SELECT id FROM equipment_forms WHERE id = ?");
    $check->bind_param("i", $form_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows == 0) {
        $message = "Invalid Gatepass ID.";
    } else {

        $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
        $extension = strtolower(pathinfo($_FILES['signed_file']['name'], PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions)) {
            $message = "Invalid file type.";
        } else {

            $uploadDir = "uploads/gatepass/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $fileName = "gatepass_" . $form_id . "." . $extension;
            $filePath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['signed_file']['tmp_name'], $filePath)) {

                $stmt = $conn->prepare("
                    UPDATE equipment_forms
                    SET signed_file_path = ?
                    WHERE id = ?
                ");
                $stmt->bind_param("si", $filePath, $form_id);
                $stmt->execute();

                $message = "Signed gatepass uploaded successfully.";
            } else {
                $message = "Upload failed.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Signed Gatepass</title>
</head>
<body>

<h2>Upload Signed Gatepass</h2>

<form method="POST" enctype="multipart/form-data">
    Gatepass ID:
    <input type="number" name="form_id" required>
    <br><br>

    Select Signed File:
    <input type="file" name="signed_file" accept=".pdf,.jpg,.jpeg,.png" required>
    <br><br>

    <button type="submit">Upload</button>
</form>

<br>
<strong><?php echo $message; ?></strong>

</body>
</html>
