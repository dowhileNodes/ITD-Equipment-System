<?php
require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../config/authentication.php';
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../includes/navbar.php';

/* GET EMPLOYEE NAME (fallback to employee_id) */
$employee_name = $_SESSION['employee_id'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard - Gate Pass System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

/* =========================
   GLOBAL RESET
========================= */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    width: 100%;
    overflow-x: hidden;
}

body {
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background: linear-gradient(rgba(0,0,0,0.78), rgba(0,0,0,0.78)),
                url('viber_image_2026-02-24_11-08-29-685.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}



/* =========================
   CONTENT
========================= */
.container {
    padding: 150px 60px 60px 60px;
}

h2 {
    margin-bottom: 45px;
    color: #ffffff;
    font-size: 34px;
    letter-spacing: 1.2px;
    text-align: center;
}

.card-container {
    display: flex;
    justify-content: center;
    gap: 55px;
    flex-wrap: wrap;
}

.card {
    background: rgba(255, 255, 255, 0.09);
    width: 330px;           
    padding: 38px 28px;
    border-radius: 22px;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.25);
    box-shadow: 0 18px 40px rgba(0,0,0,0.65);
    text-align: center;
    transition: all 0.4s ease;

    display: flex;
    flex-direction: column;
}

.card:hover {
    transform: translateY(-14px);
    box-shadow: 0 30px 60px rgba(0,0,0,0.75);
}

.card h3 {
    margin-bottom: 10px;
    color: #ffffff;
    font-size: 23px;
}

.card p {
    margin-bottom: 20px;
    color: #e5e5e5;
    font-size: 14px;
    flex: 1;
}

/* =========================
   BUTTON
========================= */
.card a {
    text-decoration: none;
    display: inline-block;
    padding: 13px 32px;
    background: linear-gradient(45deg, #fd9002, #ffb347);
    color: white;
    border-radius: 12px;
    font-size: 14px;
    font-weight: bold;
    transition: 0.3s;
    align-self: center; 
    margin-top: auto; 
}

.card a:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.6);
}

.welcome-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    background: rgba(0,0,0,0.65);

    display: flex;
    justify-content: center;
    align-items: center;

    z-index: 5000;
}

.welcome-content {
    background: rgba(255, 255, 255, 0.10);
    backdrop-filter: blur(25px);
    -webkit-backdrop-filter: blur(25px);

    padding: 50px 60px;
    border-radius: 22px;

    border: 1px solid rgba(255,255,255,0.25);

    box-shadow: 0 25px 60px rgba(0,0,0,0.7);

    text-align: center;
    animation: popIn 0.4s ease;
}

.welcome-content h2 {
    color: #ffffff;
    margin-bottom: 15px;
    font-size: 28px;
    letter-spacing: 1px;
}

.welcome-content p {
    color: #e5e5e5;
    font-size: 15px;
}

.welcome-content button {
    margin-top: 25px;
    padding: 12px 30px;

    background: linear-gradient(45deg, #fd9002, #ffb347);
    border: none;
    border-radius: 12px;

    color: white;
    font-weight: bold;
    font-size: 14px;

    cursor: pointer;
    transition: 0.3s;
}

.welcome-content button:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.6);
}

@keyframes popIn {
    from { transform: scale(0.85); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

</style>
</head>

<body>

<?php if (isset($_SESSION['show_welcome']) && $_SESSION['show_welcome'] === true): ?>
<div id="welcomeModal" class="welcome-modal">
    <div class="welcome-content">
        <h2>Welcome, <?php echo htmlspecialchars($employee_name); ?> 👋</h2>
        <p>You have successfully logged in.</p>
        <button onclick="closeWelcome()">Continue</button>
    </div>
</div>
<?php unset($_SESSION['show_welcome']); ?>
<?php endif; ?>


<div class="container">

    <h2>System Modules</h2>

    <div class="card-container">

        <!-- Gate Pass Card -->
        <div class="card">
            <h3>Gate Pass</h3>
            <p>Create and manage equipment gate pass.</p>
            <a href="<?php echo BASE_URL; ?>/modules/gatepass/gatepass.php">Open</a>
        </div>

        <!-- Borrow Card -->
        <div class="card">
            <h3>Borrow</h3>
            <p>Borrow equipment request form.</p>
            <a href="<?php echo BASE_URL; ?>/modules/borrowing/index.php">Open</a>
        </div>

        <!-- Learn More Card -->
        <div class="card">
            <h3>Learn More</h3>
            <p>Click here to know more about tech</p>
            <a href="<?php echo BASE_URL; ?>/modules/uploads/videos.php">Open</a>
        </div>
         <!-- Diagnostic Report -->
           <div class="card">
                <h3>DIAGNOSTIC REPORT</h3>
                <p>Manage equipment diagnostic reports.</p>
                <div class="card-slider"></div>
                <a href="<?php echo BASE_URL; ?>/modules/diagnostic/diagnostic.php">Open</a>
        </div>
         <!-- Manage user as Admin -->
        <div class="card">
            <h3>Manage Users</h3>
            <p>Click Here to Manage user</p>
            <a href="<?php echo BASE_URL; ?>/modules/admin/manager_users.php">Open</a>
        </div>
         <!-- Service Report -->
        <div class="card">
            <h3>Service Report</h3>
            <p>Service Report</p>
            <a href="<?php echo BASE_URL; ?>/modules/admin/service_report.php">Open</a>
        </div>

    </div>
</div>

<script>
function closeWelcome() {
    document.getElementById("welcomeModal").style.display = "none";
}

/* Slider Script (UNCHANGED) */
const sliders = document.querySelectorAll('.card-slider');

sliders.forEach(slider => {
    const images = slider.querySelectorAll('img');
    let index = 0;

    setInterval(() => {
        images[index].classList.remove('active');
        index = (index + 1) % images.length;
        images[index].classList.add('active');
    }, 2500);
});
</script>

</body>
</html>