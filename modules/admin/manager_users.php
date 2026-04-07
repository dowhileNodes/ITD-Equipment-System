<?php
require_once '../../config/authentication.php';
requireAdmin(); // only admins can access

require_once '../../config/db.php';
require_once __DIR__ . '/../../includes/navbar.php';

/* Fetch all users */
$result = $conn->query("SELECT id, employee_id, role FROM users");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Users</title>

<style>

/* ===== BACKGROUND SAME ===== */
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: url('viber_image_2026-02-24_11-08-29-685.jpg');
    background-size: cover;
    background-position: center;
}

/* BLUR */
body::before {
    content: "";
    position: fixed;
    top:0; left:0;
    width:100%; height:100%;
    backdrop-filter: blur(6px);
    z-index:-1;
}

/* WRAPPER */
.page-wrapper {
    display: flex;
    justify-content: center;
    padding: 100px 20px;
}

/* GLASS CONTAINER */
.container {
    width: 100%;
    max-width: 750px;
    background: smokewhite;
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.5);
    padding: 30px;
    color: white;
}

/* HEADER */
.container h2 {
    margin: 0;
    text-align: center;
    color: #fd9002;
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

/* TABLE WRAPPER */
.table-wrapper {
    margin-top: 20px;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid #ccc;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}

/* HEADER */
th {
    background: grey;
    color: white;
    padding: 12px;
    text-align: center;
    border: 1px solid #ccc; /* column lines */
    text-transform: uppercase;
    font-size: 12px;
}

/* CELLS */
td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd; /* row + column lines */
    color: #333;
}

/* ZEBRA */
tr:nth-child(even) td {
    background: #f9f9f9;
}

/* HOVER */
tr:hover td {
    background: #eef3f7;
}

/* SELECT */
select {
    padding: 5px 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-size: 12px;
}

/* BUTTON */
button {
    padding: 6px 10px;
    border-radius: 4px;
    border: none;
    background: #324a63;
    color: white;
    cursor: pointer;
}

button:hover {
    background: #fd9002;
}

</style>

</head>

<body>

<div class="page-wrapper">
<div class="container">

<h2>User Role Management</h2>

<div class="table-wrapper">
<table>
    <tr>
        <th>Employee ID</th>
        <th>Role</th>
        <th>Change Role</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['employee_id']) ?></td>
        <td><?= htmlspecialchars($row['role']) ?></td>
        <td>
            <form method="POST" action="./update_role.php">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <select name="role">
                    <option value="user" <?= $row['role'] == 'user' ? 'selected' : '' ?>>User</option>
                    <option value="admin" <?= $row['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>

                <button type="submit">Update</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>

</table>
</div>

</div>
</div>

</body>
</html>