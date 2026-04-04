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
    width: 400px;
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

/* SUCCESS MODAL OVERLAY */
.success-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.65);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

/* SUCCESS BOX (GLASS STYLE) */
.success-box {
    background: rgba(255, 255, 255, 0.05); 
    backdrop-filter: blur(25px);
    -webkit-backdrop-filter: blur(25px);

    padding: 45px 50px;
    border-radius: 20px;

    border: 1.5px solid rgba(40, 167, 69, 0.4);
    
    box-shadow: 
        0 0 20px rgba(40, 167, 69, 0.25),
        0 25px 60px rgba(0,0,0,0.6);

    text-align: center;
    animation: popUp 0.3s ease forwards;
}

.success-box h3 {
    margin-bottom: 12px;
    color: #4dff88;
    font-size: 24px;
    letter-spacing: 1px;
    text-shadow: 0 0 10px rgba(40, 167, 69, 0.6);
}

.success-box p {
    margin-bottom: 28px;
    font-size: 15px;
    color: #ffffff;
    opacity: 0.9;
}

.login-btn {
    display: inline-block;
    padding: 13px 32px;
    background: rgba(40, 167, 69, 0.2);
    border: 1px solid rgba(40, 167, 69, 0.6);
    backdrop-filter: blur(10px);

    color: #4dff88;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 600;
    letter-spacing: 0.8px;

    transition: all 0.3s ease;
}

.login-btn:hover {
    background: rgba(40, 167, 69, 0.4);
    box-shadow: 0 0 15px rgba(40, 167, 69, 0.6);
    transform: translateY(-3px);
}
/*additional 3102026*/
.login-container a {
            color: #fd9002;
            text-decoration: none;
            font-weight: bold;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
/* POP ANIMATION */
@keyframes popUp {
    from {
        transform: scale(0.7);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}
</style>

</head>
<body>

    <div class="login-container">
        <h2>REGISTER ACCOUNT</h2>

        <form method="POST">
            <input type="text" name="employee_id" placeholder="Employee ID" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
             <p>Already have account? <a href="login.php">Login Here</a></p>
        </form>

        <?php
            if ($error) echo "<p class='error'>$error</p>";
           if ($success) echo "
            <div class='success-modal'>
                <div class='success-box'>
                    <h3>Registration Successful 🎉</h3>
                    <p>Your account has been created successfully.</p>
                    <a href='login.php' class='login-btn'>Go to Login</a>
                </div>
            </div>";
        ?>
    </div>

</body>
</html>