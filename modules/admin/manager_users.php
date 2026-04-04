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
</head>
<body>

<h2>User Role Management</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>employee_id</th>
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

</body>
</html>