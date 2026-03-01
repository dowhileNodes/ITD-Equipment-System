<?php
// admin_borrow.php
require_once __DIR__ . '/../../config/db.php';
//session checker
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
// fetching all records from form
$sql = "SELECT * FROM it_equipment_logs ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>IT Equipment Admin Dashboard</title>

<style>

/* BACKGROUND */
body {
    font-family: Arial, sans-serif;
    padding: 20px;
    background: url('viber_image_2026-02-24_11-08-29-685.jpg') no-repeat center center fixed;
    background-size: cover;
}

/* GLASS CONTAINER */
.container {
    max-width: 100%;
    margin: auto;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(6px);
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 12px;
    padding: 20px;
    color: #000;
}

/* TITLE */
h2 { 
    text-align: center;
    color: white;
    margin-bottom: 15px;
}

/* TABLE */
table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 10px;
    background: rgba(255,255,255,0.85);
}

th, td {
    border: 1px solid rgba(255,255,255,0.6);
    padding: 8px;
    text-align: left;
}

th {
    background: rgba(255,255,255,0.7);
    font-weight: bold;
}

tr:nth-child(even) {
    background: rgba(255,255,255,0.5);
}

tr:hover {
    background: rgba(255,255,255,0.9);
}

</style>
</head>

<body>

<div class="container">

<h2>IT Equipment Dashboard</h2>

<table>
<tr>
    <th>ID</th>
    <th>Email</th>
    <th>Borrower</th>
    <th>Business Unit</th>
    <th>Item ID</th>
    <th>Action</th>
    <th>Items</th>
    <th>Borrow Date</th>
    <th>Return Date</th>
    <th>Submitted At</th>
</tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['email']}</td>
            <td>{$row['borrower_name']}</td>
            <td>{$row['business_unit']}</td>
            <td>{$row['item_id']}</td>
            <td>{$row['action']}</td>
            <td>{$row['items']}</td>
            <td>{$row['borrow_date']}</td>
            <td>{$row['return_date']}</td>
            <td>{$row['created_at']}</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='10'>No records found</td></tr>";
}
$conn->close();
?>

</table>

</div>

</body>
</html>