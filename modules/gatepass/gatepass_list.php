<?php
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../config/authentication.php';
require_once __DIR__ . '/../../includes/navbar.php';
requireLogin();
requireAdmin();
$search = $_GET['search'] ?? '';
$business_unit = $_GET['business_unit'] ?? '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
//echo "Filter value: [" . $business_unit . "]";
//exit;

$limit = 10;
$offset = ($page - 1) * $limit;

/* where condition*/
$where = [];
$params = [];
$types = "";

if (!empty($search)) {
    $where[] = "(f.recipient LIKE ? OR f.issued_from LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $types .= "ss";
}

if (!empty($business_unit)) {
    $where[] = "LOWER(f.business_unit) = LOWER(?)";//case insensitive
    $params[] = $business_unit;
    $types .= "s";
}

$whereSQL = $where ? "WHERE " . implode(" AND ", $where) : "";

//pagination count
$countSQL = "SELECT COUNT(*) as total FROM equipment_forms f $whereSQL";
$stmt = $conn->prepare($countSQL);

if ($params) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$total = $stmt->get_result()->fetch_assoc()['total'];
$total_pages = ceil($total / $limit);

//join query -- equipment_forms, equipment_items
$sql = "
SELECT 
    f.id,
    f.recipient,
    f.issued_from,
    f.issue_date,
    f.business_unit,
    f.name_prepared,
    f.name_checked,
    f.name_approved,
    f.name_received,
    i.quantity,
    i.description
FROM equipment_forms f
LEFT JOIN equipment_items i ON f.id = i.id
$whereSQL
ORDER BY f.id DESC
LIMIT ? OFFSET ?
";

$stmt = $conn->prepare($sql);

if ($params) {
    $types .= "ii";
    $params[] = $limit;
    $params[] = $offset;
    $stmt->bind_param($types, ...$params);
} else {
    $stmt->bind_param("ii", $limit, $offset);
}

$stmt->execute();
$result = $stmt->get_result();

/* group data form */
$data = [];

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];

    if (!isset($data[$id])) {
        $data[$id] = [
            'recipient' => $row['recipient'],
            'issued_from' => $row['issued_from'],
            'issue_date' => $row['issue_date'],
            'business_unit' => $row['business_unit'],
            'name_prepared' => $row['name_prepared'],
            'name_checked' => $row['name_checked'],
            'name_approved' => $row['name_approved'],
            'name_received' => $row['name_received'],
            'items' => []
        ];
    }

    if ($row['quantity'] !== null) {
        $data[$id]['items'][] = [
            'quantity' => $row['quantity'],
            'description' => $row['description']
        ];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Gate Pass Records</title>

<style>
body {
    font-family: Arial;
    background: #f4f4f4;
    padding: 20px;
    padding-top: 80px;
}

.container {
    background: #fff;
    padding: 20px;
    border: 1px solid #000;
}

.filter-box {
    margin-bottom: 10px;
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

input, select, button {
    padding: 6px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

th, td {
    border: 1px solid #000;
    padding: 8px;
    font-size: 14px;
}

th {
    background: #ddd;
}

.pagination {
    margin-top: 15px;
}

.pagination a {
    padding: 6px 10px;
    border: 1px solid #000;
    margin-right: 5px;
    text-decoration: none;
}

button {
    cursor: pointer;
}
</style>

</head>
<body>

<div class="container">

<h2>Gate Pass Records</h2>

<form method="GET" class="filter-box">
    <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">

    <select name="business_unit">
        <option value="">All Units</option>
        <option value="itd" <?= $business_unit == 'itd' ? 'selected' : '' ?>>IT Department</option>
        <option value="tli" <?= $business_unit == 'tli' ? 'selected' : '' ?>>Toplis Logistics</option>
        <option value="tsi" <?= $business_unit == 'tsi' ? 'selected' : '' ?>>Toplis Solutions</option>
        <option value="kmc" <?= $business_unit == 'kmc' ? 'selected' : '' ?>>Kabraso</option>
        <option value="totc" <?= $business_unit == 'totc' ? 'selected' : '' ?>>TOTC</option>
    </select>

    <button type="submit">Filter</button>

    <button type="submit" formaction="export.php">
        Export CSV
    </button>

    <!--<button type="submit" formaction="export_excel.php">
        Export Excel
    </button>-->
</form>

<table>
<thead>
<tr>
    <th>ID</th>
    <th>Recipient</th>
    <th>From</th>
    <th>Date</th>
    <th>Business Unit</th>
    <th>Items</th>
    <th>Prepared</th>
    <th>Checked</th>
    <th>Approved</th>
    <th>Received</th>
</tr>
</thead>

<tbody>

<?php foreach ($data as $id => $form): ?>

<tr>
    <td><?= $id ?></td>
    <td><?= $form['recipient'] ?></td>
    <td><?= $form['issued_from'] ?></td>
    <td><?= $form['issue_date'] ?></td>
    <td><?= $form['business_unit'] ?></td>

    <td>
        <button type="button" onclick="toggleItems(<?= $id ?>)">
            View Items
        </button>
    </td>

    <td><?= $form['name_prepared'] ?></td>
    <td><?= $form['name_checked'] ?></td>
    <td><?= $form['name_approved'] ?></td>
    <td><?= $form['name_received'] ?></td>
</tr>

<tr id="items-<?= $id ?>" style="display:none; background:#f9f9f9;">
    <td colspan="10">

        <strong>Items:</strong><br><br>

        <?php if (count($form['items']) > 0): ?>

        <table>
            <thead>
                <tr>
                    <th style="width:20%">Qty</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($form['items'] as $item): ?>
                <tr>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= $item['description'] ?></td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

        <?php else: ?>
            No items found.
        <?php endif; ?>

    </td>
</tr>

<?php endforeach; ?>

</tbody>
</table>

<div class="pagination">
<?php for ($i = 1; $i <= $total_pages; $i++): ?>
    <a href="?page=<?= $i ?>&search=<?= $search ?>&business_unit=<?= $business_unit ?>">
        <?= $i ?>
    </a>
<?php endfor; ?>
</div>

</div>

<script>
function toggleItems(id) {
    const row = document.getElementById('items-' + id);
    row.style.display = (row.style.display === 'none') ? 'table-row' : 'none';
}
</script>

</body>
</html>