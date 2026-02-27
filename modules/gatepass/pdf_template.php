<?php
ob_start();

/* LOGO */
$logo_path = 'C:/xampp/htdocs/ITD-Equipment-System/modules/gatepass/topsill.jpg';
$logo_base64 = base64_encode(file_get_contents($logo_path));
?>

<style>
body {
    font-family: Georgia, serif;
    font-size: 12px;
    color: #000;
    padding: 20px;
}

/* HEADER */
.header-table {
    width: 100%;
    margin-bottom: 10px;
}
.logo-cell { width: 20%; }
.center-cell { width: 60%; text-align: center; }
.company-name { font-size: 18px; font-weight: bold; }
.gatepass-title { font-size: 16px; font-weight: bold; margin-top: 3px; }

/* INFO */
.info-table { width: 100%; margin-top: 10px; margin-bottom: 15px; }
.info-table td { width: 50%; padding: 6px; }
.label { font-weight: bold; }
.value-box {
    border: 1px solid #000;
    padding: 6px;
    min-height: 18px;
}

/* EQUIPMENT TABLE */
.equipment-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 12px;
}
.equipment-table th,
.equipment-table td {
    border: 1px solid #000;
    padding: 6px;
    text-align: left;
}

/* SIGNATURES */
.signature-table {
    width: 100%;
    table-layout: fixed;
    margin-top: 20px;
}
.signature-table td {
    width: 25%;
    text-align: center;
    vertical-align: bottom;
    height: 120px;
}
.signature-line {
    border-bottom: 1px solid #000;
    width: 150px;
    margin: 5px auto;
}
</style>

<!-- HEADER -->
<table class="header-table">
<tr>
    <td class="logo-cell">
        <img src="data:image/jpg;base64,<?= $logo_base64 ?>" width="80">
    </td>

    <td class="center-cell">
        <div class="company-name">Toplis Solutions Incorporation</div>
        <div class="gatepass-title">GATE PASS</div>
    </td>

    <td style="width:20%;"></td>
</tr>
</table>

<hr>

<!-- HEADER DETAILS -->
<table class="info-table">
<tr>
    <td>
        <div class="label">Recipient:</div>
        <div class="value-box"><?= $form['recipient'] ?? '' ?></div>
    </td>

    <td>
        <div class="label">Business Unit:</div>
        <div class="value-box"><?= $form['business_unit'] ?? '' ?></div>
    </td>
</tr>

<tr>
    <td>
        <div class="label">From:</div>
        <div class="value-box"><?= $form['issued_from'] ?? '' ?></div>
    </td>

    <td>
        <div class="label">Date:</div>
        <div class="value-box"><?= $form['issue_date'] ?? '' ?></div>
    </td>
</tr>
</table>

<h4>Equipment Details</h4>

<table class="equipment-table">
<tr>
    <th style="width:15%;">QUANTITY</th>
    <th>DESCRIPTION</th>
</tr>

<?php if(!empty($items)): ?>
<?php foreach ($items as $item): ?>
<tr>
    <td><?= $item['quantity'] ?? '' ?></td>
    <td><?= $item['description'] ?? '' ?></td> 
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr><td colspan="2">No Items</td></tr>
<?php endif; ?>
</table>

<br>

<h4>Signatures</h4>

<table class="signature-table">
<tr>
<?php
$roles_order = [
    'prepared' => $form['name_prepared'] ?? '',
    'checked'  => $form['name_checked'] ?? '',
    'approved' => $form['name_approved'] ?? '',
    'received' => $form['name_received'] ?? ''
];

foreach ($roles_order as $role => $name):
?>
<td>
    <div style="height:40px;"></div>

    <div style="font-weight:bold; text-transform: uppercase;">
        <?= $name ?>
    </div>

    <div class="signature-line"></div>

    <div><?= strtoupper($role) ?> BY:</div>
</td>
<?php endforeach; ?>
</tr>
</table>

<?php
return ob_get_clean();
?>