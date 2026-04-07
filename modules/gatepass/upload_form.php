<?php
require_once __DIR__ . '/../../config/authentication.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../config/db.php';

$message = "";
$showPopup = false;

/* Session checker */
// Uncomment if needed
// if (!isset($_SESSION['employee_id'])) {
//     header("Location: ../Login/login.php");
//     exit;
// }

// Getting employee name
$employee_name = $_SESSION['employee_id'];

$stmt = $conn->prepare("SELECT name FROM employees WHERE employee_id=?");
$stmt->bind_param("s", $_SESSION['employee_id']);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

if ($employee && isset($employee['name'])) {
    $employee_name = $employee['name'];
}

// Form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $showPopup = true;

    // Check if the file is uploaded without errors
    if (!isset($_FILES['signed_file']) || $_FILES['signed_file']['error'] !== 0) {
        $message = "Upload failed. Please try again.";
    } else {

        $form_id = intval($_POST['form_id']);

        // Check if form exists in database
        $check = $conn->prepare("SELECT id FROM equipment_forms WHERE id = ?");
        $check->bind_param("i", $form_id);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows == 0) {
            $message = "Form ID not found in the system.";
        } else {

            // Allowed file extensions
            $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];

            // Get file extension and validate
            $uploadedFileName = basename($_FILES['signed_file']['name']);
            $extension = strtolower(pathinfo($uploadedFileName, PATHINFO_EXTENSION));

            if (!in_array($extension, $allowedExtensions)) {
                $message = "Invalid file type. Only PDF, JPG, JPEG, and PNG are allowed.";
            } else {

                // Expected file name format
                $expectedName = "Equipment_Form_" . $form_id . "." . $extension;

                if ($uploadedFileName !== $expectedName) {
                    $message = "Uploaded filename is incorrect. Expected: " . $expectedName;
                } else {

                    // path outside the project folder, dito masesave yung uploaded gatepass form
                    $uploadDir = "C:/ITD Inhouse folders/gatepass forms/";

                    // Create directory if it doesn't exist (in case it's not created already)
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0755, true);
                    }

                    $filePath = $uploadDir . $expectedName; // Absolute path on the system
                    $dbPath = "ITD Inhouse folders/gatepass forms/" . $expectedName; // Path na nagsesave sa db under signed_file_path column
                    //C:\ITD Inhouse folders\gatepass forms (uploads/gatepass)
                    // Move uploaded file to the new location
                    if (move_uploaded_file($_FILES['signed_file']['tmp_name'], $filePath)) {

                        // Update database with the file path
                        $stmt = $conn->prepare("UPDATE equipment_forms SET signed_file_path = ? WHERE id = ?");
                        $stmt->bind_param("si", $dbPath, $form_id);
                        $stmt->execute();

                        $message = "success";
                    } else {
                        $message = "Upload failed. There was an error uploading the file.";
                    }
                }
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Signed Gatepass</title>

<style>
body {
    font-family: Georgia, serif;
    background: url("viber_image_2026-02-24_11-08-29-685.jpg") no-repeat center center fixed;
    background-size: cover;
    padding: 40px;
}

.container {
    width: 400px;
    margin: auto;
    background: rgba(255, 255, 255, 0.85);
    padding: 20px 25px;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.5);
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
}

h2 { text-align:center; }
label { font-weight:bold; display:block; margin-top:10px; }

input, button {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
}

button {
    background:black;
    color:white;
    border:none;
    font-weight:bold;
}

button:hover { background:#fd9002; }

.popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px 40px;
    font-size: 18px;
    border-radius: 8px;
    color: white;
    font-weight: bold;
    z-index: 9999;
    opacity: 0;
    animation: fadeInOut 4s forwards;
    pointer-events: none;
}

.success { background: green; }
.failed  { background: red; }

@keyframes fadeInOut {
    0% { opacity: 0; }
    10% { opacity: 1; }
    90% { opacity: 1; }
    100% { opacity: 0; }
}

</style>
</head>

<body>

<div class="container">
    <h2>Upload Signed Gatepass</h2>

    <form method="POST" enctype="multipart/form-data">
        <label>Gatepass ID:</label>
        <input type="number" name="form_id" required>

        <label>Select Signed File:</label>
        <input type="file" name="signed_file" accept=".pdf,.jpg,.jpeg,.png" required>

        <button type="submit">UPLOAD</button>
    </form>
</div>

<!-- Popup Message -->
<?php if($showPopup) { ?>
    <div class="popup <?php echo $message == "success" ? 'success' : 'failed'; ?>">
        <?php echo $message == "success" ? "Signed gatepass uploaded successfully" : $message; ?>
    </div>
<?php } ?>

</body>
</html>