<?php
ob_start();

// LOGO
$logoPath = 'C:\\xampp\\htdocs\\ITD-Equipment-System\\modules\\gatepass\\toplis.jpg';

if (file_exists($logoPath)) {
    $logoData = base64_encode(file_get_contents($logoPath));
    $logoSrc = 'data:image/jpeg;base64,' . $logoData;
} else {
    $logoSrc = '';
}

$formID = isset($form['id']) ? htmlspecialchars($form['id']) : 'N/A';
?>

<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
    }

    .container {
        width: 100%;
        padding: 15px;
    }

    /* HEADER */
    .header {
        position: relative;
        margin-bottom: 25px;
        padding-bottom: 10px;
    }

    .logo {
        float: left;
    }

    .logo img {
        width: 120px;
    }

    .title {
        text-align: center;
        position: relative;
        left: -20px; /* adjust value */
    }

    .title h2 {
        margin: 0;
        font-size: 16px;
        font-weight: bold;
    }

    .title h3 {
        margin: 2px 0 0 0;
        font-size: 14px;
        letter-spacing: 2px;
    }

    /* form ID*/
    .form-id {
        position: absolute;
        top: 10px;
        right: 15px;
        font-weight: bold;
        font-size: 13px;
    }

    .clear {
        clear: both;
    }

    /* details section */
    .info-section {
        width: 100%;
        margin-top: 20px;
        margin-bottom: 10px;
        font-size: 13px;
    }

    .info-left,
    .info-right {
        width: 48%;
        display: inline-block;
        vertical-align: top;
    }

    .info-right {
        float: right;
    }

    .info-row {
        margin-bottom: 8px;
    }

    .field-label {
        display: inline-block;
        width: 130px;
        font-weight: bold;
    }

    /* table */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    table, th, td {
        border: 1px solid #000;
    }

    th, td {
        padding: 6px;
        font-size: 12px;
    }

    /* signatures section */
    .sign-section {
        margin-top: 25px;
        width: 100%;
    }

    .sign-box {
        width: 48%;
        float: left;
    }

    .sign-field {
        padding: 10px;
        margin-bottom: 10px;
    }
</style>

<div class="container">

    <!-- HEADER -->
    <div class="header">

        <div class="logo">
            <img src="<?= $logoSrc ?>" alt="Toplis Logo">
        </div>

        <div class="title">
            <h2>Toplis Solutions Incorporation</h2>
            <h3>GATE PASS</h3>
        </div>

        <div class="form-id">
            Form ID: <?= $formID ?>
        </div>

        <div class="clear"></div>
    </div>

    <!-- INFO -->
    <div class="info-section">

        <div class="info-left">
            <div class="info-row">
                <span class="field-label">TO:</span>
                <?= htmlspecialchars($form['recipient'] ?? '-') ?>
            </div>

            <div class="info-row">
                <span class="field-label">FROM:</span>
                <?= htmlspecialchars($form['issued_from'] ?? '-') ?>
            </div>
        </div>

        <div class="info-right">
            <div class="info-row">
                <span class="field-label">DATE:</span>
                <?= htmlspecialchars($form['issue_date'] ?? '-') ?>
            </div>

            <div class="info-row">
                <span class="field-label">Business Unit:</span>
                <?= htmlspecialchars($form['business_unit'] ?? '-') ?>
            </div>
        </div>

        <div style="clear:both;"></div>
    </div>

    <!-- ITEMS -->
    <table>
        <thead>
            <tr>
                <th width="15%">QTY</th>
                <th width="85%">DESCRIPTION</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['quantity']) ?></td>
                <td><?= htmlspecialchars($item['description']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- SIGNATURES -->
    <div class="sign-section">

        <div class="sign-box">
            <div class="sign-field">
                PREPARED BY:<br>
                <?= htmlspecialchars($form['name_prepared'] ?? '') ?>
            </div>

            <div class="sign-field">
                CHECKED BY:<br>
                <?= htmlspecialchars($form['name_checked'] ?? '') ?>
            </div>
        </div>

        <div class="sign-box" style="float:right;">
            <div class="sign-field">
                APPROVED BY:<br>
                <?= htmlspecialchars($form['name_approved'] ?? '') ?>
            </div>

            <div class="sign-field">
                RECEIVED BY:<br>
                <?= htmlspecialchars($form['name_received'] ?? '') ?>
            </div>
        </div>

        <div class="clear"></div>
    </div>

</div>

<?php
return ob_get_clean();
?>