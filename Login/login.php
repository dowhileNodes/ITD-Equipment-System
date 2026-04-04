<?php
session_start();
require_once '../config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = trim($_POST['employee_id']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE employee_id=?");
    $stmt->bind_param("s", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {

            $_SESSION['employee_id'] = $user['employee_id'];

            // ✅ Trigger welcome popup (one time only)
            $_SESSION['show_welcome'] = true;

            header("Location: ../modules/homepage/homepage.php");
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

    <style>
        body {
            margin: 0;
            font-family: Georgia, serif;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                        url('viber_image_2026-02-24_11-08-29-685.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .login-container {
            width: 380px;
            padding: 40px 35px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 18px;
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 25px;
            letter-spacing: 2px;
        }

        .login-container input {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border-radius: 8px;
            border: none;
            font-size: 14px;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background: #324a63;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-container button:hover {
            background: #fd9002;
            transform: translateY(-2px);
        }

        .error {
            margin-top: 15px;
            background: #dc3545;
            padding: 8px;
            border-radius: 6px;
            font-size: 14px;
        }

        .login-container p {
            margin-top: 18px;
            font-size: 13px;
        }

        .login-container a {
            color: #fd9002;
            text-decoration: none;
            font-weight: bold;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

    </style>

</head>
<body>

    <div class="login-container">
        <h2>ITD EQUIPMENT SYSTEM</h2>

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