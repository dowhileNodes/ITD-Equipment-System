<?php
// admin.php

// database connection
$conn = new mysqli("localhost", "root", "", "it_equipment_db");
if ($conn->connect_error) {
    die("Database connection failed");
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
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>

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

</body>
</html>
