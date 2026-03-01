<?php
require_once __DIR__ . '/../config/authentication.php'; // ensures session and login check

// Get employee ID from session (already set in authentication.php)
$employee_id = isset($_SESSION['employee_id']) ? $_SESSION['employee_id'] : '';
?>

<style>
/* Navbar container */
.navbar {
    position: fixed; 
    top: 0;
    left: 0;
    width: 100%;         /* full width */
    min-width: 1000px;   /* optional if content is very wide */
    height: 60px;
    background-color: #324a63;
    color: orange;
    padding: 0 20px;
    font-family: Georgia, serif;
    display: flex;
    align-items: center;  /* vertical center */
    justify-content: space-between;
    z-index: 1000;
    box-shadow: 0 3px 6px rgba(0,0,0,0.2);
    box-sizing: border-box;
}

.navbar-left,
.navbar-right {
    display: flex;
    align-items: center;
}

.navbar-left a,
.navbar-right a {
    color: white;
    text-decoration: none;
    margin-left: 15px;
    font-size: 16px;
}

.navbar-left a:hover,
.navbar-right a:hover {
    color: #fd9002;
}

.logout-btn {
    background-color: #fd9002;
    padding: 6px 12px;
    border-radius: 5px;
    font-weight: bold;
}

.logout-btn:hover {
    background-color: #ffad33;
}
</style>

<div class="navbar">
    <div class="navbar-left">
        <a href="/ITD-Equipment-System/modules/homepage.php">Home</a>
        <!-- Add more links here if needed -->
    </div>

    <div class="navbar-right">
        <?php if ($employee_id): ?>
            Hi, <?php echo htmlspecialchars($employee_id); ?> |
        <?php endif; ?>
        <a class="logout-btn" href="/ITD-Equipment-System/Login/logout.php">Logout</a>
    </div>
</div>