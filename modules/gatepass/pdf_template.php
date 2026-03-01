<?php
ob_start();
//session checker
session_start();
if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
    exit();
}
?>

<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
    }

    .container {
        width: 100%;
        border: 2px solid #000;
        padding: 15px;
    }

    .header {
        width: 100%;
        margin-bottom: 10px;
    }

    .logo {
        width: 100px;
        float: left;
    }

    .logo img {
        width: 100px;
    }

    .title {
        text-align: center;
    }

    .title h2 {
        margin: 0;
        font-size: 18px;
    }

    .title h3 {
        margin: 0;
        font-size: 16px;
        letter-spacing: 2px;
    }

    .clear {
        clear: both;
    }

    .row {
        margin-bottom: 8px;
    }

    .field-label {
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    table, th, td {
        border: 1px solid #000;
    }

    th, td {
        padding: 5px;
        font-size: 12px;
    }

    .sign-section {
        margin-top: 25px;
        width: 100%;
    }

    .sign-box {
        width: 48%;
        float: left;
    }

    .sign-field {
        border: 1px solid #000;
        padding: 10px;
        margin-bottom: 10px;
    }
</style>

<div class="container">

    <div class="header">
        <div class="logo">
            <img src="<?= __DIR__ ?>/../../TSI (png) 2022 500 pixel.png">
        </div>

        <div class="title">
            <h2>TSI GROUP</h2>
            <h3>GATE PASS</h3>
        </div>

        <div class="clear"></div>
    </div>

    <div class="row">
        <span class="field-label">TO:</span>
        <?= htmlspecialchars($form['recipient']) ?>
    </div>

    <div class="row">
        <span class="field-label">FROM:</span>
        <?= htmlspecialchars($form['issued_from']) ?>
    </div>

    <div class="row">
        <span class="field-label">DATE:</span>
        <?= htmlspecialchars($form['issue_date']) ?>
    </div>

    <div class="row">
        <span class="field-label">Business Unit:</span>
        <?= htmlspecialchars($form['business_unit']) ?>
    </div>

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
                <td><?= htmlspecialchars($item['qty']) ?></td>
                <td><?= htmlspecialchars($item['description_items[]']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

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

        <div style="clear:both;"></div>
    </div>

</div>

<?php
return ob_get_clean();
?>