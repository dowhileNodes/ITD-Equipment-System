<?php
session_start();
require_once '../config/db.php'; // adjust path as needed

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = trim($_POST['employee_id']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Check if employee_id already exists in users table
        $stmt = $conn->prepare("SELECT * FROM users WHERE employee_id=?");
        $stmt->bind_param("s", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Employee ID already registered!";
        } else {
            // Insert new user
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (employee_id, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $employee_id, $hashed_password);
            if ($stmt->execute()) {
                $success = "Registration successful! <a href='login.php'>Login here</a>";
            } else {
                $error = "Error registering user.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="login-container">
        <h2>Register</h2>
        <form method="POST">
            <input type="text" name="employee_id" placeholder="Employee ID" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
        <?php 
            if ($error) echo "<p class='error'>$error</p>";
            if ($success) echo "<p class='success'>$success</p>";
        ?>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>