<?php
//session_start();
require_once __DIR__ . '/../config/app.php';            // BASE_URL and BASE_PATH
require_once __DIR__ . '/../config/authentication.php'; // session check
require_once __DIR__ . '/../config/db.php';             // database connection
require_once __DIR__ . '/../includes/navbar.php'; //navbar

/*Protect page
if (!isset($_SESSION['employee_id'])) {
    header("Location: ../Login/login.php");
    exit;
}*/

/* Get employee name for display
$employee_name = $_SESSION['employee_id']; // default fallback
$stmt = $conn->prepare("SELECT name FROM employees WHERE employee_id=?");
$stmt->bind_param("s", $_SESSION['employee_id']);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();
if ($employee && isset($employee['name'])) {
    $employee_name = $employee['name'];
}*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Video Page</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                        url('viber_image_2026-02-24_11-08-29-685.jpg');
            background-size: cover;
            background-position: center;
        }
        .container {
            padding: 40px;
            text-align: center;
            color: white;
        }
        iframe {
            margin-top: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Embedded Video</h2>
  <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
  <iframe width="560" height="315" src="https://www.youtube.com/embed/NUTGr5t3MoY?si=XxjpvQ36hUny2pZY" 
    title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</div>
</div>

</body>
</html>