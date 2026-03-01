<?php
require_once __DIR__ . '/../../config/authentication.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../config/db.php';

$message = "";
$showPopup = false;

/*session checker
if (!isset($_SESSION['employee_id'])) {
    header("Location: ../Login/login.php");
    exit;
}*/

//getting employee name
$employee_name = $_SESSION['employee_id'];

$stmt = $conn->prepare("SELECT name FROM employees WHERE employee_id=?");
$stmt->bind_param("s", $_SESSION['employee_id']);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

if ($employee && isset($employee['name'])) {
    $employee_name = $employee['name'];
}

//form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $showPopup = true;

    if (!isset($_FILES['signed_file']) || $_FILES['signed_file']['error'] !== 0) {
        $message = "Upload failed";
    } else {

        $form_id = intval($_POST['form_id']);

        // Check if form exists
        $check = $conn->prepare("SELECT id FROM equipment_forms WHERE id = ?");
        $check->bind_param("i", $form_id);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows == 0) {
            $message = "Upload failed";
        } else {

            $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];

            $uploadedFileName = basename($_FILES['signed_file']['name']);
            $extension = strtolower(pathinfo($uploadedFileName, PATHINFO_EXTENSION));

            if (!in_array($extension, $allowedExtensions)) {
                $message = "Upload failed";
            } else {

                // Expected file name
                $expectedName = "Equipment_Form_" . $form_id . "." . $extension;

                if ($uploadedFileName !== $expectedName) {
                    $message = "Uploaded filename is incorrect";
                } else {

                    // Absolute upload directory (SAFE)
                    $uploadDir = __DIR__ . "/uploads/gatepass/";

                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0755, true);
                    }

                    $filePath = $uploadDir . $expectedName;
                    $dbPath = "uploads/gatepass/" . $expectedName; // Path saved in DB

                    if (move_uploaded_file($_FILES['signed_file']['tmp_name'], $filePath)) {

                        $stmt = $conn->prepare("
                            UPDATE equipment_forms
                            SET signed_file_path = ?
                            WHERE id = ?
                        ");
                        $stmt->bind_param("si", $dbPath, $form_id);
                        $stmt->execute();

                        $message = "success";
                    } else {
                        $message = "Upload failed";
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

button:hover { background:#333; }

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

<!--<div class="navbar">
    <span>Toplis Solutions Incorporation - Dashboard</span>
    <span>
        hi, <?php echo htmlspecialchars($employee_name); ?> |
        <a class="logout-btn" href="../Login/logout.php">Logout</a>
    </span>
</div>-->

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

<?php if($showPopup && $message == "success") { ?>
<div class="popup success">Signed gatepass uploaded successfully</div>
<?php } elseif($showPopup) { ?>
<div class="popup failed"><?php echo $message; ?></div>
<?php } ?>

</body>
</html>