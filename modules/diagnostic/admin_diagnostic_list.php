<?php
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../config/authentication.php';
require_once __DIR__ . '/../../includes/navbar.php';
requireLogin();

if ($_SESSION['role'] !== 'admin') {
    die("Unauthorized access");
}

$result = $conn->query("SELECT * FROM diagnostic_reports ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Diagnostic Reports</title>
</head>
<body>
<h2>All Diagnostic Reports</h2>
<table border="1" cellpadding="8" cellspacing="0">
<tr>
<th>ID</th>
<th>Issued To</th>
<th>Issue Date</th>
<th>Item Description</th>
<th>Problem</th>
<th>Recommendation</th>
<th>Actions</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['issued_to']) ?></td>
    <td><?= $row['issue_date'] ?></td>
    <td><?= htmlspecialchars($row['item_description']) ?></td>
    <td><?= htmlspecialchars($row['problem']) ?></td>
    <td><?= htmlspecialchars($row['recommendation']) ?></td>
    <td>
        <a href="print_diagnostic.php?id=<?= $row['id'] ?>" target="_blank">Print / PDF</a>
    </td>
</tr>
<?php endwhile; ?>

</table>
</body>
</html>