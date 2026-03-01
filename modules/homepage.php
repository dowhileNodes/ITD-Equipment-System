<?php
//session_start();
require_once __DIR__ . '/../config/app.php';            // BASE_URL and BASE_PATH
require_once __DIR__ . '/../config/authentication.php'; // session check
require_once __DIR__ . '/../config/db.php';             // database connection
require_once __DIR__ . '/../includes/navbar.php'; //navbar

/* Protect the page
if (!isset($_SESSION['employee_id'])) {
    header("Location: ../Login/login.php");
    exit;
}

//getting employee code/id
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
    <title>Dashboard - Gate Pass System</title>

    <style>
      body {
        margin: 0;
        font-family: sans-serif;
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                    url('viber_image_2026-02-24_11-08-29-685.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
      }

      
      .navbar {
          background-color: #324a63;
          color: orange;
          padding: 13px 20px;
          font-size: 25px;
          font-weight: bold;
          font-family: Georgia, serif;
          display: flex;
          justify-content: space-between;
          align-items: center;
      }

      .logout-btn {
          font-size: 16px;
          color: white;
          background-color: #fd9002;
          padding: 8px 15px;
          border-radius: 5px;
          text-decoration: none;
      }

      .logout-btn:hover {
          background-color: #ffad33;
      }

     
      .container {
          padding: 60px 40px;
      }

      h2 {
          margin-bottom: 30px;
          color: white;
      }

     
      .card-container {
          display: flex;
          gap: 30px;
          flex-wrap: wrap;
      }

      .card {
          background: rgba(255, 255, 255, 0.1);
          width: 280px;
          padding: 40px 30px;
          border-radius: 15px;
          backdrop-filter: blur(10px);
          -webkit-backdrop-filter: blur(10px);
          border: 1px solid rgba(255,255,255,0.3);
          box-shadow: 0 8px 20px rgba(0,0,0,0.3);
          text-align: center;
          transition: 0.3s;
      }

      .card:hover {
          transform: translateY(-5px);
      }

      .card h3 {
          margin-bottom: 20px;
          color: #ffffff;
          font-size: 22px;
      }

      .card p {
          margin-bottom: 20px;
          color: #f1f1f1;
      }

      .card a {
          text-decoration: none;
          display: inline-block;
          padding: 12px 25px;
          background-color: #fd9002;
          color: white;
          border-radius: 5px;
          font-size: 14px;
      }

      .card a:hover {
          background-color: #ffad33;
      }
    </style>
</head>

<body>

<div class="navbar">
    <span>Toplis Solutions Incorporation - Dashboard</span>
    <span>
        hi, <?php echo htmlspecialchars($employee_name); ?> |
        <a class="logout-btn" href="../Login/logout.php">Logout</a>
    </span>
</div>

<div class="container">
    <h2>System Modules</h2>

    <div class="card-container">

        <div class="card">
            <h3>Gate Pass</h3>
            <p>Create and manage equipment gate pass.</p>
            <a href="gatepass/test.php">Open</a>
        </div>

        <div class="card">
            <h3>Borrow</h3>
            <p>Borrow equipment request form.</p>
            <a href="borrowing/index.php">Open</a>
        </div>

<!--for videos-->
    <div class="card">
            <h3>Learn More</h3>
            <p>Click here to know more about tech</p>
            <a href="<?php echo BASE_URL; ?>/modules/videos.php">Open</a>
<!--C:\xampp\htdocs\ITD-Equipment-System\modules\videos.php-->
        </div>

    </div>
</div>

</body>
</html>