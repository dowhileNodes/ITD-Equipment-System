<?php
session_start();
require_once '../config/db.php';

$error = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = trim($_POST['employee_id']);
    $password = $_POST['password'];

    // Check if employee is registered
    $stmt = $conn->prepare("SELECT * FROM users WHERE employee_id=?");
    $stmt->bind_param("s", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['employee_id'] = $user['employee_id'];
            header("Location: ../modules/homepage.php");
            //C:\xampp\htdocs\ITD-Equipment-System\modules\homepage.php
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Employee not registered.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="employee_id" placeholder="Employee ID" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <?php if ($error) echo "<p class='error'>$error</p>"; ?>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>